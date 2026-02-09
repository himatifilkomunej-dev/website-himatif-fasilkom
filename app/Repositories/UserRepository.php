<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Division;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Log;


class UserRepository
{
    public function getDatatable()
    {
        // Eager loading
        $users = User::with(['role', 'periode.division'])->get();

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
                            <img src="' . asset('storage/' . str_replace(['.mp4', '.mov'], '.gif', $user->profile_video)) . '"
                                 alt="GIF Profile"
                                 class="rounded gif-thumbnail"
                                 style="max-height:50px;max-width:60px;object-fit:cover;">
                            <small class="d-block text-muted">GIF</small>
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
                $user->photo = $request->file('photo')->store('photo/user', 'public');
            }

            if ($request && $request->hasFile('profile_video')) {
                $videoPath   = $request->file('profile_video')->store('video/user', 'public');
                $gifFilename = pathinfo($videoPath, PATHINFO_FILENAME) . '.gif';
                $gifPath     = 'video/user/' . $gifFilename;

                $result = Process::run([
                    'ffmpeg',
                    '-i', storage_path('app/public/' . $videoPath),
                    '-t', '6',
                    '-vf', 'fps=30,scale=320:-1:flags=lanczos,split[s0][s1];[s0]palettegen[p];[s1][p]paletteuse',
                    '-y', storage_path('app/public/' . $gifPath),
                ]);

                $gifFullPath = storage_path('app/public/' . $gifPath);

                if (!$result->successful() || !file_exists($gifFullPath)) {
                    throw new \Exception('FFmpeg gagal generate GIF');
                }

                if (filesize($gifFullPath) > 10 * 1024 * 1024) {
                    unlink($gifFullPath);
                    throw new \Exception('GIF terlalu besar (>10MB)');
                }

                $user->profile_video = $gifPath;
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

                $user->photo = $request->file('photo')->store('photo/user', 'public');
            }

            if ($request && $request->hasFile('profile_video')) {
                if ($user->profile_video) {
                    Storage::disk('public')->delete($user->profile_video);
                }

                $videoPath   = $request->file('profile_video')->store('video/user', 'public');
                $gifFilename = pathinfo($videoPath, PATHINFO_FILENAME) . '.gif';
                $gifPath     = 'video/user/' . $gifFilename;

                $result = Process::run([
                    'ffmpeg',
                    '-i', storage_path('app/public/' . $videoPath),
                    '-t', '6',
                    '-vf', 'fps=30,scale=320:-1:flags=lanczos,split[s0][s1];[s0]palettegen[p];[s1][p]paletteuse',
                    '-y', storage_path('app/public/' . $gifPath),
                ]);

                $gifFullPath = storage_path('app/public/' . $gifPath);

                if (!$result->successful() || !file_exists($gifFullPath)) {
                    throw new \Exception('FFmpeg gagal generate GIF');
                }

                if (filesize($gifFullPath) > 10 * 1024 * 1024) {
                    unlink($gifFullPath);
                    throw new \Exception('GIF terlalu besar (>10MB)');
                }

                $user->profile_video = $gifPath;
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
