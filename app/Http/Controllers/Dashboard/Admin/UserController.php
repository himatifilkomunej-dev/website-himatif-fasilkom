<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Constant\GlobalConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DivisionRepository;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class UserController extends Controller
{
    private $divisionRepository;
    private $userRepository;
    private $roleRepository;

    public function __construct()
    {
        $this->divisionRepository = new DivisionRepository();
        $this->userRepository = new UserRepository();
        $this->roleRepository = new RoleRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countAllUser = $this->userRepository->count();
        $countActiveUser = $this->userRepository->count([['status', '1']]);
        $countInactiveUser = $this->userRepository->count([['status', '0']]);
        return view('dashboard.admin.users.index', compact(['countAllUser', 'countActiveUser', 'countInactiveUser']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = $this->divisionRepository->get();
        $positions = GlobalConstant::DIVISION_POSITION_NAME;

        return view('dashboard.admin.users.create', compact(['divisions', 'positions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            \Validator::make($request->all(), [
                'name' => 'required',
                'nim' => 'required',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:6',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',           
                'profile_video' => 'nullable|file|mimes:mp4,mov|max:51200',  
            ])->validate();

            $this->userRepository->save($request->all(), $request);
            return redirect()
                ->route('dashboard.admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => 'Tambah Data User Berhasil',
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back() 
                ->with([
                    'type' => 'danger',
                    'message' => 'Tambah Data User Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage(),
                ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $divisions = $this->divisionRepository->get();
        $positions = GlobalConstant::DIVISION_POSITION_NAME;

        if (!$user) {
            abort(404);
        }

        return view('dashboard.admin.users.edit', compact(['user', 'divisions', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        \Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'status' => 'required',
            'periode_year' => 'required|array',
            'periode_division' => 'required|array',
            'periode_position' => 'required|array',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',          
            'profile_video' => 'nullable|file|mimes:mp4,mov|max:51200',  
        ])->validate();

        try {
            // Ambil data user
            $user = $this->userRepository->findById($id);
            if (!$user) {
                return redirect()
                    ->back()
                    ->with([
                        'type' => 'danger',
                        'message' => 'User tidak ditemukan!',
                    ]);
            }

            // Ambil semua input kecuali password (jika kosong)
            $data = $request->except('password');

            // Jika password diisi, update dengan hash
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            // Format periode menjadi JSON sebelum update
            $data['periode'] = json_encode(
                array_map(
                    function ($year, $division, $position) {
                        return [
                            'year' => $year,
                            'division_id' => $division,
                            'position' => $position,
                        ];
                    },
                    $request->periode_year,
                    $request->periode_division,
                    $request->periode_position,
                ),
            );

            // Update user
            $this->userRepository->update($id, $data, $request); 
            return redirect()
                ->route('dashboard.admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => 'Ubah Data User Berhasil',
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with([
                    'type' => 'danger',
                    'message' => 'Ubah Data User Gagal, Terjadi kesalahan pada sistem. ' . $e->getMessage(),
                ]);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $result = $this->userRepository->setStatus($request->id, $request->status);
            return redirect()
                ->route('dashboard.admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => "Ubah Status Data Pengurus Berhasil, $result data Sudah diubah",
                ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->route('dashboard.admin.users.index')
                ->with([
                    'type' => 'danger',
                    'message' => 'Ubah Status Data Pengurus gagal, Terjadi kesalahan pada sistem.',
                ]);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        \Validator::make($request->password, [
            'password' => 'required|min:6',
        ])->validate();

        try {
            $this->userRepository->update($id, $request->password);
            return redirect()
                ->route('dashboard.admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => 'Ubah Password User Berhasil',
                ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back('dashboard.admin.users.create')
                ->with([
                    'type' => 'danger',
                    'message' => 'Ubah Password User Gagal, Terjadi kesalahan pada sistem.',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
