<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Division;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;


class UserRepository
{
    public function getDatatable()
    {
        // Eager loading
        $users = User::with(['role'])->get();

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="' . route('dashboard.admin.users.edit', $user->id) . '" class="btn btn-sm btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                ';
            })
            ->addColumn('photo', function ($user) {
                return $user->photo
                    ? '
                        <div class="img-wrapper img-wrapper-table">
                            <img src="' . asset('storage/' . $user->photo) . '" alt="">
                        </div>
                      '
                    : '
                        <div class="img-wrapper img-wrapper-table">
                            <i class="text-white fas fa-image"></i>
                        </div>
                      ';
            })
            ->addColumn('profile_video', function ($user) {
                if ($user->profile_video) {
                    return '
                        <div class="img-wrapper img-wrapper-table">
                            <video width="60" height="50" style="object-fit:cover;border-radius:4px;">
                                <source src="' . asset('storage/' . $user->profile_video) . '" type="video/mp4">
                            </video>
                            <small class="d-block text-muted">Video</small>
                        </div>
                    ';
                }

                return '
                    <div class="img-wrapper img-wrapper-table">
                        <i class="text-white fas fa-video" style="font-size:2rem;"></i>
                        <small class="d-block text-muted">-</small>
                    </div>
                ';
            })
            ->addColumn('name', fn ($user) => $user->name)
            ->addColumn('nim', fn ($user) => $user->nim)
            ->addColumn('division', function ($user) {
                if (empty($user->periode)) {
                    return '-';
                }

                $periodes = collect($user->periode);
                $latest   = $periodes->sortByDesc(fn ($p) => (int) $p['year'])->first();

                if (!$latest || empty($latest['division_id'])) {
                    return '-';
                }

                $division = Division::find($latest['division_id']);

                return $division
                    ? $division->name . " ({$latest['position']})"
                    : '-';
            })
            ->addColumn('linkedin', fn ($user) => $user->linkedin)
            ->addColumn('instagram', fn ($user) => $user->instagram)
            ->addColumn('status', fn ($user) =>
                $user->status === '1'
                    ? '<span class="badge badge-success">Aktif</span>'
                    : '<span class="badge badge-secondary">Tidak Aktif</span>'
            )
            ->addColumn('phone', fn ($user) => $user->phone)
            ->addColumn('email', fn ($user) => $user->email)
            ->addColumn('role', fn ($user) => $user->role->name ?? '-')
            ->rawColumns(['action', 'photo', 'status', 'profile_video'])
            ->make(true);
    }


    public function get()
    {
        return User::all();
    }


    public function getPengurus()
    {
        return User::where('status', '1')->get();
    }


    public function byYear(string $year)
    {
        return User::whereJsonContains('periode', [
            'year' => $year
        ])->get();
    }


    public function count(array $condition = [])
    {
        return User::when(
            count($condition) > 0,
            fn ($q) => $q->where($condition)
        )->count();
    }


    public function findById($id)
    {
        return User::find($id);
    }

    /**
     * Compress image using GD library
     */
    private function compressImage(UploadedFile $file, $maxWidth = 1200, $quality = 85)
    {
        // Check if GD extension is available
        if (!extension_loaded('gd')) {
            Log::warning('GD extension not available, skipping image compression');
            return null;
        }
        
        $tempPath = $file->getRealPath();
        $extension = strtolower($file->getClientOriginalExtension());
        
        // Load image based on type
        $image = match($extension) {
            'jpg', 'jpeg' => imagecreatefromjpeg($tempPath),
            'png' => imagecreatefrompng($tempPath),
            'gif' => imagecreatefromgif($tempPath),
            default => null
        };
        
        if (!$image) return null;
        
        // Get original dimensions
        $width = imagesx($image);
        $height = imagesy($image);
        
        // Calculate new dimensions
        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int)($height * ($maxWidth / $width));
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }
        
        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG and GIF
        if ($extension === 'png' || $extension === 'gif') {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        }
        
        // Resize
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        // Save compressed image
        $tempCompressed = tempnam(sys_get_temp_dir(), 'img_');
        match($extension) {
            'jpg', 'jpeg' => imagejpeg($newImage, $tempCompressed, $quality),
            'png' => imagepng($newImage, $tempCompressed, (int)((100 - $quality) / 11.11)),
            'gif' => imagegif($newImage, $tempCompressed),
            default => null
        };
        
        // Clean up
        imagedestroy($image);
        imagedestroy($newImage);
        
        return $tempCompressed;
    }


    public function save($data, $request = null)
    {
        try {
            $user = new User($data);

            $user->password = bcrypt($data['password']);
            $user->role_id  = config('himatif.default_role_id', 2);
            $user->status   = '1';

            $user->periode = array_map(fn ($i) => [
                'year'        => $data['periode_year'][$i],
                'division_id' => $data['periode_division'][$i] ?? null,
                'position'    => $data['periode_position'][$i] ?? null,
            ], array_keys($data['periode_year']));

            if ($request && $request->hasFile('photo')) {
                $photoFile = $request->file('photo');
                
                // Compress image
                $compressedPath = $this->compressImage($photoFile, 1200, 85);
                
                if ($compressedPath) {
                    $filename = 'photo/user/' . uniqid() . '_' . time() . '.jpg';
                    Storage::disk('public')->put($filename, file_get_contents($compressedPath));
@unlink($compressedPath);
                    $user->photo = $filename;
                } else {
                    // Fallback if compression fails
                    $user->photo = $photoFile->store('photo/user', 'public');
                }
            }

            if ($request && $request->hasFile('profile_video')) {
                $user->profile_video = $request->file('profile_video')->store('video/user', 'public');
            }

            $user->save();

            return $user->fresh();
        } catch (\Throwable $t) {
            \Log::error('User save error: ' . $t->getMessage());
            throw $t;
        }
    }


    public function update($id, $data, $request = null)
    {
        try {
            $user = User::findOrFail($id);

            $allowed = [
                'name', 'nim', 'email', 'phone',
                'instagram', 'linkedin', 'status'
            ];

            $data = Arr::only($data, $allowed);
            $user->fill($data);

            if (isset($data['periode_year'])) {
                $user->periode = array_map(fn ($i) => [
                    'year'        => $data['periode_year'][$i],
                    'division_id' => $data['periode_division'][$i] ?? null,
                    'position'    => $data['periode_position'][$i] ?? null,
                ], array_keys($data['periode_year']));
            }

            if (!empty($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            if ($request && $request->hasFile('photo')) {
                if ($user->photo) {
                    Storage::disk('public')->delete($user->photo);
                }

                $photoFile = $request->file('photo');
                
                // Compress image
                $compressedPath = $this->compressImage($photoFile, 1200, 85);
                
                if ($compressedPath) {
                    $filename = 'photo/user/' . uniqid() . '_' . time() . '.jpg';
                    Storage::disk('public')->put($filename, file_get_contents($compressedPath));
@unlink($compressedPath);
                    $user->photo = $filename;
                } else {
                    // Fallback if compression fails
                    $user->photo = $photoFile->store('photo/user', 'public');
                }
            }

            if ($request && $request->hasFile('profile_video')) {
                if ($user->profile_video) {
                    Storage::disk('public')->delete($user->profile_video);
                }

                $user->profile_video = $request->file('profile_video')->store('video/user', 'public');
            }

            $user->save();

            return $user->fresh();
        } catch (\Throwable $t) {
            \Log::error('User update error: ' . $t->getMessage());
            throw $t;
        }
    }


    public function setStatus($ids, $status)
    {
        return User::whereIn('id', $ids)
            ->update(['status' => $status]);
    }
}
