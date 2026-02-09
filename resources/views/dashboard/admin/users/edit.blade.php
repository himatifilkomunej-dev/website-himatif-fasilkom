@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Pengurus')
@section('header', 'Pengurus')

@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.users.index') }}">Keanggotaan</a></div>
    <div class="breadcrumb-item">Ubah Data</div>
@endsection

@section('content')
    <div class="my-4 row gutters-xs align-items-center justify-content-end">
        <div class="col-lg">
            <h4>Ubah Data Pengurus</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="mr-1 fas fa-arrow-left"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- MAIN FORM --}}
    <form action="{{ route('dashboard.admin.users.update', $user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            {{-- LEFT: PHOTO + VIDEO (SAMA PERSIS CREATE) --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        {{-- FOTO --}}
                        <div class="my-3 img-wrapper img-wrapper-upload rounded-circle bg-secondary w-10rem h-10rem">
                            <img id="img-anggota-1" 
                                 src="{{ $user->photo ? Storage::url($user->photo) : '' }}" 
                                 alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Foto Anggota')
                            @slot('inputPreviewIdentity', 'img-anggota-1')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                        @endcomponent

                        {{-- 🔥 VIDEO (COPY EXACT DARI CREATE) --}}
                        <div class="my-3 rounded img-wrapper img-wrapper-upload w-10rem h-10rem bg-dark d-none" id="img-video-1">
                            <video width="100%" height="100%" class="rounded" controls preload="metadata" muted></video>
                        </div>
                        @component('dashboard._components._form-group.input-video')
                            @slot('inputLabel', 'Video Profile')
                            @slot('inputPreviewIdentity', 'img-video-1')
                            @slot('inputName', 'profile_video')
                            @slot('inputId', 'input-video')
                        @endcomponent
                    </div>
                </div>
            </div>

            {{-- RIGHT: FORM FIELDS --}}
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        {{-- NAME --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->name)
                        @endcomponent

                        {{-- NIM --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nim')
                            @slot('inputName', 'nim')
                            @slot('inputId', 'input-nim')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->nim)
                        @endcomponent

                        {{-- EMAIL --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'email')
                            @slot('inputLabel', 'Email')
                            @slot('inputName', 'email')
                            @slot('inputId', 'input-email')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->email)
                        @endcomponent

                        {{-- PHONE --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'number')
                            @slot('inputLabel', 'Nomor Hp')
                            @slot('inputName', 'phone')
                            @slot('inputId', 'input-phone')
                            @slot('inputValue', $user->phone)
                        @endcomponent

                        {{-- INSTAGRAM --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Instagram')
                            @slot('inputName', 'instagram')
                            @slot('inputId', 'input-instagram')
                            @slot('inputValue', $user->instagram)
                        @endcomponent

                        {{-- LINKEDIN --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Linkedin')
                            @slot('inputName', 'linkedin')
                            @slot('inputId', 'input-linkedin')
                            @slot('inputValue', $user->linkedin)
                        @endcomponent

                        {{-- STATUS --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputValue', $user->status)
                            @slot('inputDatas', ['aktif' => 1, 'nonaktif' => 0])
                        @endcomponent

                        {{-- PERIODE --}}
                        @php
                            $inputDatasDivision = [];
                            foreach ($divisions as $division) {
                                $inputDatasDivision[$division->name] = $division->id;
                            }
                            $inputDatasPosition = [];
                            foreach ($positions as $position) {
                                $inputDatasPosition[$position] = $position;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-multiple-periode')
                            @slot('inputLabel', 'Periode')
                            @slot('inputName', 'periode')
                            @slot('inputId', 'input-position')
                            @slot('inputIsRequired', true)
                            @slot('inputIsSearchable', true)
                            @slot('divisionOption', $inputDatasDivision)
                            @slot('positionOption', $inputDatasPosition)
                            @slot('inputValue', $user->periode)
                        @endcomponent

                        {{-- SUBMIT --}}
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PASSWORD FORM (TERPISAH) --}}
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.admin.users.update-password', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h6 class="mb-3">Ubah Password</h6>
                            @component('dashboard._components._form-group.input')
                                @slot('inputType', 'password')
                                @slot('inputLabel', 'Password Baru')
                                @slot('inputName', 'password')
                                @slot('inputId', 'input-password')
                            @endcomponent
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
<script>
"use strict";

{{-- 🔥 VIDEO PREVIEW (SAMA PERSIS CREATE) --}}
function openVideoFile(event, previewId) {
    const file = event.target.files[0];
    const preview = $(previewId);
    const video = preview.find('video')[0];
    
    if (file && video) {
        const reader = new FileReader();
        reader.onload = (e) => {
            video.src = e.target.result;
            preview.removeClass('d-none');
            $(event.target).next('.custom-file-label').text(file.name);
        };
        reader.readAsDataURL(file);
    }
}

function initYearPicker(context = document) {
    $(context).find('.form-control-year').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        autoclose: true
    });
}

$(document).ready(function () {
    initYearPicker();
    
    $("#dynamic-ar").on("click", function () {
        const row = $(`
            <tr>
                <td style="width:70%">
                    <div class="mb-3 form-group">
                        <label>Tahun Periode</label>
                        <div class="input-group">
                            <input type="text" name="periode_year[]" class="form-control form-control-year" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Divisi <span class="text-muted">(harus diisi)</span></label>
                        <select name="periode_division[]" class="form-control" required>
                            <option value="1">Badan Pengurus Harian</option>
                            <option value="2">Pengembangan Sumber Daya Mahasiswa</option>
                            <option value="3">Penelitian dan Pengembangan</option>
                            <option value="4">Hubungan Mahasiswa</option>
                            <option value="5">Hubungan Luar</option>
                            <option value="6">Media Sosial</option>
                            <option value="7">Media Teknologi</option>
                            <option value="8">Media Informasi</option>
                            <option value="9">Pengembangan Teknologi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jabatan <span class="text-muted">(harus diisi)</span></label>
                        <select name="periode_position[]" class="form-control" required>
                            <option value="Ketua Umum">Ketua Umum</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Kepala Divisi">Kepala Divisi</option>
                            <option value="Kepala Subdivisi">Kepala Subdivisi</option>
                            <option value="Anggota">Anggota</option>
                            <option value="Demisioner">Demisioner</option>
                        </select>
                    </div>
                </td>
                <td class="align-middle">
                    <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                </td>
            </tr>
        `);
        $("#dynamicAddRemove").append(row);
        initYearPicker(row);
    });

    $(document).on("click", ".remove-input-field", function () {
        $(this).closest("tr").remove();
    });
});
</script>
@endpush
