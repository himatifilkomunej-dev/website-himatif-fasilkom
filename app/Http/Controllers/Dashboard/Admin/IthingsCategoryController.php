<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IthingsCategoryRepository;

class IthingsCategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new IthingsCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countAllCategories = $this->categoryRepository->count();
        return view('dashboard.admin.ithings-categories.index', compact([
            'countAllCategories',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.ithings-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ])->validate();
        
        try {
            $this->categoryRepository->save($request->all());
            return redirect()->route('dashboard.admin.ithings-categories.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Kategori Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-categories.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Kategori Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);
        if ($category) {
            return view('dashboard.admin.ithings-categories.edit', compact('category'));
        } else {
            abort(404);
        }
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
        \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ])->validate();
        
        try {
            $this->categoryRepository->update($id, $request->all());
            return redirect()->route('dashboard.admin.ithings-categories.index')->with([
                'type' => 'success',
                'message' => 'Update Data Kategori Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-categories.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Update Data Kategori Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        try {
            $ids = explode(',', $request->ids);
            $this->categoryRepository->destroys($ids);
            return redirect()->route('dashboard.admin.ithings-categories.index')->with([
                'type' => 'success',
                'message' => 'Hapus Data Kategori Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-categories.index')->with([
                'type' => 'danger',
                'message' => 'Hapus Data Kategori Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Get datatable data
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        return $this->categoryRepository->getDatatable();
    }
}
