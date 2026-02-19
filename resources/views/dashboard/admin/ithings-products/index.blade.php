@extends('dashboard._layouts.app')

@section('title', 'Produk iThings') {{-- title --}}
@section('header', 'Produk iThings') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">iThings Produk</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-box')
                @slot('title', 'Total Produk')
                @slot('content', $countAllProducts)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'success'])
                @slot('icon', 'fas fa-check-circle')
                @slot('title', 'Produk Aktif')
                @slot('content', $countActiveProducts)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-times-circle')
                @slot('title', 'Produk Non-Aktif')
                @slot('content', $countInactiveProducts)
            @endcomponent
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <form id="form-delete" action="{{ route('dashboard.admin.ithings-products.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <form id="form-edit">
                        <button id="btn-edit" class="btn btn-sm btn-warning" disabled>
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.ithings-products.create') }}"
                        class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-datatable-container">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Dibuat Pada</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}

@push('style')
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    @include('dashboard._scripts.datatable')
    <script>
        "use strict";
        $(document).ready(function() {
            let table = $('#datatable').DataTable({
                ajax: `{{ url('/dashboard/admin/ithings-products/datatable') }}`,
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true,
                        'selectCallback': function(nodes, selected) {
                            if (table.column(0).checkboxes.selected().length > 0) {
                                $('#btn-delete').removeAttr('disabled');
                            } else {
                                $('#btn-delete').attr('disabled', true);
                            }

                            if (table.column(0).checkboxes.selected().length > 0 &&
                                table.column(0).checkboxes.selected().length < 2) {
                                $('#btn-edit').removeAttr('disabled');
                            } else {
                                $('#btn-edit').attr('disabled', true);
                            }
                        }
                    }
                }],
                select: {
                    'style': 'multi',
                    'selector': 'td:not(.is-clickable)'
                },
                order: [],
                columns: [{
                        data: 'id',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        searchable: false
                    },
                    {
                        data: 'size',
                        name: 'size'
                    },
                    {
                        data: 'category',
                        name: 'category',
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'description',
                        name: 'description',
                        searchable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false
                    },
                ],
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let row_selected_id = table.column(0).checkboxes.selected()[0];
                $(form).attr('action',
                    `{{ url('dashboard/admin/ithings-products/${row_selected_id}/edit') }}`);
                form.submit()
            });

            $('#form-delete').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Hapus ${rows_selected.length} Data ?`,
                    text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Iterate over all selected checkboxes
                        $(form).find('input[name="id[]"]').remove();
                        $.each(rows_selected, function(index, rowId) {
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id[]')
                                .val(rowId)
                            );
                        });
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush {{-- end of script --}}
