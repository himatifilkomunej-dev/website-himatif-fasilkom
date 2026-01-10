@extends('frontpage.layouts.app-frontpage')

@section('title', 'Cakap x Himatif')

@section('pageClass', 'cakap')
@section('content')
    <main class="cakap-main">
        <!-- sisi kiri -->
        <div class="side left">
            <img src="{{ asset('img/bagian/1.png') }}" alt="decoration" style="width: 35px; height: auto;">
        </div>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <div id="alert-{{ $loop->index }}"
                        class="alert flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="flex justify-start items-start gap-1">
                            <span class="font-medium badge badge-error">Alert </span>
                            {{ $error }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-gray-500 rounded-lg hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8"
                            aria-label="Close" onclick="closeAlert({{ $loop->index }})">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </ul>
        @endif

        @if (Session::has('message'))
            <div class="flex items-center p-4 mb-4 text-sm {{ Session::get('type') == 'danger' ? 'text-red-800 rounded-lg bg-red-50' : ' text-blue-800 rounded-lg bg-blue-50 ' }}"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ Session::get('type') == 'danger' ? 'Error' : 'Info' }}</span>
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif

        <div class="cakap-wrapper">
            <h1 class="cakap-title">CAKAP x HIMATIF</h1>

            @if (Cookie::get('cakap_form_success') != true)
                <div class="form-cakap">
                    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Hello!</h3>
                            <p class="py-4">This modal works with a hidden checkbox!</p>
                        </div>
                        <label class="modal-backdrop" for="my_modal_7">Close</label>
                    </div>
                    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
                    <form action="{{ route('frontpage.cakap.store') }}" method="POST" enctype="multipart/form-data"
                        class="cakap-form">
                        @csrf
                        <div class="cakap-field">
                            <label for="email">Masukkan Email Kamu</label>
                            <input type="email" id="email" name="email" required />
                        </div>
                        <div class="cakap-field">
                            <label for="nama">Masukkan Nama Kamu</label>
                            <input type="text" id="nama" name="nama" required />
                        </div>

                        <div class="cakap-field">
                            <label for="label_id">Pilih paket?</label>
                            <select name="label_id" id="label_id" required>
                                <option disabled selected>Pilih paket?</option>
                                @foreach ($labelCount as $label)
                                    <option @if ($label->cakap_kodes_count == 0) disabled @endif value="{{ $label->id }}">
                                        {{ $label->name }} Tersisa {{ $label->cakap_kodes_count }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="cakap-field">
                            <label for="bukti_pendaftaran">Bukti Follow Instagram HIMATIF</label>
                            <input type="file" name="bukti_pendaftaran" id="bukti_pendaftaran"
                                placeholder="Upload Bukti Follow" />
                        </div>

                        <button type="submit" class="cakap-btn">Daftar</button>
                    </form>

                </div>
            @else
                <div id="success-container" class="cakap-success">
                    <p class="success-title">Selamat, Anda telah berhasil mendaftar voucher Cakap X Himatif.</p>
                    <svg class="success-icon" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z" />
                    </svg>
                    <p class="success-desc">Kode voucher akan dikirimkan melalui email yang telah Anda daftarkan.
                        Mohon cek email dan folder spam secara berkala. Terima kasih!</p>
                </div>
            @endif
        </div>

        <!-- sisi kanan -->
        <div class="side right">
            <img src="{{ asset('img/bagian/2.png') }}" alt="decoration" style="width: 35px; height: auto;">
        </div>
    </main>

    <style>
        body.cakap {
            background: #FEF9F1;
            margin: 0;
            font-family: sans-serif;
        }

        .cakap-main {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            padding: 20px 0 0 0;
            min-height: 90vh;
        }

        .side.left {
            margin-right: auto;
            left: 0;
        }

        .side.right {
            margin-left: auto;
            right: 0;
        }

        .side {
            width: 35px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 0;
            /* Gambar mulai dari atas */
            margin-top: -100px;
            z-index: 1000;
            /* Cuma gambar yang ke atas */
        }

        .side img {
            width: 35px !important;
            height: auto !important;
        }

        .cakap-wrapper {
            flex: 1;
            width: 100%;
            max-width: 700px;
            margin: 0 auto 80px auto;
            background: #002F49;
            border-radius: 24px;
            box-shadow: 0 2px 16px rgba(0, 16, 26, 0.05);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cakap-title {
            font-size: 2.5rem;
            margin-bottom: 25px;
            background: #910E19;
            color: #fff;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 999px;
            text-align: center;
            width: 100%;
            max-width: 700px;
        }

        .cakap-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-top: 16px;
        }

        .cakap-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .cakap-field label {
            font-weight: bold;
            color: #fff;
            font-size: 1rem;
        }

        .cakap-field input,
        .cakap-field select {
            padding: 10px 18px;
            border: 2px solid #222;
            border-radius: 999px;
            font-size: 1.05rem;
            background: #fff;
            outline: none;
            transition: border 0.2s;
        }

        .cakap-field input[type="file"] {
            border-radius: 12px;
            padding: 8px;
        }

        .cakap-btn {
            background: linear-gradient(to right, #910E19, #B11226);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 999px;
            cursor: pointer;
            font-size: 1.05rem;
            font-weight: bold;
            width: 100%;
            margin-top: 8px;
        }

        .cakap-btn:hover {
            background: #fff;
            color: #910E19;
            border: 2px solid #910E19;
        }

        .cakap-success {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 24px;
            background: #002F49;
            border-radius: 24px;
            box-shadow: 0 2px 16px rgba(0, 16, 26, 0.05);
            padding: 40px 24px;
            max-width: 700px;
            margin: 0 auto;
            width: 100%;
        }

        .success-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
        }

        .success-icon {
            height: 80px;
            width: 80px;
            fill: #910E19;
        }

        .success-desc {
            font-size: 1rem;
            color: #fff;
            text-align: center;
            max-width: 400px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .side {
                display: none;
            }

            .cakap-main {
                padding: 10px;
                min-height: 100vh;
            }

            .cakap-wrapper,
            .cakap-success {
                max-width: 100%;
                width: calc(100% - 20px);
                margin: 0 10px 60px 10px;
                padding: 20px 16px;
                border-radius: 18px;
                box-sizing: border-box;
            }

            .cakap-title {
                font-size: 1.5rem;
                padding: 10px 20px;
                margin-bottom: 20px;
                max-width: 100%;
                word-wrap: break-word;
            }

            .cakap-form {
                gap: 16px;
                width: 100%;
            }

            .cakap-field {
                width: 100%;
            }

            .cakap-field label {
                font-size: 0.95rem;
            }

            .cakap-field input,
            .cakap-field select {
                font-size: 0.95rem;
                padding: 12px 16px;
                width: 100%;
                box-sizing: border-box;
            }

            .cakap-field input[type="file"] {
                padding: 10px;
                border-radius: 10px;
            }

            .cakap-btn {
                font-size: 1rem;
                padding: 14px 20px;
                width: 100%;
            }

            .success-title {
                font-size: 1.1rem;
            }

            .success-desc {
                font-size: 0.95rem;
                max-width: 100%;
            }

            .success-icon {
                height: 60px;
                width: 60px;
            }

            /* Alert responsiveness */
            .alert {
                margin: 0 10px 16px 10px;
                width: calc(100% - 20px);
                box-sizing: border-box;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .side {
                display: none;
            }

            .cakap-main {
                padding: 5px;
            }

            .cakap-wrapper,
            .cakap-success {
                width: calc(100% - 10px);
                margin: 0 5px 40px 5px;
                padding: 16px 12px;
            }

            .cakap-title {
                font-size: 1.3rem;
                padding: 8px 16px;
            }

            .cakap-field input,
            .cakap-field select {
                font-size: 0.9rem;
                padding: 10px 14px;
            }

            .alert {
                margin: 0 5px 12px 5px;
                width: calc(100% - 10px);
            }
        }
    </style>

@endsection

@section('script')
    <script>
        function closeAlert(index) {
            document.getElementById('alert-' + index).style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.alert').forEach(function(alert, index) {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000);
            });
        });
    </script>
@endsection
