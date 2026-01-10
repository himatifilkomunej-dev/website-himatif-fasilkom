@extends('frontpage.layouts.app-frontpage')

@section('title', 'TENTANG')

@section('pageClass', 'about')
@section('content')

    <!-- Main Content -->
    <main>
        <!-- Decorative Images -->
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out z-10 hidden md:block"
            data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out z-10 hidden md:block"
            data-animate-right>

        <!-- <div class="decorative-side right-side ">
                                                <img src="{{ asset('img/bagian/1.png') }}" alt="decorative right">
                                            </div> -->

        <!-- Tentang HIMATIF Section -->
        <section class="bg-[#FEF9F1] px-4 py-16 sm:py-24 md:py-32 lg:py-40 z-20">
            <div class="container mx-auto max-w-7xl">
                <div class="flex flex-col items-center gap-8 sm:gap-12 lg:gap-16 xl:flex-row">
                    <!-- Left Content -->
                    <div class="flex-1 w-full text-center xl:text-left">
                        <div class="inline-block px-4 py-3 sm:px-6 sm:py-4 lg:px-8 lg:py-4 mb-4 sm:mb-6 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                            data-animate>
                            <span
                                class="tentang-title text-lg sm:text-2xl md:text-4xl lg:text-5xl xl:text-6xl font-semibold">TENTANG</span>
                        </div>
                        <h1 class="mb-4 sm:mb-6 text-3xl sm:text-4xl md:text-6xl lg:text-7xl xl:text-8xl font-black text-gray-900 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                            data-animate>
                            HIMATIF
                        </h1>
                        <p class="z-20 text-sm sm:text-base md:text-lg lg:text-xl leading-relaxed max-w-4xl mx-auto xl:mx-0 text-justify opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                            data-animate>
                            {{ $header['2-text2']->content ?? 'HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas Ilmu Komputer Universitas Jember yang didirikan pada tanggal 4 Agustus 2017. Maksud dan tujuan dari organisasi ini adalah melatih para mahasiswa Teknologi Informasi pada tanggal 4 Agustus 2017.' }}
                        </p>
                    </div>

                    <!-- Right Logo -->
                    <div class="flex justify-center xl:justify-end items-center flex-1 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>
                        <img src="{{ asset('img/logo.png') }}" alt="HIMATIF Logo"
                            class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-80 xl:h-80 object-contain">
                    </div>

                </div>
            </div>
        </section>

        <!-- Filosofi Logo Section -->
        <section class="relative bg-[#FEF9F1] px-4 py-16 md:px-6 overflow-hidden">
            <div class="container mx-auto max-w-7xl">
                <!-- Title -->
                <div class="text-center mb-8 sm:mb-12 md:mb-16 flex justify-center sm:justify-end">
                    <div class="inline-block px-4 py-3 sm:px-6 sm:py-4 lg:px-8 lg:py-4 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate-scroll>
                        <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold">FILOSOFI LOGO</span>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 sm:gap-10 md:gap-12 items-start lg:items-center opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                    data-animate-scroll>
                    <!-- Left Content -->
                    <div class="space-y-4 sm:space-y-6 md:space-y-8">
                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 left-4 sm:left-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2">
                                Lambang Universitas Jember</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                                Menandakan kebanggaan HIMATIF sebagai bagian dari Program Studi Teknologi Informasi
                                UNIVERSITAS JEMBER
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 left-4 sm:left-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2">
                                Orang Mengelilingi Lambang UNEJ</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                                Melambangkan HIMATIF berada dalam naungan Universitas Jember dan merupakan bagian dari
                                keluarga Universitas Jember
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 left-4 sm:left-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2">
                                Lambang Orang yang Saling Merangkul</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                                Mengartikan rasa kekeluargaan, solidaritas yang tinggi, dan kebersamaan, berjumlah enam
                                melambangkan tanggal terbentuknya HIMATIF yaitu tanggal 06
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 left-4 sm:left-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2">
                                Warna Abu-Abu</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                                Bermakna kemantapan kejayaan dan kesejahteraan
                            </p>
                        </div>
                    </div>

                    <!-- Logo in the Middle -->
                    <div class="flex items-center justify-center order-first lg:order-none mb-8 lg:mb-0">
                        <div class="relative">
                            <!-- Decorative background circle -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#910E19] to-[#BFB4A0] rounded-full blur-2xl sm:blur-3xl opacity-20 scale-110">
                            </div>
                            <!-- Logo container -->
                            <div
                                class="relative w-48 h-48 sm:w-64 sm:h-64 md:w-72 md:h-72 lg:w-80 lg:h-80 flex items-center justify-center bg-white rounded-full shadow-xl sm:shadow-2xl border-2 sm:border-4 border-[#910E19]">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo HIMATIF"
                                    class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-64 lg:h-64 object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="space-y-4 sm:space-y-6 md:space-y-8">
                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 right-4 sm:right-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2 text-center sm:text-right">
                                Warna Putih</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed text-center sm:text-right">
                                Bermakna kesucian dan kejujuran
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 right-4 sm:right-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2 text-center sm:text-right">
                                Segi Delapan</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed text-center sm:text-right">
                                Melambangkan bulan terbentuknya HIMATIF yaitu bulan Agustus
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 right-4 sm:right-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2 text-center sm:text-right">
                                Warna Abu-abu dan Putih</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed text-center sm:text-right">
                                Melambangkan Fakultas Ilmu Komputer yang menaungi HIMATIF
                            </p>
                        </div>

                        <div
                            class="relative p-4 sm:p-5 md:p-6 bg-white border-2 border-gray-200 rounded-xl sm:rounded-2xl shadow-lg">
                            <div
                                class="absolute -top-2 sm:-top-3 right-4 sm:right-6 w-4 h-4 sm:w-6 sm:h-6 bg-[#910E19] rounded-full">
                            </div>
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-[#02314A] mb-2 sm:mb-3 pt-1 sm:pt-2 text-center sm:text-right">
                                Garis Berwarna Kuning</h3>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed text-center sm:text-right">
                                Melambangkan sikap optimis dan selalu berpikiran positif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Vision & Mission Section -->
        <section class="relative px-4 sm:px-6 md:px-8 bg-[#02314A] pt-16 sm:pt-24 md:pt-32">
            <!-- Wave Shape Bottom -->
            <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FEF9F1" fill-opacity="1"
                        d="M0,256L80,213.3C160,171,320,85,480,48C640,11,800,21,960,74.7C1120,128,1280,224,1360,272L1440,320L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                    </path>
                </svg>
            </div>
            <div class="container mx-auto pt-8 sm:pt-12 md:pt-18">
                <div class="flex flex-col items-center gap-8 sm:gap-12 lg:gap-16 xl:flex-row">
                    <!-- Person Image -->
                    <div class="flex justify-center lg:w-1/3 mb-0 pb-0 opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate-scroll>
                        <div
                            class="flex items-center justify-center pt-32 w-48 h-48 text-5xl text-gray-600 md:w-full md:h-full rounded-xl md:text-6xl">
                            <img src="{{ asset('img/ulul.png') }}" alt="HIMATIF Member" class="person-image">
                        </div>
                    </div>

                    <!-- Vision & Mission Content -->
                    <div class="space-y-6 sm:space-y-8 lg:w-2/3 w-full opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate-scroll>
                        <!-- Vision -->
                        <div
                            class="relative p-4 sm:p-6 md:p-8 bg-[#FEF9F1] border-2 sm:border-4 border-gray-600 rounded-2xl sm:rounded-3xl w-full sm:w-5/6 md:w-2/3 shadow-lg">
                            <!-- Decorative circle element on the right -->
                            <div
                                class="absolute -right-3 sm:-right-6 top-1/2 -translate-y-1/2 w-4 h-16 sm:w-8 sm:h-32 bg-[#BFB4A0] rounded-full">
                            </div>

                            <div class="relative z-10">
                                <h2
                                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#910E19] mb-3 sm:mb-4 md:mb-6">
                                    VISI</h2>
                                <p class="text-sm sm:text-base md:text-lg leading-relaxed text-gray-800 text-justify">
                                    Terwujudnya mahasiswa berkarakter serta menjadi media untuk mengembangkan potensi
                                    mahasiswa di bidang IPTEK yang didasari tanggung jawab dan sikap profesionalisme.
                                </p>
                            </div>
                        </div>

                        <!-- Mission -->
                        <div
                            class="relative p-4 sm:p-6 md:p-8 bg-gradient-to-br from-gray-50 to-white border-2 sm:border-4 border-gray-600 rounded-2xl sm:rounded-3xl w-full shadow-lg">
                            <!-- Tab folder di atas -->
                            <div
                                class="absolute -top-2 sm:-top-4 left-1/2 -translate-x-1/2 w-16 sm:w-24 md:w-32 h-4 sm:h-6 md:h-8 bg-[#BFB4A0] rounded-full">
                            </div>

                            <div class="relative z-10 pt-2 sm:pt-4">
                                <div class="flex justify-center sm:justify-end">
                                    <h2
                                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#910E19] mb-3 sm:mb-4 md:mb-6">
                                        MISI</h2>
                                </div>
                                <div
                                    class="space-y-2 sm:space-y-3 md:space-y-4 text-sm sm:text-base md:text-lg leading-relaxed text-gray-800">
                                    {!! $visionMission['4-mission_text2']->content ??
                                        '
                                                                                                                                                                                                                                                                                                                                                                        <div class="flex items-start gap-3">
                                                                                                                                                                                                                                                                                                                                                                            <span class="font-semibold text-gray-700 mt-0.5">1.</span>
                                                                                                                                                                                                                                                                                                                                                                            <p class="flex-1 text-justify">Menyelanggarakan kegiatan yang bermanfaat untuk mengembangkan IPTEK.</p>
                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                        <div class="flex items-start gap-3">
                                                                                                                                                                                                                                                                                                                                                                            <span class="font-semibold text-gray-700 mt-0.5">2.</span>
                                                                                                                                                                                                                                                                                                                                                                            <p class="flex-1 text-justify">Meningkatkan kualitas sumber daya manusia di bidang teknologi, kepemimpinan dan profesional.</p>
                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                        <div class="flex items-start gap-3">
                                                                                                                                                                                                                                                                                                                                                                            <span class="font-semibold text-gray-700 mt-0.5">3.</span>
                                                                                                                                                                                                                                                                                                                                                                            <p class="flex-1 text-justify">Mempersiapkan Program Studi Teknologi Informasi di lingkungan masyarakat luas.</p>
                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                        <div class="flex items-start gap-3">
                                                                                                                                                                                                                                                                                                                                                                            <span class="font-semibold text-gray-700 mt-0.5">4.</span>
                                                                                                                                                                                                                                                                                                                                                                            <p class="flex-1 text-justify">Memfasilitasi dan mengembangkan kerjasama antar dosen, mahasiswa, dan alumni dengan industri organisasi baik dalam arah di luar Program Studi Teknologi Informasi.</p>
                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                        <div class="flex items-start gap-3">
                                                                                                                                                                                                                                                                                                                                                                            <span class="font-semibold text-gray-700 mt-0.5">5.</span>
                                                                                                                                                                                                                                                                                                                                                                            <p class="flex-1 text-justify">Melaksanakan setiap kegiatan dengan berlandaskan kepribadian yang penuh tanggung jawab, professional dan berakhlaq sebagai bentuk pengabdian kepada masyarakat Universitas maupun anggota HIMATIF.</p>
                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                        ' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="w-full h-full bg-[#FEF9F1] hidden md:block">
            <img src="{{ asset('img/bagian/horizontal-pattern.png') }}" alt="">
        </div>

        <!-- Data Kepengurusan Section -->
        <section class="px-4 py-12 sm:py-16 md:py-20 lg:py-24 bg-[#FEF9F1]">
            <div class="container mx-auto text-center">
                <div class="inline-block px-4 py-3 sm:px-6 sm:py-4 md:px-8 md:py-4 mb-4 sm:mb-6 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                    data-animate-scroll>
                    <span class="text-lg sm:text-xl md:text-3xl lg:text-4xl xl:text-6xl font-semibold">STRUKTUR
                        KEPENGURUSAN</span>
                </div>

                <div class="w-full h-full mx-auto max-w-4xl sm:max-w-5xl my-8 sm:my-12 md:my-16 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                    data-animate-scroll>
                    <img src="{{ asset('img/bagian/struktur-pengurus.png') }}" class="w-full h-full object-contain"
                        alt="">
                </div>

                <div class="max-w-7xl p-4 sm:p-6 md:p-8 lg:p-10 mx-auto opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                    data-animate-scroll>
                    <!-- All Divisions in single responsive grid -->
                    <div
                        class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                        <!-- Divisi Utama -->
                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-left>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-1.png') }}" alt="BPH">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">BPH</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Badan
                                    Pengurus Harian</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-left>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-8.png') }}" alt="PSDM">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">PSDM</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Pengembangan
                                    Sumber Daya Mahasiswa</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-right>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-7.png') }}" alt="MEDIATEK">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">MEDIATEK</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Media
                                    & Teknologi</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-right>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-3.png') }}" alt="MEDFO">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">MEDFO</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Media
                                    & Informasi</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-right>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-2.png') }}" alt="PEMTEK">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">PEMTEK</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Pengembangan
                                    Minat & Teknologi</small>
                            </div>
                        </div>

                        <!-- Sub Divisi -->
                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-left>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-9.png') }}" alt="LITBANG">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">LITBANG</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Penelitian
                                    dan Pengembangan</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] opacity-0 -translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-left>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-4.png') }}" alt="HUMAS">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">HUMAS</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Hubungan
                                    Masyarakat</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-right>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-5.png') }}" alt="HUBLU">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">HUBLU</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Hubungan
                                    Luar</small>
                            </div>
                        </div>

                        <div class="flex items-center p-3 sm:p-4 font-semibold text-left text-[#02314A] rounded-lg opacity-0 translate-x-8 transition-all duration-1000 ease-out"
                            data-animate-right>
                            <img class="mr-3 sm:mr-4 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain"
                                src="{{ asset('img/bagian/logo-divisi/lodiv-6.png') }}" alt="MEDSOS">
                            <div class="flex flex-col items-start">
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-left">MEDSOS</h3>
                                <small
                                    class="font-normal text-xs sm:text-sm text-gray-600 text-left leading-tight line-clamp-2">Media
                                    Sosial</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Custom styles for the new design */
        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
        }

        .from-red-600 {
            --tw-gradient-from: #dc2626;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(220, 38, 38, 0));
        }

        .to-red-800 {
            --tw-gradient-to: #991b1b;
        }

        .from-yellow-400 {
            --tw-gradient-from: #facc15;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(250, 204, 21, 0));
        }

        .to-yellow-300 {
            --tw-gradient-to: #fde047;
        }

        .from-green-600 {
            --tw-gradient-from: #16a34a;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(22, 163, 74, 0));
        }

        .to-green-700 {
            --tw-gradient-to: #15803d;
        }

        .from-gray-800 {
            --tw-gradient-from: #1f2937;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(31, 41, 55, 0));
        }

        .to-gray-900 {
            --tw-gradient-to: #111827;
        }

        .from-gray-300 {
            --tw-gradient-from: #d1d5db;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(209, 213, 219, 0));
        }

        .to-gray-500 {
            --tw-gradient-to: #6b7280;
        }

        /* Hover effects */
        .hover\:-translate-y-1:hover {
            transform: translateY(-0.25rem);
        }

        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Ensure proper spacing */
        .space-y-8>*+* {
            margin-top: 2rem;
        }

        .space-y-3>*+* {
            margin-top: 0.75rem;
        }

        .space-y-12>*+* {
            margin-top: 3rem;
        }

        .gap-12 {
            gap: 3rem;
        }

        .gap-8 {
            gap: 2rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .gap-4 {
            gap: 1rem;
        }

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

        .decorative-side.right-side {
            right: 0;
        }

        .decorative-side img {
            width: 35px;
            height: 100%;
            object-fit: cover;
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Header decorative images */
        .header-decoration-left {
            position: absolute;
            top: -20px;
            left: 0;
            width: 35px;
            height: auto;
            z-index: 1000;
        }

        .header-decoration-right {
            position: absolute;
            top: -20px;
            right: 0;
            width: 35px;
            height: auto;
            z-index: 1000;
        }

        /* Animation classes */
        .opacity-0 {
            opacity: 0;
        }

        .opacity-100 {
            opacity: 1;
        }

        .translate-y-8 {
            transform: translateY(2rem);
        }

        .translate-y-0 {
            transform: translateY(0);
        }

        .-translate-x-8 {
            transform: translateX(-2rem);
        }

        .translate-x-8 {
            transform: translateX(2rem);
        }

        .translate-x-0 {
            transform: translateX(0);
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .duration-1000 {
            transition-duration: 1000ms;
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .delay-200 {
            transition-delay: 200ms;
        }

        .delay-400 {
            transition-delay: 400ms;
        }

        .delay-600 {
            transition-delay: 600ms;
        }

        /* Custom font-weight for TENTANG title */
        .tentang-title {
            font-weight: 700;
        }
    </style>
@endsection

@section('script')
    <script>
        // Smooth scroll animations with Intersection Observer
        document.addEventListener('DOMContentLoaded', function() {
            // Create intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px 0px 0px'
            };

            // Observer for regular vertical animations (on scroll)
            const observerScroll = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observerScroll.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer for left-to-right animations (3.png)
            const observerLeft = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', '-translate-x-8');
                        entry.target.classList.add('opacity-100', 'translate-x-0');
                        observerLeft.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer for right-to-left animations (4.png)
            const observerRight = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-x-8');
                        entry.target.classList.add('opacity-100', 'translate-x-0');
                        observerRight.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with data-animate-scroll attribute (on scroll)
            const animateScrollElements = document.querySelectorAll('[data-animate-scroll]');
            animateScrollElements.forEach(element => {
                observerScroll.observe(element);
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

            // Header section animate on load (data-animate elements)
            setTimeout(() => {
                const headerElements = document.querySelectorAll('[data-animate]');
                headerElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });

                // Animate header decorative images
                const headerDecorativeLeft = document.querySelectorAll('[data-animate-left]');
                headerDecorativeLeft.forEach(element => {
                    element.classList.remove('opacity-0', '-translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });

                const headerDecorativeRight = document.querySelectorAll('[data-animate-right]');
                headerDecorativeRight.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });
            }, 500);
        });
    </script>
@endsection
