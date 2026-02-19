@extends('dashboard._layouts.app')

@section('title', 'Tambah Produk iThings') {{-- title --}}
@section('header', 'Produk iThings') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.ithings-products.index') }}">Produk iThings</a>
    </div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data Produk</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.ithings-products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.ithings-products.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row gutters-xs">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                            <img id="img-product" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Foto Produk')
                            @slot('inputPreviewIdentity', 'img-product')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                        @endcomponent
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 5MB</small>
                    </div>
                </div>
            </div>

            {{-- col : input --}}
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Produk')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                        @endcomponent

                        {{-- input : price --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Harga')
                            @slot('inputName', 'price')
                            @slot('inputId', 'input-price')
                            @slot('inputType', 'number')
                            @slot('inputStep', '0.01')
                        @endcomponent

                        {{-- input : size --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Ukuran')
                            @slot('inputName', 'size')
                            @slot('inputId', 'input-size')
                        @endcomponent

                        {{-- textarea : description --}}
                        <div class="form-group">
                            <label for="input-description">Deskripsi</label>
                            <textarea name="description" id="input-description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- input : category_id --}}
                        @php
                            $inputDatasCategory = [];
                            foreach ($categories as $category) {
                                $inputDatasCategory["$category->name"] = $category->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Kategori')
                            @slot('inputName', 'category_id')
                            @slot('inputId', 'input-category_id')
                            @slot('inputIsSearchable', true)
                            @slot('inputDatas', $inputDatasCategory)
                        @endcomponent

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputValue', 1)
                            @slot('inputDatas', [
                                '<i class="fas fa-check mr-1"></i> Aktif' => 1,
                                '<i class="fas fa-times mr-1"></i> Non-Aktif' => 0,
                                ])
                            @endcomponent

                            {{-- submit --}}
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        {{-- end of row : form --}}

    @endsection {{-- end of content --}}

    @push('script')
        <script>
            "use strict";
            // Validasi ukuran file sebelum upload
            document.getElementById('input-photo').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const maxSize = 5 * 1024 * 1024; // 5MB in bytes

                if (file && file.size > maxSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran File Terlalu Besar',
                        text: 'Ukuran foto maksimal 5MB. File Anda: ' + (file.size / (1024 * 1024)).toFixed(2) +
                            'MB',
                    });
                    e.target.value = ''; // Reset input
                    document.getElementById('img-product').src = ''; // Reset preview
                }
            });
        </script>
    @endpush
