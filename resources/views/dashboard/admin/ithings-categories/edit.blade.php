@extends('dashboard._layouts.app')

@section('title', 'Edit Kategori iThings') {{-- title --}}
@section('header', 'Kategori iThings') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.ithings-categories.index') }}">Kategori iThings</a>
    </div>
    <div class="breadcrumb-item">Edit Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Edit Data Kategori</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.ithings-categories.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.ithings-categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row gutters-xs">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Kategori')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputValue', $category->name)
                        @endcomponent

                        {{-- textarea : description --}}
                        <div class="form-group">
                            <label for="input-description">Deskripsi</label>
                            <textarea name="description" id="input-description" class="form-control" rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="text-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- submit --}}
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- end of row : form --}}

@endsection {{-- end of content --}}
