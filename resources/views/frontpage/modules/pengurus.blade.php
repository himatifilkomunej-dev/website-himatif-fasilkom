@extends('frontpage.layouts.app-frontpage')

@section('title', 'PENGURUS')

@section('pageClass', 'pengurus')
@section('content')

    <!-- Main Content -->
    <main>
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out hidden md:block"
            data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out hidden md:block"
            data-animate-right>
        <!-- Hero Section -->
        <section class="bg-[#FEF9F1] relative px-4 py-16 overflow-hidden md:px-6 md:py-24">
            <!-- Background Patterns -->
            <!-- <div class="absolute top-0 left-0 opacity-20">
                                                                                                                                                                                                        <div class="w-64 h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full"></div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                    <div class="absolute bottom-0 right-0 opacity-20">
                                                                                                                                                                                                        <div class="w-64 h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full"></div>
                                                                                                                                                                                                    </div> -->

            <div class="container-responsive relative z-10 flex justify-center">
                <div class="flex flex-col items-center">
                    <!-- Left Content -->
                    <div class="inline-block px-4 py-3 sm:px-8 sm:py-4 mb-6 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <span class="pengurus-title text-lg sm:text-xl md:text-4xl lg:text-6xl font-semibold">DIVISI &
                            PENGURUS</span>
                    </div>
                    <h1 class="mb-6 text-xl font-black text-gray-900 md:text-8xl opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>
                        HIMATIF
                    </h1>
                    <p class="max-w-6xl text-lg leading-relaxed text-center text-gray-600 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate>
                        {{ $header['2-text2']->content ?? 'HIMATIF memiliki struktur kepengurusan yang bertanggung jawab atas berbagai aspek dan kegiatan organisasi. Setiap divisi memiliki tugas pokok dan fungsi masing-masing untuk mencapai tujuan organisasi secara keseluruhan.' }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Divisi Sections -->
        <section class="py-12 sm:py-16 bg-[#02314A] rounded-t-[2rem] sm:rounded-t-[4rem]">
            <div class="container-responsive space-y-12 sm:space-y-16">
                @foreach ($divisions as $division)
                    <div class="p-6 rounded-2xl md:p-8 flex flex-col justify-center items-center opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <div class="flex flex-col justify-center items-center gap-6 mb-8">
                            @php
                                $divisionIcons = [
                                    'BPH' => '👑',
                                    'PSDM' => '👥',
                                    'LITBANG' => '🔬',
                                    'HUMAS' => '🤝',
                                    'MEDTEK' => '💻',
                                    'MEDFO' => '📱',
                                    'PEMTEK' => '⚙️',
                                ];
                                $divisionColors = [
                                    'BPH' => 'from-gray-500 to-gray-700',
                                    'PSDM' => 'from-blue-500 to-blue-700',
                                    'LITBANG' => 'from-purple-500 to-purple-700',
                                    'HUMAS' => 'from-green-500 to-green-700',
                                    'MEDTEK' => 'from-red-500 to-red-700',
                                    'MEDFO' => 'from-indigo-500 to-indigo-700',
                                    'PEMTEK' => 'from-orange-500 to-orange-700',
                                ];
                                $icon = $divisionIcons[$division->name] ?? '👥';
                                $color = $divisionColors[$division->name] ?? 'from-blue-500 to-blue-700';
                            @endphp

                            <div class="flex items-center justify-center w-40 h-40 text-2xl md:text-3xl rounded-full">
                                <img src="{{ asset('img/bagian/logo-divisi/' . $division->name . '.png') }}" alt=""
                                    class="w-full h-full object-contain">
                            </div>
                            <div class="text-center">
                                <h2
                                    class="mb-2 mt-2 text-2xl font-bold text-white md:text-3xl text-center leading-tight break-words">
                                    {{ $division->name }}</h2>
                                <!-- <p class="text-gray-600">{{ $division->description ?? 'Bertanggung jawab atas berbagai aspek dan kegiatan organisasi' }}</p> -->
                            </div>
                        </div>

                        @php
                            $divisionMembers = $pengurus->filter(function ($user) use ($division) {
                                return $user->status === '1' &&
                                    isset($user->periode[0]) &&
                                    $user->periode[0]['division_id'] === strval($division->id);
                            });

                            $kepalaDivisi = $divisionMembers->filter(function ($user) {
                                return $user->periode[0]['position'] === 'Kepala Divisi';
                            });

                            $anggota = $divisionMembers
                                ->filter(function ($user) {
                                    return $user->periode[0]['position'] !== 'Kepala Divisi';
                                })
                                ->sortBy(function ($user) {
                                    // Urutan prioritas pengurus nama
                                    if ($user->name === 'Arifa Amilani') {
                                        return '0';
                                    }
                                    if ($user->name === 'Anugrah Farel Putra Firdyantara') {
                                        return '1';
                                    }
                                    if ($user->name === 'Muhammad Aka Sahadi') {
                                        return '2';
                                    }
                                    if ($user->name === "Ulul 'Azmi") {
                                        return '3';
                                    }
                                    if ($user->name === 'Aulia Putri Rachmawati') {
                                        return '4';
                                    }

                                    // Prioritas berdasarkan tahun (setelah nama prioritas)
                                    if (isset($user->periode[0]) && $user->periode[0]['year'] === '2022') {
                                        return '5' . $user->name;
                                    }
                                    if (isset($user->periode[0]) && $user->periode[0]['year'] === '2023') {
                                        return '6' . $user->name;
                                    }

                                    // Anggota lain diurutkan berdasarkan nama
                                    return '9' . $user->name;
                                });
                        @endphp

                        @if ($kepalaDivisi->count() > 0)
                            <!-- Kepala Divisi -->
                            <div class="mb-8 w-full">
                                <div class="flex justify-center">
                                    <div class="flex justify-center w-full">
                                        @foreach ($kepalaDivisi as $user)
                                            <div
                                                class="relative w-full max-w-xs mx-auto rounded-2xl overflow-hidden shadow-lg member-card-fixed">

                                                <!-- Bagian Merah -->
                                                <div class="bg-[#910E19] relative pt-6 pb-4 px-6 member-card-red-section"
                                                    style="clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px);">
                                                    <!-- Foto Profil -->
                                                    <div class="flex justify-center mb-4">
                                                        @if ($user->photo)
                                                            <img src="{{ asset('storage/' . $user->photo) }}"
                                                                alt="{{ $user->name }}"
                                                                class="w-32 h-32 object-cover rounded-full border-4 border-[#FEF9F1] shadow-md">
                                                        @else
                                                            <div
                                                                class="w-32 h-32 flex items-center justify-center rounded-full bg-gray-300 text-4xl">
                                                                👤</div>
                                                        @endif
                                                    </div>
                                                    <!-- Nama & Jabatan -->
                                                    <div class="text-center px-4 member-name-container">
                                                        <h4 class="text-xl font-bold text-white mb-2 member-name-text">
                                                            {{ $user->name }}
                                                        </h4>
                                                        <p class="text-sm text-white/90">
                                                            {{ $user->periode[0]['position'] }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Bagian Krem -->
                                                <div
                                                    class="bg-[#FEF9F1] flex justify-between items-center px-6 py-3 rounded-b-2xl member-card-cream-section">
                                                    <!-- Panah -->
                                                    <span class="text-[#910E19] text-3xl font-bold">→</span>
                                                    <!-- Icon Sosmed -->
                                                    <div class="flex gap-3">
                                                        @if ($user->linkedin)
                                                            <a href="{{ $user->linkedin }}" target="_blank"
                                                                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                <svg width="18" height="18" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        @if ($user->instagram)
                                                            <a href="{{ $user->instagram }}" target="_blank"
                                                                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                                    fill="currentColor">
                                                                    <path
                                                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.80-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($anggota->count() > 0)
                            <!-- Anggota -->
                            <div class="mb-8 w-full">
                                <div class="flex justify-center">
                                    <div
                                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 w-full max-w-6xl">
                                        @foreach ($anggota as $user)
                                            <div
                                                class="relative w-full max-w-xs mx-auto rounded-2xl overflow-hidden shadow-lg member-card-fixed">

                                                <!-- Bagian Merah -->
                                                <div class="bg-[#910E19] relative pt-6 pb-4 px-6 member-card-red-section"
                                                    style="clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px);">
                                                    <!-- Foto Profil -->
                                                    <div class="flex justify-center mb-4">
                                                        @if ($user->photo)
                                                            <img src="{{ asset('storage/' . $user->photo) }}"
                                                                alt="{{ $user->name }}"
                                                                class="w-32 h-32 object-cover rounded-full border-4 border-[#FEF9F1] shadow-md">
                                                        @else
                                                            <div
                                                                class="w-32 h-32 flex items-center justify-center rounded-full bg-gray-300 text-4xl">
                                                                👤</div>
                                                        @endif
                                                    </div>
                                                    <!-- Nama & Jabatan -->
                                                    <div class="text-center px-4 member-name-container">
                                                        <h4 class="text-xl font-bold text-white mb-2 member-name-text">
                                                            {{ $user->name }}
                                                        </h4>
                                                        <p class="text-sm text-white/90">
                                                            {{ $user->periode[0]['position'] }}</p>
                                                    </div>
                                                </div>

                                                <!-- Bagian Krem -->
                                                <div
                                                    class="bg-[#FEF9F1] flex justify-between items-center px-6 py-3 rounded-b-2xl member-card-cream-section">
                                                    <!-- Panah -->
                                                    <span class="text-[#910E19] text-3xl font-bold">→</span>
                                                    <!-- Icon Sosmed -->
                                                    <div class="flex gap-3">
                                                        @if ($user->linkedin)
                                                            <a href="{{ $user->linkedin }}" target="_blank"
                                                                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                <svg width="18" height="18" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        @if ($user->instagram)
                                                            <a href="{{ $user->instagram }}" target="_blank"
                                                                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                                    fill="currentColor">
                                                                    <path
                                                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.80-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.40z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($division->subDivisions->count() > 0)
                            @foreach ($division->subDivisions as $subdivision)
                                @php
                                    $subdivisionMembers = $pengurus
                                        ->filter(function ($user) use ($subdivision) {
                                            return $user->status === '1' &&
                                                isset($user->periode[0]) &&
                                                $user->periode[0]['division_id'] === strval($subdivision->id);
                                        })
                                        ->sortBy(function ($user) {
                                            // Urutan prioritas pengurus nama
                                            if ($user->name === 'Arifa Amilani') {
                                                return '0';
                                            }
                                            if ($user->name === 'Anugrah Farel Putra Firdyantara') {
                                                return '1';
                                            }
                                            if ($user->name === 'Muhammad Aka Sahadi') {
                                                return '2';
                                            }
                                            if ($user->name === "Ulul 'Azmi") {
                                                return '3';
                                            }
                                            if ($user->name === 'Aulia Putri Rachmawati') {
                                                return '4';
                                            }

                                            // Prioritas berdasarkan tahun (setelah nama prioritas)
                                            if (isset($user->periode[0]) && $user->periode[0]['year'] === '2022') {
                                                return '5' . $user->name;
                                            }
                                            if (isset($user->periode[0]) && $user->periode[0]['year'] === '2023') {
                                                return '6' . $user->name;
                                            }

                                            // Anggota lain diurutkan berdasarkan nama
                                            return '9' . $user->name;
                                        });
                                @endphp

                                @if ($subdivisionMembers->count() > 0)
                                    <!-- Subdivisi -->
                                    <div class="mb-12 w-full opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                                        data-animate>
                                        <h3
                                            class="mb-8 text-2xl font-bold text-white text-center leading-tight break-words px-4">
                                            {{ $subdivision->name }}
                                        </h3>

                                        <div class="flex justify-center">
                                            <div
                                                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 w-full max-w-6xl">
                                                @foreach ($subdivisionMembers as $user)
                                                    <div
                                                        class="relative w-full max-w-xs mx-auto rounded-2xl overflow-hidden shadow-lg member-card-fixed">

                                                        <!-- Bagian Merah -->
                                                        <div class="bg-[#910E19] relative pt-6 pb-4 px-6 member-card-red-section"
                                                            style="clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px);">

                                                            <!-- Foto Profil -->
                                                            <div class="flex justify-center mb-4">
                                                                @if ($user->photo)
                                                                    <img src="{{ asset('storage/' . $user->photo) }}"
                                                                        alt="{{ $user->name }}"
                                                                        class="w-32 h-32 object-cover rounded-full border-4 border-[#FEF9F1] shadow-md">
                                                                @else
                                                                    <div
                                                                        class="w-32 h-32 flex items-center justify-center rounded-full bg-gray-300 text-4xl">
                                                                        👤</div>
                                                                @endif
                                                            </div>

                                                            <!-- Nama & Jabatan -->
                                                            <div class="text-center px-4 member-name-container">
                                                                <h4
                                                                    class="text-xl font-bold text-white mb-2 member-name-text">
                                                                    {{ $user->name }}
                                                                </h4>
                                                                <p class="text-sm text-white/90">
                                                                    {{ $user->periode[0]['position'] }}</p>
                                                            </div>
                                                        </div>

                                                        <!-- Bagian Krem -->
                                                        <div
                                                            class="bg-[#FEF9F1] flex justify-between items-center px-6 py-3 rounded-b-2xl member-card-cream-section">
                                                            <!-- Panah -->
                                                            <span class="text-[#910E19] text-3xl font-bold">→</span>

                                                            <!-- Icon Sosmed -->
                                                            <div class="flex gap-3">
                                                                @if ($user->linkedin)
                                                                    <a href="{{ $user->linkedin }}" target="_blank"
                                                                        class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                        <svg width="18" height="18"
                                                                            fill="currentColor" viewBox="0 0 24 24">
                                                                            <path
                                                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                        </svg>
                                                                    </a>
                                                                @endif
                                                                @if ($user->instagram)
                                                                    <a href="{{ $user->instagram }}" target="_blank"
                                                                        class="w-10 h-10 flex items-center justify-center rounded-md bg-[#910E19] text-white hover:bg-[#7a0c15] transition-colors duration-200">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 24 24" fill="currentColor">
                                                                            <path
                                                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                                        </svg>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        </section>
    </main>

@endsection

@section('style')
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

        .from-gray-200 {
            --tw-gradient-from: #e5e7eb;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(229, 231, 235, 0));
        }

        .to-gray-300 {
            --tw-gradient-to: #d1d5db;
        }

        .from-gray-300 {
            --tw-gradient-from: #d1d5db;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(209, 213, 219, 0));
        }

        .to-gray-500 {
            --tw-gradient-to: #6b7280;
        }

        .from-gray-500 {
            --tw-gradient-from: #6b7280;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(107, 114, 128, 0));
        }

        .to-gray-700 {
            --tw-gradient-to: #374151;
        }

        .from-blue-500 {
            --tw-gradient-from: #3b82f6;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(59, 130, 246, 0));
        }

        .to-blue-700 {
            --tw-gradient-to: #1d4ed8;
        }

        .from-purple-500 {
            --tw-gradient-from: #8b5cf6;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(139, 92, 246, 0));
        }

        .to-purple-700 {
            --tw-gradient-to: #7c3aed;
        }

        .from-indigo-500 {
            --tw-gradient-from: #6366f1;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(99, 102, 241, 0));
        }

        .to-indigo-700 {
            --tw-gradient-to: #4338ca;
        }

        .from-orange-500 {
            --tw-gradient-from: #f97316;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(249, 115, 22, 0));
        }

        .to-orange-700 {
            --tw-gradient-to: #c2410c;
        }

        /* Member card hover effects */
        .member-card {
            transition: all 0.3s ease;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Responsive design and container utilities */
        .container-responsive {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (min-width: 640px) {
            .container-responsive {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .container-responsive {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Ensure proper spacing */
        .space-y-16>*+* {
            margin-top: 4rem;
        }

        .space-y-8>*+* {
            margin-top: 2rem;
        }

        .space-y-4>*+* {
            margin-top: 1rem;
        }

        .space-y-6>*+* {
            margin-top: 1.5rem;
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

        /* Shadow utilities */
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .shadow-yellow-500\/30 {
            box-shadow: 0 10px 15px -3px rgba(245, 158, 11, 0.3), 0 4px 6px -2px rgba(245, 158, 11, 0.1);
        }

        /* Rounded utilities */
        .rounded-2xl {
            border-radius: 1rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        /* Grid centering utilities */
        .max-w-6xl {
            max-width: 72rem;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        .w-full {
            width: 100%;
        }

        /* Grid utilities with consistent 3-column max layout */
        .grid {
            display: grid;
            place-items: center;
            gap: 1.5rem;
            max-width: 100%;
            justify-content: center;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, 17rem);
        }

        @media (min-width: 640px) {
            .sm\:grid-cols-2 {
                grid-template-columns: repeat(2, 17rem);
                gap: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, 17rem);
                gap: 2rem;
            }
        }

        /* Remove 4-column support to maintain 3-column max */
        .lg\:grid-cols-4,
        .xl\:grid-cols-4 {
            grid-template-columns: repeat(3, 17rem) !important;
        }

        /* Ensure all grids use consistent card sizes */
        .grid>.member-card-fixed {
            width: 17rem !important;
            max-width: 17rem !important;
        }

        /* Override any responsive variations to maintain consistency */
        @media (min-width: 640px) {
            .member-card-fixed {
                width: 17rem !important;
                min-width: 17rem !important;
                max-width: 17rem !important;
            }
        }

        @media (min-width: 768px) {
            .member-card-fixed {
                width: 17rem !important;
                min-width: 17rem !important;
                max-width: 17rem !important;
            }
        }

        @media (min-width: 1024px) {
            .member-card-fixed {
                width: 17rem !important;
                min-width: 17rem !important;
                max-width: 17rem !important;
            }
        }

        /* Force consistent grid item sizing - maximum 3 columns */
        .grid-cols-1>*,
        .sm\\:grid-cols-2>*,
        .lg\\:grid-cols-3>* {
            width: 17rem !important;
            max-width: 17rem !important;
            min-width: 17rem !important;
            justify-self: center !important;
        }

        /* Ensure grid containers center their content when less than 3 items */
        .grid {
            justify-content: center !important;
        }

        /* Special styling for kepala divisi to always center */
        .flex.justify-center .member-card-fixed {
            margin: 0 auto !important;
        }

        /* If multiple kepala divisi, arrange them centered with gap */
        .flex.justify-center {
            gap: 2rem !important;
            flex-wrap: wrap !important;
        }

        /* Override any existing 4-column rules */
        .grid-cols-4,
        .lg\\:grid-cols-4,
        .xl\\:grid-cols-4 {
            grid-template-columns: repeat(3, 17rem) !important;
        }

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

        /* Custom font-weight for DIVISI & PENGURUS title */
        .pengurus-title {
            font-weight: 700;
        }

        /* Hover overlay styles */
        .group:hover .w-72 {
            transform: scale(1.02);
        }

        /* Smooth transitions for cards */
        .group .w-72 {
            transition: transform 0.3s ease;
        }

        /* Social media button hover effects */
        .group .absolute a {
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .group:hover .absolute a {
            transform: translateY(0);
            opacity: 1;
        }

        .group:hover .absolute a:nth-child(1) {
            transition-delay: 0.1s;
        }

        .group:hover .absolute a:nth-child(2) {
            transition-delay: 0.2s;
        }

        /* Ensure overlay covers the entire card including clip-path */
        .group .absolute.inset-0 {
            border-radius: 1rem;
        }

        /* Consistent card layout for all cards */
        .member-card {
            width: 100%;
            max-width: 20rem;
            margin: 0 auto;
        }

        .member-card-fixed {
            width: 100% !important;
            max-width: 20rem !important;
            margin: 0 auto !important;
        }

        @media (min-width: 640px) {

            .member-card,
            .member-card-fixed {
                max-width: 18rem !important;
            }
        }

        @media (min-width: 1024px) {

            .member-card,
            .member-card-fixed {
                max-width: 17rem !important;
            }
        }

        /* Ensure names can wrap and stay centered */
        .member-name {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.25;
        }

        /* Leading tight for better line spacing */
        .leading-tight {
            line-height: 1.25;
        }

        /* Padding for better text spacing */
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Flexbox card layout */
        .flex-col {
            display: flex;
            flex-direction: column;
        }

        .flex-grow {
            flex-grow: 1;
        }

        /* Fixed card dimensions for absolute consistency */
        .member-card-fixed {
            width: 17rem !important;
            min-width: 17rem !important;
            max-width: 17rem !important;
            height: 19rem !important;
            min-height: 19rem !important;
            max-height: 19rem !important;
            display: flex !important;
            flex-direction: column !important;
            margin: 0 auto !important;
            flex-shrink: 0 !important;
            flex-grow: 0 !important;
        }

        /* Fixed red section height with balanced spacing */
        .member-card-red-section {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-evenly !important;
            align-items: center !important;
            min-height: 11rem !important;
            padding: 0.5rem 1.5rem !important;
        }

        /* Fixed cream section height */
        .member-card-cream-section {
            height: 4rem !important;
            min-height: 4rem !important;
            max-height: 4rem !important;
            flex-shrink: 0 !important;
        }

        /* Name container with balanced spacing */
        .member-name-container {
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            overflow: hidden !important;
        }

        /* Name text with line clamping and better spacing */
        .member-name-text {
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            line-height: 1.3 !important;
            margin-bottom: 0.25rem !important;
        }

        /* Ensure proper card height with flexible content */
        .member-card {
            min-height: 19rem;
            display: flex;
            flex-direction: column;
        }

        /* Basic footer style reset for pengurus page */
        body.pengurus .footer-container {
            background-color: #FEF9F1 !important;
            color: #02314A !important;
        }

        /* Ensure proper footer layout on pengurus page */
        body.pengurus .footer-container .max-w-6xl.mx-auto {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 1.5rem !important;
        }

        @media (min-width: 1024px) {
            body.pengurus .footer-container .max-w-6xl.mx-auto {
                flex-direction: row !important;
                justify-content: space-between !important;
                align-items: center !important;
            }
        }

        /* Fix social media section alignment */
        body.pengurus .footer-container .max-w-6xl.mx-auto>div:first-child {
            justify-content: center !important;
        }

        @media (min-width: 1024px) {
            body.pengurus .footer-container .max-w-6xl.mx-auto>div:first-child {
                justify-content: flex-start !important;
            }
        }

        /* Fix website section alignment */
        body.pengurus .footer-container .max-w-6xl.mx-auto>div:last-child {
            justify-content: center !important;
        }

        @media (min-width: 1024px) {
            body.pengurus .footer-container .max-w-6xl.mx-auto>div:last-child {
                justify-content: flex-end !important;
            }
        }

        /* Tighten social media icons spacing */
        body.pengurus .footer-container .max-w-6xl.mx-auto>div:first-child {
            gap: 0.5rem !important;
            /* Reduce gap between icons and text */
        }

        body.pengurus .footer-container .footer-social-icon {
            margin-right: 0.25rem !important;
            /* Reduce space between individual icons */
        }

        body.pengurus .footer-container .footer-social-icon:last-of-type {
            margin-right: 0 !important;
            /* Remove margin from last icon */
        }

        /* Fix content section - ensure alamat (left) and berita terbaru (right) are side by side */
        body.pengurus .footer-container>div>div:nth-child(2) {
            display: flex !important;
            flex-direction: column !important;
            gap: 1.5rem !important;
        }

        @media (min-width: 1024px) {
            body.pengurus .footer-container>div>div:nth-child(2) {
                flex-direction: row !important;
                justify-content: space-between !important;
                gap: 2rem !important;
            }
        }

        /* Center copyright text only */
        body.pengurus .footer-container .text-center p {
            text-align: center !important;
        }

        /* Adjust social media icons spacing - make it slightly wider */
        body.pengurus .footer-container .footer-social-icon {
            margin-right: 0.5rem !important;
            /* Increase from 0.25rem to 0.5rem */
        }

        /* Reduce gap between website icon and text */
        body.pengurus .footer-container .max-w-6xl.mx-auto>div:last-child {
            gap: 0.5rem !important;
            /* Reduce gap between icon and text */
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

            // Observe all elements with data-animate attribute
            const animateElements = document.querySelectorAll('[data-animate]');
            let divisionIndex = 0;

            animateElements.forEach((element, index) => {
                // Add staggered delay for division groups
                if (element.classList.contains('p-6') || element.classList.contains('md\\:p-8')) {
                    element.style.transitionDelay = `${divisionIndex * 200}ms`;
                    divisionIndex++;
                }
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

            // Header section animate on load (without intersection observer)
            setTimeout(() => {
                const headerElements = document.querySelectorAll('.bg-\\[\\#FEF9F1\\] [data-animate]');
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
