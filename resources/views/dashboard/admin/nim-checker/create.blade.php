@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Mahasiswa') {{-- title --}}
@section('header', 'NIM Checker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.nim-checker.index') }}">NIM Checker</a></div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data Mahasiswa</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.nim-checker.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.nim-checker.store-manual') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        {{-- input : nim --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'NIM')
                            @slot('inputName', 'nim')
                            @slot('inputId', 'input-nim')
                            @slot('inputIsRequired', true)
                            @slot('inputPlaceholder', 'Contoh: 242410102001')
                        @endcomponent

                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Lengkap')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputIsRequired', true)
                        @endcomponent

                        {{-- input : angkatan --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Angkatan')
                            @slot('inputName', 'angkatan')
                            @slot('inputId', 'input-angkatan')
                            @slot('inputIsRequired', true)
                            @slot('inputPlaceholder', 'Contoh: 2024')
                        @endcomponent

                        {{-- input : status --}}
                        <div class="form-group">
                            <label for="input-status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="input-status" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="col-auto">
                                <a href="{{ route('dashboard.admin.nim-checker.index') }}"
                                    class="btn btn-outline-secondary">
                                    Batal
                                </a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-2"></i>Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- end of row : form --}}
@endsection {{-- end of content --}}
