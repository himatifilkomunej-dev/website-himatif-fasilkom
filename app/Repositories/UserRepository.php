<?php

namespace App\Repositories;

use App\Models\Division;
use Yajra\DataTables\DataTables;
use App\Models\User;

class UserRepository
{
    public function getDatatable()
    {
        $users = User::all();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<div class="d-flex align-items-center">
                            <a href="' . route('dashboard.admin.users.edit', $user->id) . '" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>';
            })
            ->addColumn('photo', function ($user) {
                return $user->photo ? '<div class="img-wrapper img-wrapper-table"><img src=' . asset('storage/' . $user->photo) . ' alt=""></div>'
                                    : '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
            })
            ->addColumn('name', fn($user) => $user->name)
            ->addColumn('nim', fn($user) => $user->nim)
            ->addColumn('division', function ($user) {
                if (empty($user->periode)) {
                    return '-';
                }
                $periodes = collect($user->periode);

                // ambil periode dengan year terbesar
                $latest = $periodes
                    ->sortByDesc(fn ($p) => (int) $p['year'])
                    ->first();

                if (!$latest || empty($latest['division_id'])) {
                    return '-';
                }

                $division = Division::find($latest['division_id']);

                if (!$division) {
                    return '-';
                }

                return $division->name . " ({$latest['position']})";
            })
            ->addColumn('linkedin', fn($user) => $user->linkedin)
            ->addColumn('instagram', fn($user) => $user->instagram)
            ->addColumn('status', fn($user) => $user->status === '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-secondary">Tidak Aktif</span>')
            ->addColumn('phone', fn($user) => $user->phone)
            ->addColumn('email', fn($user) => $user->email)
            ->addColumn('role', fn($user) => $user->role->name)
            ->rawColumns(['action', 'photo', 'status'])
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

    public function count(array $condition = [])
    {
        return User::when(count($condition) > 0, fn($q) => $q->where($condition))->count();
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function save($data)
    {
        try {
            $user = new User($data);
            $user->password = bcrypt($data['password']);
            $user->role_id = '2';
            $user->status='1';
            $user->periode = array_map(fn($i) => [
                'year' => $data['periode_year'][$i],
                'division_id' => $data['periode_division'][$i] ?? null,
                'position' => $data['periode_position'][$i] ?? null,
            ], array_keys($data['periode_year']));

            if (isset($data['photo'])) {
                $user->photo = $data['photo']->store('photo/user', 'public');
            }

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function update($id, $data)
    {
        try {
            $user = User::findOrFail($id);
            $user->fill($data);
            $user->status = $data['status'] ?? $user->status;
            $user->periode = array_map(fn($i) => [
                'year' => $data['periode_year'][$i],
                'division_id' => $data['periode_division'][$i] ?? null,
                'position' => $data['periode_position'][$i] ?? null,
            ], array_keys($data['periode_year']));

            if (isset($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            if (isset($data['photo'])) {
                if ($user->photo) {
                    \Storage::delete('public/' . $user->photo);
                }
                $user->photo = $data['photo']->store('photo/user', 'public');
            }

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function setStatus($ids, $status)
    {
        return User::whereIn('id', $ids)->update(['status' => $status]);
    }
}
