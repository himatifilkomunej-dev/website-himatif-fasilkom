@extends('frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'homepage')

@section('content')
    <!-- Immediate background fix - prevent any delay -->
    <style>
        html,
        body {
            background-color: #FEF9F1 !important;
            background: #FEF9F1 !important;
        }
    </style>
    <!-- Preload gambar utama beranda untuk optimasi loading -->
    <link rel="preload" as="image" href="{{ asset('img/logo1.png') }}">
    <link rel="preload" as="image" href="{{ asset('img/logo2.png') }}">
    <link rel="preload" as="image" href="{{ asset('img/logo3.png') }}">
    <link rel="preload" as="image" href="{{ asset('img/logo4.png') }}">
    <link rel="preload" as="image" href="{{ asset('img/logo5.png') }}">
    <link rel="preload" as="image" href="{{ asset('img/ulul.png') }}">
    {{-- HERO SECTION --}}
    <section class="hero-section" style="background-color: #FEF9F1 !important;">
        <!-- Decorative Side Image -->
        <div class="decorative-side left-side opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
            data-animate-left>
            <img src="{{ asset('img/bagian/1.png') }}" alt="decorative left">
        </div>

        <div class="hero-container">
            <!-- Left Content -->
            <div class="left-content opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="hero-badge">
                    <span class="badge-text font-black">HIMPUNAN MAHASISWA</span>
                </div>
                <h1 class="hero-title">TEKNOLOGI INFORMASI</h1>
                <div class="description-text">
                    <p>
                        HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah<br>
                        Salah satu Organisasi Mahasiswa di Fakultas Ilmu Komputer<br>
                        Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang<br>
                        Mahasiswa Teknologi Informasi pada tanggal 6 Agustus 2017.
                    </p>
                </div>
            </div>

            <!-- Right Content -->
            <div class="right-content opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300" data-animate>
                <div class="person-wrapper">
                    <img src="{{ asset('img/bagian/ulul.png') }}" alt="HIMATIF Member" class="person-image">
                </div>
            </div>
        </div>
    </section>

    {{-- APA YANG KAMI LAKUKAN --}}
    <section class="apa-kami-lakukan relative py-20" style="background: linear-gradient(to bottom, #FEF9F1, #002F49);">
        <!-- Decorative Right Image -->
        <div class="decorative-side right-side-apa opacity-0 translate-x-8 transition-all duration-1000 ease-out"
            data-animate-right>
            <img src="{{ asset('img/bagian/5.png') }}" alt="decorative right">
        </div>

        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6 md:px-12">
            <!-- Content Section - pada mobile akan tampil setelah foto -->
            <div class="w-full md:w-2/3 order-2 md:order-2">
                <h2 class="title font-black opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>APA
                    YANG KAMI LAKUKAN.</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Card -->
                    <div class="bg-[#910E19] text-white px-6 py-6 rounded-[30px] shadow-lg relative opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300"
                        data-animate>
                        <h3 class="font-black text-lg mb-3">Menyusun Proker</h3>
                        <p class="text-sm leading-relaxed">Program kerja dibuat dan dikelola oleh masing-masing divisi di
                            HIMATIF sesuai ruang lingkup masing-masing</p>
                        <span
                            class="absolute -top-3 -right-3 bg-[#5C0B11] text-white w-10 h-10 flex items-center justify-center rounded-full shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </span>
                    </div>
                    <!-- Card -->
                    <div class="bg-[#910E19] text-white px-6 py-6 rounded-[30px] shadow-lg relative opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500"
                        data-animate>
                        <h3 class="font-black text-lg mb-3">Melaksanakan Proker</h3>
                        <p class="text-sm leading-relaxed">Program kerja yang telah dirancang, dilaksanakan dan diikuti oleh
                            seluruh elemen di HIMATIF</p>
                        <span
                            class="absolute -top-3 -right-3 bg-[#5C0B11] text-white w-10 h-10 flex items-center justify-center rounded-full shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </span>
                    </div>
                    <!-- Card -->
                    <div class="bg-[#910E19] text-white px-6 py-6 rounded-[30px] shadow-lg relative opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-700"
                        data-animate>
                        <h3 class="font-black text-lg mb-3">Meningkatkan Kualitas Sumber Daya Mahasiswa</h3>
                        <p class="text-sm leading-relaxed">Output yang diharapkan pada setiap proker yaitu meningkatnya
                            kualitas Sumber Daya Mahasiswa HIMATIF</p>
                        <span
                            class="absolute -top-3 -right-3 bg-[#5C0B11] text-white w-10 h-10 flex items-center justify-center rounded-full shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Image Section - pada mobile akan tampil di atas (order-1) -->
            <div class="flex justify-center md:justify-start mb-10 md:mb-0 relative opacity-0 translate-y-8 transition-all duration-1000 ease-out order-1 md:order-1"
                data-animate>
                <img src="{{ asset('img/bagian/adinadunadan.png') }}" alt="HIMATIF Member"
                    class="adinadunadan-image z-10 relative" />
            </div>
        </div>
    </section>

    {{-- VISI MISI --}}
    <section class="visi-misi-section">
        <!-- Decorative Side Image Left -->
        <div class="decorative-side visi-misi-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
            data-animate-left>
            <img src="{{ asset('img/bagian/6.png') }}" alt="decorative left visi misi">
        </div>
        <div class="container">
            <h2 class="title font-black opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>VISI
                DAN MISI</h2>
            <div class="content">
                <div class="box visi opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
                    <h3>VISI</h3>
                    <p>Terwujudnya mahasiswa berkarakter serta menjadi media untuk mengembangkan potensi mahasiswa di bidang
                        IPTEK yang didasari tanggung jawab dan sikap profesionalisme.</p>
                </div>
                <div class="box misi opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400" data-animate>
                    <h3>MISI</h3>
                    <ol style="counter-reset: item; padding-left: 0;">
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">1.</span>
                            Mengadakan kegiatan yang bertujuan untuk mengembangkan IPTEK.
                        </li>
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">2.</span>
                            Meningkatkan kualitas sumber daya manusia di bidang akademis, kewirausahaan, dan keprofesian.
                        </li>
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">3.</span>
                            Memperkenalkan Program Studi Teknologi Informasi di lingkungan masyarakat luas.
                        </li>
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">4.</span>
                            Menjalin hubungan dan kerjasama atas dasar kekeluargaan dengan organisasi di dalam atau di luar
                            Program Studi Teknologi Informasi.
                        </li>
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">5.</span>
                            Melaksanakan setiap kegiatan dengan berlandaskan disiplin dan penuh tanggung jawab.
                        </li>
                        <li style="display: block; margin-bottom: 0.5em; padding-left: 2em; position: relative;">
                            <span style="position: absolute; left: 0; top: 0; font-weight: bold; color: #910E19;">6.</span>
                            Mempererat tali persaudaraan antar mahasiswa khususnya anggota HIMATIF.
                        </li>
                    </ol>
                </div>
                <div class="photo opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600" data-animate>
                    <img src="{{ asset('img/bagian/artha.png') }}" alt="Foto Ulul" />
                </div>
            </div>
        </div>
    </section>

    {{-- DIVISI --}}
    <section class="divisi-section">
        <div class="container">
            <h2 class="title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>DIVISI</h2>
            <div class="divisi-list">
                <div class="divisi-item opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                    data-animate>
                    <div class="logo-wrapper"><img src="{{ asset('img/logo1.png') }}" alt="BPH"></div>
                    <strong>BPH</strong>
                    <p>Badan Pengurus Harian</p>
                </div>
                <div class="divisi-item opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300"
                    data-animate>
                    <div class="logo-wrapper"><img src="{{ asset('img/logo2.png') }}" alt="PSDM"></div>
                    <strong>PSDM</strong>
                    <p>Pengembangan Sumber Daya Mahasiswa</p>
                </div>
                <div class="divisi-item opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                    data-animate>
                    <div class="logo-wrapper"><img src="{{ asset('img/logo3.png') }}" alt="Litbang"></div>
                    <strong>LITBANG</strong>
                    <p>Penelitian dan Pengembangan</p>
                </div>
                <div class="divisi-item opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500"
                    data-animate>
                    <div class="logo-wrapper"><img src="{{ asset('img/logo4.png') }}" alt="Humas"></div>
                    <strong>HUMAS</strong>
                    <p>Hubungan Mahasiswa</p>
                </div>
                <div class="divisi-item opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                    data-animate>
                    <div class="logo-wrapper"><img src="{{ asset('img/logo5.png') }}" alt="Mediatek"></div>
                    <strong>MEDIATEK</strong>
                    <p>Media & Teknologi</p>
                </div>
            </div>
        </div>
    </section>

    <section id="proker-section">
        <!-- Decorative Side Image Left for Program Kerja -->
        <div class="decorative-side proker-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
            data-animate-left>
            <img src="{{ asset('img/bagian/7.png') }}" alt="decorative left program kerja">
        </div>
        <div class="container">
            <h2 class="section-title font-black opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                data-animate>PROGRAM KERJA</h2>

            <div class="navigation-wrapper opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                data-animate>
                <button type="button" class="swiper-button-prev proker-prev">
                    <span class="nav-button-inner">
                        <svg class="nav-arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </span>
                </button>
                <button type="button" class="swiper-button-next proker-next">
                    <span class="nav-button-inner">
                        <svg class="nav-arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </span>
                </button>
            </div>

            <div class="swiper proker-swiper opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                data-animate>
                <div class="swiper-wrapper">
                    @foreach ($prokers as $proker)
                        <div class="swiper-slide">
                            <div class="proker-card">
                                <div class="card-img">
                                    @if ($proker->logo)
                                        <img src="{{ asset('storage/' . $proker->logo) }}" alt="{{ $proker->name }}">
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                            alt="placeholder">
                                    @endif
                                </div>
                                <div class="card-content">
                                    <h3>{{ $proker->name }}</h3>
                                    <p>{{ substr(strip_tags($proker->description), 0, 60) }}...</p>
                                </div>
                                <a href="{{ route('frontpage.proker.show', $proker->id) }}" class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-arrow-up-right">
                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                        <polyline points="7 7 17 7 17 17"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination proker-pagination"></div>
            </div>
        </div>
    </section>

    {{-- REVIEW ALUMNI --}}
    <section id="alumni-section">
        <!-- Decorative Side Image Left for Alumni Section -->
        <div class="decorative-side alumni-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
            data-animate-left>
            <img src="{{ asset('img/bagian/8.png') }}" alt="decorative left alumni">
        </div>
        <div class="container">
            <h2 class="section-title font-black opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                data-animate>APA KATA ALUMNI KITA?</h2>

            <div class="navigation-wrapper opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                data-animate>
                <button type="button" class="swiper-button-prev alumni-prev">
                    <span class="nav-button-inner">
                        <svg class="nav-arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </span>
                </button>
                <button type="button" class="swiper-button-next alumni-next">
                    <span class="nav-button-inner">
                        <svg class="nav-arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </span>
                </button>
            </div>

            <div class="swiper alumni-swiper opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                data-animate>
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                        <div class="swiper-slide">
                            <div class="alumni-card">
                                <div class="alumni-card-inner">
                                    <div class="alumni-card-front">
                                        <div class="alumni-image-content">
                                            <div class="alumni-card-image">
                                                @if ($review->photo && file_exists(storage_path('app/public/' . $review->photo)))
                                                    <img src="{{ asset('storage/' . $review->photo) }}"
                                                        alt="{{ $review->name }}" class="alumni-img">
                                                @else
                                                    <img src="{{ asset('img/placeholder/profile-placeholder.svg') }}"
                                                        alt="placeholder" class="alumni-img">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="alumni-card-content">
                                            <h3 class="alumni-name">{{ $review->name }}</h3>
                                            @php
                                                $motivationLength = strlen($review->motivation);
                                                $lengthClass = 'short';
                                                if ($motivationLength > 200) {
                                                    $lengthClass = 'extra-long';
                                                } elseif ($motivationLength > 150) {
                                                    $lengthClass = 'long';
                                                } elseif ($motivationLength > 100) {
                                                    $lengthClass = 'medium';
                                                }
                                            @endphp
                                            <p class="alumni-motivation" data-length="{{ $lengthClass }}">
                                                {{ $review->motivation }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="alumni-card-back">
                                        <h4>Pengalaman Kerja</h4>
                                        <p class="alumni-workplace">({{ $review->tempat_kerja }})</p>
                                        <p class="alumni-experience">{{ $review->experience }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination alumni-pagination"></div>
            </div>
        </div>
    </section>




    {{-- CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Prevent background flash on page load */
        body {
            background-color: #FEF9F1 !important;
        }

        /* Ensure hero section background is immediately visible */
        .hero-section {
            background-color: #FEF9F1 !important;
        }

        /* Prevent flash of unstyled content */
        html {
            background-color: #FEF9F1;
        }

        /* --- ALUMNI DECORATIVE LEFT IMAGE --- */
        #alumni-section {
            position: relative;
        }

        .decorative-side.alumni-left {
            position: absolute;
            top: 100px;
            left: 0;
            width: 35px;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            z-index: 1;
            pointer-events: none;
        }

        .decorative-side.alumni-left img {
            width: 35px;
            height: 100%;
            object-fit: cover;
        }

        /* --- PROGRAM KERJA DECORATIVE LEFT IMAGE --- */
        #proker-section {
            position: relative;
        }

        .decorative-side.proker-left {
            position: absolute;
            top: 100px;
            left: 0;
            width: 35px;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            z-index: 1;
            pointer-events: none;
        }

        .decorative-side.proker-left img {
            width: 35px;
            height: 100%;
            object-fit: cover;
        }

        /* --- VISI MISI DECORATIVE LEFT IMAGE --- */
        .visi-misi-section {
            position: relative;
        }

        .visi-misi-section .visi-misi-left {
            position: absolute;
            top: 100px;
            left: 0;
            width: 35px;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            z-index: 1;
            pointer-events: none;
        }

        .visi-misi-section .visi-misi-left img {
            width: 35px;
            height: 100%;
            object-fit: cover;
        }

        /* --- DECORATIVE SIDE IMAGE --- */
        .decorative-side {
            position: absolute;
            top: 0;
            width: 35px;
            height: calc(100% + 100px);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            z-index: 1000;
            pointer-events: none;
            margin-top: -100px;
        }

        .decorative-side.left-side {
            left: 0;
        }

        .decorative-side img {
            width: 35px;
            height: 100%;
            object-fit: cover;
        }

        /* Decorative right image for 'Apa Yang Kami Lakukan' section */
        .decorative-side.right-side-apa {
            position: absolute;
            top: 120px;
            right: 0;
            width: 35px;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            z-index: 1;
            pointer-events: none;
        }

        .decorative-side.right-side-apa img {
            width: 35px;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
        }

        /* Ensure section has proper positioning context */
        .apa-kami-lakukan {
            position: relative;
        }

        .apa-kami-lakukan .title {
            background: #910E19;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 40px;
            display: inline-block;
        }

        /* --- HERO --- */
        .hero-section {
            background-color: #FEF9F1 !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 80px 0;
            position: relative;
        }

        .hero-container {
            display: flex;
            align-items: center;
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 60px;
            width: 100%;
        }

        .left-content {
            flex: 0 0 60%;
            padding-right: 60px;
        }

        .right-content {
            flex: 0 0 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-badge {
            margin-bottom: 30px;
            margin-left: 55px;
        }

        .badge-text {
            background: #910E19;
            color: #FEF9F1;
            padding: 20px 40px;
            border-radius: 60px;
            font-weight: 900;
            font-size: 32px;
            letter-spacing: 1px;
            display: inline-block;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 900;
            color: #1a1a1a;
            margin: 0 0 40px 50px;
            letter-spacing: -1px;
            text-align: left;
        }

        .description-text {
            max-width: 600px;
            margin: 0 0 0 8px;
            text-align: center;
        }

        .person-image {
            width: 320px;
            border-radius: 12px;
        }

        /* --- VISI MISI --- */
        .visi-misi-section {
            background: #013049;
            padding: 40px 20px;
            color: #fff;
        }

        .visi-misi-section .container {
            max-width: 1200px;
            margin: auto;
        }

        .visi-misi-section .title {
            background: #910E19;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 40px;
            display: inline-block;
        }

        .visi-misi-section .content {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 20px;
            align-items: start;
        }

        .visi-misi-section .box {
            background: #FFFAF2;
            color: #000;
            padding: 20px;
            border-radius: 12px 12px 12px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .visi-misi-section .box.visi {
            border-left: 6px solid #910E19;
        }

        .visi-misi-section .box.misi {
            border-left: 6px solid #910E19;
            border-right: 6px solid #013049;
        }

        .visi-misi-section .photo img {
            width: 470px;
            border-radius: 12px;
            transform: translateX(30px);
            margin-left: 100px;
            margin-top: -190px;
        }

        /* --- ADINADUNADAN IMAGE STYLING --- */
        .adinadunadan-image {
            width: 500px !important;
            max-width: none !important;
            border-radius: 12px 12px 0 0 !important;
            margin-left: -100px !important;
            margin-bottom: -80px !important;

            /* Fade effect untuk menyatu dengan background */
            mask: linear-gradient(to bottom,
                    rgba(0, 0, 0, 1) 0%,
                    rgba(0, 0, 0, 1) 60%,
                    rgba(0, 0, 0, 0.8) 80%,
                    rgba(0, 0, 0, 0.3) 90%,
                    rgba(0, 0, 0, 0) 100%) !important;
            -webkit-mask: linear-gradient(to bottom,
                    rgba(0, 0, 0, 1) 0%,
                    rgba(0, 0, 0, 1) 60%,
                    rgba(0, 0, 0, 0.8) 80%,
                    rgba(0, 0, 0, 0.3) 90%,
                    rgba(0, 0, 0, 0) 100%) !important;

            /* Eksperimen dengan properti di bawah ini (uncomment untuk menggunakan): */
            /* height: 600px !important; */
            /* object-fit: cover !important; */
            /* transform: scale(1.5) !important; */
            /* transform: translateX(100px) translateY(-50px) !important; */
            /* margin: 50px !important; */
            /* box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5) !important; */
            /* filter: brightness(1.1) contrast(1.2) !important; */
            /* position: absolute !important; */
            /* top: -100px !important; */
            /* left: 200px !important; */
            /* z-index: 999 !important; */

            /* Alternative fade effects (uncomment salah satu untuk eksperimen): */
            /* mask: linear-gradient(to bottom, rgba(0,0,0,1) 70%, rgba(0,0,0,0) 100%) !important; */
            /* mask: radial-gradient(ellipse at center bottom, rgba(0,0,0,0) 20%, rgba(0,0,0,1) 60%) !important; */
        }

        /* --- DIVISI --- */
        .divisi-section {
            background: linear-gradient(to bottom, #013049 0%, #FEF9F1 100%);
            padding: 60px 20px;
            text-align: center;
        }

        .divisi-section .title {
            background: #910E19;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 40px;
            display: inline-block;
        }

        .divisi-section .divisi-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
            justify-items: center;
        }

        .divisi-section .divisi-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .divisi-section .logo-wrapper {
            width: 120px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 12px;
        }

        .divisi-section .logo-wrapper img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .divisi-section .divisi-item strong {
            font-weight: bold;
            font-size: 15px;
            color: #013049;
            margin-bottom: 4px;
        }

        .divisi-section .divisi-item p {
            color: #013049;
            font-size: 13px;
            margin: 0;
        }

        #proker-section {
            background: linear-gradient(to bottom, #FEF9F1, #013049);
            padding: 60px 20px;
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            display: inline-block;
            background: #9b0d18;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .navigation-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        .proker-swiper,
        .alumni-swiper {
            padding-bottom: 50px;
        }

        .swiper-button-prev,
        .swiper-button-next {
            position: static !important;
            width: auto !important;
            height: auto !important;
            margin: 0 !important;
            background: none !important;
            color: #fff !important;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .nav-button-inner {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            transition: all 0.3s ease;
        }

        .nav-button-inner:hover {
            opacity: 0.7;
        }

        .nav-arrow {
            width: 60%;
            height: auto;
            color: #fff;
        }

        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5) !important;
        }

        .swiper-pagination-bullet-active {
            background: #9b0d18 !important;
        }

        .proker-card {
            flex: 0 0 250px;
            background: #9b0d18;
            border-radius: 20px 20px 20px 20px;
            color: #fff;
            position: relative;
            overflow: hidden;
            padding-bottom: 40px;
            clip-path: path('M 0 0 L 250 0 L 250 calc(100% - 40px) Q 250 100% calc(100% - 40px) 100% L 0 100% Z');
        }

        .card-img {
            background: #ddd;
            height: 250px;
            /* dibuat 1:1 ratio (sama dengan width card 250px) */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px 20px 0 0;
            overflow: hidden;
            position: relative;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .card-content p {
            font-size: 14px;
            line-height: 1.4;
        }

        .card-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #fff;
            color: #013049;
            font-size: 18px;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        /* --- ALUMNI REVIEW --- */
        #alumni-section {
            background: #013049;
            padding: 60px 20px;
            overflow: hidden;
        }

        .section-subtitle {
            color: #fff;
            text-align: center;
            margin-bottom: 40px;
            font-size: 16px;
        }



        .alumni-card {
            flex: 0 0 250px;
            height: 300px;
            perspective: 1000px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alumni-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .alumni-card-front,
        .alumni-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px 20px 20px 20px;
            clip-path: path('M 0 0 L 250 0 L 250 calc(100% - 40px) Q 250 100% calc(100% - 40px) 100% L 0 100% Z');
        }

        .alumni-card-front {
            background: #9b0d18;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
        }

        .alumni-card-back {
            background: #9b0d18;
            color: #fff;
            transform: rotateY(180deg);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .alumni-card:hover .alumni-card-inner {
            transform: rotateY(180deg);
        }

        .alumni-image-content {
            padding: 25px 20px 10px;
            text-align: center;
        }

        .alumni-card-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #f3f2eb;
            padding: 5px;
            border: 3px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            overflow: hidden;
        }

        .alumni-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .alumni-card-content {
            background-color: #f3f2eb;
            color: #000;
            padding: 8px 20px 20px 20px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border-radius: 20px 20px 0 0;
            margin-top: 10px;
            width: 85%;
            min-height: 120px;
            max-height: calc(100% - 100px);
            overflow: hidden;
        }

        .alumni-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 4px;
            color: #000;
        }

        .alumni-motivation {
            font-size: clamp(10px, 2vw, 13px);
            line-height: 1.4;
            color: #000;
            text-align: center;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            flex: 1;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Dynamic font sizing based on content length */
        .alumni-motivation[data-length="short"] {
            font-size: 13px;
            -webkit-line-clamp: unset;
        }

        .alumni-motivation[data-length="medium"] {
            font-size: 12px;
            -webkit-line-clamp: 6;
        }

        .alumni-motivation[data-length="long"] {
            font-size: 11px;
            -webkit-line-clamp: 8;
        }

        .alumni-motivation[data-length="extra-long"] {
            font-size: 10px;
            -webkit-line-clamp: 10;
        }

        .alumni-card-back h4 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff;
        }

        .alumni-workplace {
            font-size: 14px;
            margin-bottom: 15px;
            color: #fff;
            opacity: 0.9;
        }

        .alumni-experience {
            font-size: 14px;
            line-height: 1.5;
            text-align: justify;
            color: #fff;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 10;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        /* --- RESPONSIVE --- */
        @media(max-width:1200px) {
            .hero-container {
                padding: 0 40px;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .person-image {
                width: 280px;
            }

            .visi-misi-section .content {
                grid-template-columns: 1fr 1fr;
                text-align: center;
            }
        }

        @media(max-width:992px) {
            .hero-container {
                flex-direction: column;
                text-align: center;
                padding: 0 30px;
            }

            .left-content {
                flex: none;
                padding-right: 0;
                margin-bottom: 50px;
                order: 2;
            }

            .right-content {
                flex: none;
                order: 1;
                margin-bottom: 30px;
            }

            .hero-badge {
                margin-left: 0;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
                margin: 0 0 20px 0;
                white-space: normal;
                text-align: center;
            }

            .description-text {
                margin: 0 auto;
            }

            .description-text br {
                display: none;
            }

            .divisi-section .divisi-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .visi-misi-section .content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .visi-misi-section .photo {
                order: -1;
                text-align: center;
                margin-bottom: 20px;
            }

            .visi-misi-section .photo img {
                transform: none;
                margin: 0 auto;
            }
        }

        @media(max-width:768px) {
            .hero-section {
                padding: 60px 0;
            }

            .hero-container {
                padding: 0 25px;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .person-image {
                width: 240px;
            }

            .badge-text {
                font-size: 18px;
                padding: 16px 40px;
            }

            .apa-kami-lakukan .grid {
                grid-template-columns: 1fr;
            }

            /* Responsive layout untuk section Apa Yang Kami Lakukan */
            .apa-kami-lakukan .max-w-7xl {
                flex-direction: column !important;
            }

            /* Rata tengah judul pada mobile */
            .apa-kami-lakukan .w-full {
                text-align: center !important;
            }

            /* Posisikan foto adinadunadan di atas dan di tengah pada mobile */
            .adinadunadan-image {
                width: 350px !important;
                margin: 0 auto 40px auto !important;
                transform: none !important;
                position: relative !important;
                display: block !important;
            }

            .divisi-section .divisi-list {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Kurangi jarak visi misi dengan foto artha pada mobile */
            .visi-misi-section .content {
                gap: 15px !important;
            }

            .visi-misi-section .photo {
                margin-bottom: 15px !important;
            }
        }

        @media(max-width:576px) {
            .hero-container {
                padding: 0 20px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .person-image {
                width: 200px;
            }

            .badge-text {
                font-size: 16px;
                padding: 14px 30px;
            }

            .description-text p {
                font-size: 0.95rem;
            }

            .divisi-section .divisi-list {
                grid-template-columns: 1fr;
            }
        }

        /* Hide all decorative side images on mobile and tablet */
        @media(max-width:768px) {
            .decorative-side {
                display: none !important;
            }
        }

        /* Show decorative images on larger screens with animation support */
        @media(min-width:769px) {
            .decorative-side {
                display: flex !important;
            }
        }
    </style>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Immediate background enforcement - no delay allowed
        (function() {
            document.documentElement.style.background = '#FEF9F1';
            document.documentElement.style.backgroundColor = '#FEF9F1';
            document.body.style.background = '#FEF9F1';
            document.body.style.backgroundColor = '#FEF9F1';
        })();

        // Prevent flash of unstyled content and layout shifts
        document.documentElement.style.setProperty('--hero-bg', '#FEF9F1');
        document.body.style.backgroundColor = '#FEF9F1';

        // Ensure page is ready before showing content
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializePage);
        } else {
            initializePage();
        }

        function initializePage() {
            // Ensure hero section background is set immediately
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                heroSection.style.backgroundColor = '#FEF9F1';
            }
        }

        // Smooth scroll animations with Intersection Observer
        document.addEventListener('DOMContentLoaded', function() {
            // Create intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            // Observer for regular vertical animations
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer for left-to-right animations (decorative images)
            const observerLeft = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', '-translate-x-8');
                        entry.target.classList.add('opacity-100', 'translate-x-0');
                        observerLeft.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer for right-to-left animations (decorative image 5.png)
            const observerRight = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-x-8');
                        entry.target.classList.add('opacity-100', 'translate-x-0');
                        observerRight.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with data-animate attribute
            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach(element => {
                observer.observe(element);
            });

            // Observe left-to-right decorative images
            const animateLeftElements = document.querySelectorAll('[data-animate-left]');
            animateLeftElements.forEach(element => {
                observerLeft.observe(element);
            });

            // Observe right-to-left decorative images
            const animateRightElements = document.querySelectorAll('[data-animate-right]');
            animateRightElements.forEach(element => {
                observerRight.observe(element);
            });

            // Hero section animate on load (without intersection observer)
            setTimeout(() => {
                const heroElements = document.querySelectorAll('.hero-section [data-animate]');
                heroElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });

                // Animate hero decorative image
                const heroDecorativeElements = document.querySelectorAll(
                    '.hero-section [data-animate-left]');
                heroDecorativeElements.forEach(element => {
                    element.classList.remove('opacity-0', '-translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });
            }, 500);
        });

        // Program Kerja Swiper
        const prokerSwiper = new Swiper('.proker-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.proker-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.proker-next',
                prevEl: '.proker-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });

        // Alumni Swiper
        const alumniSwiper = new Swiper('.alumni-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.alumni-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.alumni-next',
                prevEl: '.alumni-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                }
            }
        });
    </script>
@endsection
