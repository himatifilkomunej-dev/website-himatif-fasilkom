@extends('dashboard._layouts.app')

@section('title', 'NIM Checker') {{-- title --}}
@section('header', 'NIM Checker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">NIM Checker</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Upload Data Mahasiswa</h5>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('dashboard.admin.nim-checker.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row gutters-xs">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                            <img id="img-post" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Upload File CSV Mahasiswa')
                            @slot('inputPreviewIdentity', 'img-post')
                            @slot('inputName', 'data')
                            @slot('inputId', 'input-data')
                            @slot('inputAccept', '.csv')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                        <small class="text-muted">Format CSV: name;nim;angkatan;status</small>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload mr-2"></i>Upload Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Table Data Mahasiswa --}}
    <div class="card mt-4">
        <div class="card-body">
            <div class="row align-items-center gutters-xs mb-3">
                <div class="col-lg">
                    <h5 class="mb-0">Data Mahasiswa</h5>
                </div>
            </div>
            <div class="table-datatable-container">
                <table id="nim_table" class="table table-responsive table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export">No</th>
                            <th>Action</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <form action="{{ route('dashboard.admin.nim-checker.destroy', $item->id) }}"
                                        method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            style="padding: 2px 5px; font-size: 15px; height: 28px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->angkatan }}</td>
                                <td>
                                    <span class="badge badge-{{ $item->status == 'Aktif' ? 'success' : 'secondary' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- end of row : form --}}
@endsection {{-- end of content --}}

@push('style')
    {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    @include('dashboard._scripts.datatable')

    <script>
        $(document).ready(function() {
            $('#nim_table').DataTable({
                responsive: true,
                order: [[3, 'asc']], // Sort by NIM column
                pageLength: 25
            });
        });
    </script>
@endpush {{-- end of script --}}
