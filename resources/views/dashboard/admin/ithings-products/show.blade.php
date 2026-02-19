@extends('dashboard._layouts.app')

@section('title', 'Detail Produk iThings') {{-- title --}}
@section('header', 'Detail Produk iThings') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.ithings-products.index') }}">Produk iThings</a>
    </div>
    <div class="breadcrumb-item">Detail</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Detail Produk</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.ithings-products.edit', $product->id) }}" class="btn btn-warning">
                <i class="fas fa-pen mr-1"></i> Edit
            </a>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.ithings-products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : show --}}
    <div class="row gutters-xs">

        {{-- col : image --}}
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    @if ($product->photo)
                        <div class="img-wrapper w-100 h-15rem my-3">
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-100">
                        </div>
                    @else
                        <div
                            class="img-wrapper img-wrapper-upload bg-secondary w-100 h-15rem my-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-5x text-white"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- col : details --}}
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Produk</label>
                        <p>{{ $product->name }}</p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Harga</label>
                        <p>{{ $product->formatted_price }}</p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Ukuran</label>
                        <p>{{ $product->size ?? '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kategori</label>
                        <p>{{ $product->category->name ?? '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Status</label>
                        <p>
                            @if ($product->status)
                                <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Aktif</span>
                            @else
                                <span class="badge badge-secondary"><i class="fas fa-times mr-1"></i> Non-Aktif</span>
                            @endif
                        </p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <p>{{ $product->description ?? '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Dibuat Pada</label>
                        <p>{{ $product->getHumanDate('created_at') }}</p>
                    </div>

                    @if ($product->updated_at)
                        <div class="form-group">
                            <label class="font-weight-bold">Terakhir Diupdate</label>
                            <p>{{ $product->getHumanDate('updated_at') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    {{-- end of row : show --}}

@endsection {{-- end of content --}}
