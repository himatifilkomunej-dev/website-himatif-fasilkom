<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IthingsProductRepository;
use App\Repositories\IthingsCategoryRepository;
use Intervention\Image\Facades\Image;

class IthingsProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct()
    {
        $this->productRepository = new IthingsProductRepository;
        $this->categoryRepository = new IthingsCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countAllProducts = $this->productRepository->count();
        $countActiveProducts = $this->productRepository->count([['status', '1']]);
        $countInactiveProducts = $this->productRepository->count([['status', '0']]);
        return view('dashboard.admin.ithings-products.index', compact([
            'countAllProducts',
            'countActiveProducts',
            'countInactiveProducts',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->get();
        return view('dashboard.admin.ithings-products.create', compact('categories'));
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
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'category_id' => 'required|exists:ithings_categories,id',
            'status' => 'nullable|boolean',
        ], [
            'photo.max' => 'Ukuran foto maksimal 5MB',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg, jpg, atau png',
        ])->validate();
        
        try {
            $this->productRepository->save($request->all());
            return redirect()->route('dashboard.admin.ithings-products.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Produk Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-products.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Produk Gagal, Terjadi kesalahan pada sistem.'
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
        $product = $this->productRepository->findById($id);
        if ($product) {
            return view('dashboard.admin.ithings-products.show', compact('product'));
        } else {
            abort(404);
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
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->get();

        return view('dashboard.admin.ithings-products.edit', compact(['product', 'categories']));
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
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'category_id' => 'required|exists:ithings_categories,id',
            'status' => 'nullable|boolean',
        ], [
            'photo.max' => 'Ukuran foto maksimal 5MB',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg, jpg, atau png',
        ])->validate();

        try {
            $this->productRepository->update($id, $request->all());

            return redirect()->route('dashboard.admin.ithings-products.edit', $id)->with([
                'type' => 'success',
                'message' => 'Ubah Data Produk Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-products.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Produk Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Hapus Data Produk Gagal, id produk tidak ditemukan'
            ]);
        }

        try {
            $result = $this->productRepository->destroys($request->id);

            return redirect()->route('dashboard.admin.ithings-products.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Produk Berhasil, $result data produk terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.ithings-products.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Produk Gagal, Terjadi kesalahan pada sistem.'
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
        return $this->productRepository->getDatatable();
    }
}
