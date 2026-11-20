@extends('frontpage.layouts.app-frontpage')

@section('title', 'PENGURUS')

@section('pageClass', 'pengurus')
@section('content')

    <!-- Main Content -->
    <main>
        <img src="{{ asset('img/bagian/3.png') }}"
            class="hidden transition-all duration-1000 ease-out -translate-x-8 opacity-0 header-decoration-left md:block"
            data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="hidden transition-all duration-1000 ease-out translate-x-8 opacity-0 header-decoration-right md:block"
            data-animate-right>
        <!-- Hero Section -->
        <section class="bg-[#FEF9F1] relative px-4 py-16 overflow-hidden md:px-6 md:py-24">
            <!-- Background Patterns -->
            <!-- <div class="absolute top-0 left-0 opacity-20">
                                                                                                                                                                                                                                                                                                                                                                <div class="w-64 h-64 rounded-full bg-gradient-to-br from-gray-200 to-gray-300"></div>
                                                                                                                                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                                                                                                                                            <div class="absolute bottom-0 right-0 opacity-20">
                                                                                                                                                                                                                                                                                                                                                                <div class="w-64 h-64 rounded-full bg-gradient-to-br from-gray-200 to-gray-300"></div>
                                                                                                                                                                                                                                                                                                                                                            </div> -->

            <div class="relative z-10 flex justify-center container-responsive">
                <div class="flex flex-col items-center">
                    <!-- Left Content -->
                    <div class="inline-block px-4 py-3 sm:px-8 sm:py-4 mb-6 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <span class="text-lg font-semibold pengurus-title sm:text-xl md:text-4xl lg:text-6xl">DIVISI &
                            PENGURUS</span>
                    </div>
                    <h1 class="mb-6 text-xl font-black text-gray-900 transition-all duration-1000 ease-out delay-200 translate-y-8 opacity-0 md:text-8xl"
                        data-animate>
                        HIMATIF
                    </h1>
                    <p class="max-w-6xl text-lg leading-relaxed text-center text-gray-600 transition-all duration-1000 ease-out translate-y-8 opacity-0 delay-400"
                        data-animate>
                        {{ $header['2-text2']->content ?? 'HIMATIF memiliki struktur kepengurusan yang bertanggung jawab atas berbagai aspek dan kegiatan organisasi. Setiap divisi memiliki tugas pokok dan fungsi masing-masing untuk mencapai tujuan organisasi secara keseluruhan.' }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Divisi Sections -->
        <section
            class="py-12 sm:py-16 bg-[#02314A] rounded-t-[2rem] sm:rounded-t-[4rem] translate-y-8 transition-all duration-1000 ease-out delay-600"data-animate>
            <div class="space-y-12 container-responsive sm:space-y-16">

                {{-- DROPDOWN --}}
                <div class="flex justify-center transition-all duration-1000 ease-out translate-y-8 mb-14 delay-800"
                    data-animate>
                    <select id="yearSelect"
                        class="
                            w-3/4
                            max-w-xl
                            bg-[#02314A]
                            text-white
                            font-semibold
                            px-6
                            py-3
                            rounded-2xl
                            shadow-lg
                            border-2
                            border-[#FEF9F1]
                            focus:outline-none
                            focus:ring-2
                            focus:ring-white
                            cursor-pointer
                        ">
                        <option value="2025" class="text-white bg-[#02314A]">
                            HIMATIF PERIODE 2025 / 2026
                        </option>
                        <option value="2024" class="text-white bg-[#02314A]">
                            HIMATIF PERIODE 2024 / 2025
                        </option>
                        <option value="2023" class="text-white bg-[#02314A]">
                            HIMATIF PERIODE 2023 / 2024
                        </option>
                        {{-- 
                         --}}
                    </select>
                </div>


                {{-- CONTAINER UTAMA --}}
                <div id="pengurus-container" class="transition-all duration-500 ease-out" aria-live="polite"
                    aria-busy="true">
                    @php
                        $initialDivisionLogos = [
                            'Badan Pengurus Harian' => 'Badan Pengurus Harian.png',
                            'Pengembangan Sumber Daya Mahasiswa' => 'Pengembangan Sumber Daya Mahasiswa.png',
                            'Penelitian dan Pengembangan' => 'Penelitian dan Pengembangan.png',
                            'Hubungan Mahasiswa' => 'Hubungan Mahasiswa.png',
                            'Media & Teknologi' => 'Media & Teknologi.png',
                        ];
                    @endphp

                    <span class="sr-only" role="status">Memuat data pengurus...</span>
                    @foreach ($initialPengurus as $divisionName => $members)
                        @php
                            $divisionMembers = collect($members);
                            $heads = $divisionMembers->filter(
                                fn ($member) => str_contains(strtolower($member['position']), 'kepala divisi'),
                            );
                            $others = $divisionMembers->reject(
                                fn ($member) => str_contains(strtolower($member['position']), 'kepala divisi'),
                            );
                            $divisionLogo = $initialDivisionLogos[$divisionName] ?? null;
                            $isSubdivision = !$divisionLogo;
                        @endphp

                        <div class="flex flex-col items-center p-6 mb-6 rounded-2xl md:p-8">
                            <div class="flex flex-col items-center gap-6 mb-10">
                                @if ($divisionLogo)
                                    <div class="w-40 h-40">
                                        <img src="{{ asset('img/bagian/logo-divisi/' . $divisionLogo) }}"
                                            class="object-contain w-full h-full" alt="Logo {{ $divisionName }}">
                                    </div>
                                @endif

                                @if ($isSubdivision)
                                    <h3 class="text-2xl font-bold text-center text-white">{{ $divisionName }}</h3>
                                @else
                                    <h2 class="mb-12 text-2xl font-bold text-center text-white md:text-3xl">
                                        {{ $divisionName }}
                                    </h2>
                                @endif
                            </div>

                            @if ($heads->isNotEmpty())
                                <div class="flex justify-center w-full mb-10">
                                    @foreach ($heads as $member)
                                        @include('frontpage.modules.partials.pengurus-card-skeleton')
                                    @endforeach
                                </div>
                            @endif

                            @if ($others->isNotEmpty())
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                    @foreach ($others as $member)
                                        @include('frontpage.modules.partials.pengurus-card-skeleton')
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
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

        .rounded-br-2xl {
            border-bottom-right-radius: 1rem;
        }

        .rounded-b-2xl {
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
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
            border-radius: 0 !important;
            overflow: hidden !important;
        }

        .member-card-red-section,
        .member-card-red-section img,
        .member-card-red-section video,
        .profile-image,
        .profile-video {
            border-top-right-radius: 1rem !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .member-card-red-section {
            clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px) !important;
        }

        .member-card-fixed>div:last-child {
            border-bottom-left-radius: 1rem !important;
            border-bottom-right-radius: 1rem !important;
            border-top-left-radius: 0 !important;
            border-top-right-radius: 0 !important;
        }

        /* Fixed red section height with balanced spacing */
        .member-card-red-section {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-end !important;
            align-items: center !important;
            min-height: 11rem !important;
            padding: 0 !important;
            clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px) !important;
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


        #pengurus-container {
            min-height: 24rem;
        }

        .pengurus-loading {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 17rem));
            justify-content: center;
            gap: 1.5rem;
            padding: 2rem 0;
        }

        @media (min-width: 640px) {
            .pengurus-loading {
                grid-template-columns: repeat(2, minmax(0, 17rem));
            }
        }

        @media (min-width: 1024px) {
            .pengurus-loading {
                grid-template-columns: repeat(3, minmax(0, 17rem));
            }
        }

        .pengurus-loading-card {
            width: 17rem;
            height: 19rem;
            overflow: hidden;
            background: transparent;
            border-top-right-radius: 1rem !important;
            border-bottom-right-radius: 1rem !important;
            border-bottom-left-radius: 1rem !important;
            isolation: isolate;
        }

        .pengurus-loading-photo,
        .pengurus-loading-line,
        .pengurus-loading-arrow,
        .pengurus-loading-icon {
            position: relative;
            overflow: hidden;
            background: rgba(254, 249, 241, 0.18);
        }

        .pengurus-loading-photo {
            height: 15rem;
            background: #910E19;
            border-top-right-radius: 1rem !important;
        }

        .pengurus-loading-photo::before {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            width: 20px;
            height: 20px;
            content: '';
            background: #02314A;
            clip-path: polygon(0 0, 100% 0, 0 100%);
        }

        .pengurus-loading-info {
            position: absolute;
            right: 1rem;
            bottom: 1rem;
            left: 1rem;
            z-index: 4;
        }

        .pengurus-loading-line {
            width: 70%;
            height: 0.75rem;
            margin: 0.55rem auto 0;
            border-radius: 9999px;
        }

        .pengurus-loading-line-short {
            width: 45%;
        }

        .pengurus-loading-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
            padding: 0 1.5rem;
            background: #910E19;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        .pengurus-loading-arrow {
            width: 1.75rem;
            height: 0.3rem;
            border-radius: 9999px;
        }

        .pengurus-loading-icons {
            display: flex;
            gap: 0.75rem;
        }

        .pengurus-loading-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(254, 249, 241, 0.75);
            border-radius: 0.375rem;
        }

        .pengurus-loading-photo::after,
        .pengurus-loading-line::after,
        .pengurus-loading-arrow::after,
        .pengurus-loading-icon::after,
        .profile-media-placeholder::after {
            position: absolute;
            inset: 0;
            content: '';
            transform: translateX(-100%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: pengurus-shimmer 1.5s infinite;
        }

        .pengurus-loading-photo::after {
            z-index: 2;
            border-top-right-radius: 1rem;
        }

        @keyframes pengurus-shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        .profile-media-placeholder {
            position: absolute;
            inset: 0;
            z-index: 10;
            overflow: hidden;
            background: #7f1d1d;
            border-top-right-radius: 1rem !important;
            transition: opacity 0.35s ease;
        }

        .profile-media-placeholder::after {
            border-top-right-radius: 1rem !important;
        }

        .profile-media-placeholder.is-hidden {
            opacity: 0;
        }

        .profile-image {
            opacity: 0;
            transition: opacity 0.45s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .profile-image.is-loaded {
            opacity: 1;
        }

        .member-info-overlay {
            background: transparent;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.8);
        }

        /* VIDEO - Initially hidden, controlled by JavaScript */
        .profile-video {
            opacity: 0;
            transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 30;
        }

        .profile-video.show-video {
            opacity: 1;
        }

        @media (prefers-reduced-motion: reduce) {
            .pengurus-loading-photo::after,
            .pengurus-loading-line::after,
            .pengurus-loading-arrow::after,
            .pengurus-loading-icon::after,
            .profile-media-placeholder::after {
                animation: none;
            }

            .profile-image,
            .profile-video {
                transition: none !important;
            }
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

        const pengurusEndpoint = @json(route('frontpage.pengurus.filter'));
        const storageBaseUrl = @json(asset('storage'));
        const memberPlaceholderUrl = @json(asset('img/photo/sections/member-placeholder.png'));
        const initialPengurusYear = @json($initialYear);
        const initialPengurusData = @json($initialPengurus);
        const pengurusCache = new Map();
        pengurusCache.set(String(initialPengurusYear), initialPengurusData);
        let activePengurusRequest = null;
        let activeLoadId = 0;
        let profileVideoObserver = null;

        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('yearSelect');
            loadPengurus(select.value);

            select.addEventListener('change', event => {
                loadPengurus(event.target.value);
            });
        });

        function renderLoadingState(container) {
            const cards = Array.from({ length: 6 }, () => `
                <div class="pengurus-loading-card" aria-hidden="true">
                    <div class="pengurus-loading-photo">
                        <div class="pengurus-loading-info">
                            <div class="pengurus-loading-line"></div>
                            <div class="pengurus-loading-line pengurus-loading-line-short"></div>
                        </div>
                    </div>
                    <div class="pengurus-loading-footer">
                        <div class="pengurus-loading-arrow"></div>
                        <div class="pengurus-loading-icons">
                            <div class="pengurus-loading-icon"></div>
                            <div class="pengurus-loading-icon"></div>
                        </div>
                    </div>
                </div>
            `).join('');

            container.innerHTML = `
                <div class="pengurus-loading" role="status">
                    <span class="sr-only">Memuat data pengurus...</span>
                    ${cards}
                </div>
            `;
        }

        function renderSkeletonCard() {
            return `
                <div class="pengurus-loading-card" aria-hidden="true">
                    <div class="pengurus-loading-photo">
                        <div class="pengurus-loading-info">
                            <div class="pengurus-loading-line"></div>
                            <div class="pengurus-loading-line pengurus-loading-line-short"></div>
                        </div>
                    </div>
                    <div class="pengurus-loading-footer">
                        <div class="pengurus-loading-arrow"></div>
                        <div class="pengurus-loading-icons">
                            <div class="pengurus-loading-icon"></div>
                            <div class="pengurus-loading-icon"></div>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderDivisionSkeleton(divisionName, members) {
            const heads = members.filter(user => isHead(user.position));
            const others = members.filter(user => !isHead(user.position));

            return `
                <div class="flex flex-col items-center p-6 mb-6 rounded-2xl md:p-8">
                    ${renderDivisionHeader(divisionName)}

                    ${heads.length ? `
                        <div class="flex justify-center w-full mb-10">
                            ${heads.map(renderSkeletonCard).join('')}
                        </div>
                    ` : ''}

                    ${others.length ? `
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            ${others.map(renderSkeletonCard).join('')}
                        </div>
                    ` : ''}
                </div>
            `;
        }

        function renderGroupedLoadingState(container, grouped) {
            container.innerHTML = Object.entries(grouped || {})
                .map(([division, members]) => renderDivisionSkeleton(division, members))
                .join('');
        }

        function renderLoadError(container) {
            container.innerHTML = `
                <div class="py-16 text-center text-white" role="alert">
                    <p class="mb-4 text-lg font-semibold">Data pengurus belum berhasil dimuat.</p>
                    <button type="button" data-retry-pengurus
                        class="px-5 py-2 font-semibold text-[#02314A] bg-[#FEF9F1] rounded-full">
                        Coba lagi
                    </button>
                </div>
            `;

            container.querySelector('[data-retry-pengurus]').addEventListener('click', () => {
                loadPengurus(document.getElementById('yearSelect').value, true);
            });
        }

        async function loadPengurus(year, forceRefresh = false) {
            const container = document.getElementById('pengurus-container');
            const loadId = ++activeLoadId;

            if (activePengurusRequest) {
                activePengurusRequest.abort();
            }

            stopProfileVideos();
            container.setAttribute('aria-busy', 'true');

            try {
                let grouped = forceRefresh ? null : pengurusCache.get(year);

                if (grouped) {
                    renderGroupedLoadingState(container, grouped);
                    await new Promise(resolve => requestAnimationFrame(resolve));
                } else {
                    container.style.opacity = '0.45';
                    container.style.pointerEvents = 'none';
                }

                if (!grouped) {
                    activePengurusRequest = new AbortController();
                    const url = new URL(pengurusEndpoint, window.location.origin);
                    url.searchParams.set('year', year);

                    const response = await fetch(url, {
                        signal: activePengurusRequest.signal,
                        headers: { 'Accept': 'application/json' }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}`);
                    }

                    const json = await response.json();
                    grouped = json.data || {};
                    pengurusCache.set(year, grouped);
                }

                if (loadId !== activeLoadId) return;

                container.style.opacity = '1';
                container.style.pointerEvents = 'auto';
                await renderPengurus(grouped, loadId);
                if (loadId !== activeLoadId) return;

                setupVideoHoverControls(container);
                container.setAttribute('aria-busy', 'false');
            } catch (error) {
                if (error.name === 'AbortError' || loadId !== activeLoadId) return;

                console.error('Gagal memuat pengurus:', error);
                container.style.opacity = '1';
                container.style.pointerEvents = 'auto';
                renderLoadError(container);
                container.setAttribute('aria-busy', 'false');
            } finally {
                if (loadId === activeLoadId) {
                    activePengurusRequest = null;
                }
            }
        }

        function stopProfileVideos() {
            if (profileVideoObserver) {
                profileVideoObserver.disconnect();
                profileVideoObserver = null;
            }

            document.querySelectorAll('#pengurus-container .profile-video').forEach(video => {
                video.pause();
                video.removeAttribute('src');
                video.load();
            });
        }

        function hydrateProfileVideo(video) {
            if (!video || video.hasAttribute('src') || !video.dataset.src) return;

            video.preload = 'metadata';
            video.src = video.dataset.src;
            video.load();
        }

        function setupVideoHoverControls(container) {
            const videoCards = container.querySelectorAll('.video-card[data-has-video="true"]');
            if (!videoCards.length) return;

            const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

            if (supportsHover && 'IntersectionObserver' in window) {
                profileVideoObserver = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;

                        hydrateProfileVideo(entry.target.querySelector('.profile-video'));
                        profileVideoObserver.unobserve(entry.target);
                    });
                }, { rootMargin: '120px 0px', threshold: 0.01 });
            }

            videoCards.forEach(card => {
                const video = card.querySelector('.profile-video');
                if (!video) return;

                if (profileVideoObserver) {
                    profileVideoObserver.observe(card);
                }

                video.addEventListener('ended', () => {
                    video.classList.remove('show-video');
                });

                card.addEventListener('mouseenter', () => {
                    if (!supportsHover) return;

                    hydrateProfileVideo(video);
                    const playVideo = () => {
                        if (!card.matches(':hover')) return;
                        video.currentTime = 0;
                        video.classList.add('show-video');
                        video.play().catch(() => {});
                    };

                    if (video.readyState >= HTMLMediaElement.HAVE_CURRENT_DATA) {
                        playVideo();
                    } else {
                        video.addEventListener('loadeddata', playVideo, { once: true });
                    }
                });

                card.addEventListener('mouseleave', () => {
                    video.pause();
                    video.classList.remove('show-video');
                });
            });
        }


        function isHead(position) {
            return [
                'Kepala Divisi',
            ].some(p => position.toLowerCase().includes(p.toLowerCase()));
        }

        function escapeHtml(value) {
            const element = document.createElement('div');
            element.textContent = value == null ? '' : String(value);
            return element.innerHTML;
        }

        function buildStorageUrl(path) {
            if (!path) return memberPlaceholderUrl;

            const encodedPath = String(path)
                .split('/')
                .map(segment => encodeURIComponent(segment))
                .join('/');

            return `${storageBaseUrl}/${encodedPath}`;
        }

        function safeExternalUrl(value) {
            if (!value) return '';

            try {
                const url = new URL(value, window.location.origin);
                return ['http:', 'https:'].includes(url.protocol) ? url.href : '';
            } catch (_) {
                return '';
            }
        }

        function setupProfileImages(section) {
            section.querySelectorAll('.profile-image').forEach(image => {
                const showImage = () => {
                    image.classList.add('is-loaded');
                    image.previousElementSibling?.classList.add('is-hidden');
                };

                image.addEventListener('load', showImage, { once: true });
                image.addEventListener('error', () => {
                    if (image.src !== memberPlaceholderUrl) {
                        image.src = memberPlaceholderUrl;
                    } else {
                        showImage();
                    }
                }, { once: true });

                if (image.complete && image.naturalWidth > 0) {
                    showImage();
                }
            });
        }

        function renderLinkedinIcon() {
            return `
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
        `;
        }

        function renderInstagramIcon() {
            return `
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.80-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
        `;
        }

        function renderSocial(user) {
            let html = '';
            const linkedinUrl = safeExternalUrl(user.linkedin);
            const instagramUrl = safeExternalUrl(user.instagram);

            if (linkedinUrl) {
                html += `
                <a href="${escapeHtml(linkedinUrl)}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="LinkedIn ${escapeHtml(user.name)}"
                    class="w-10 h-10 flex items-center justify-center rounded-md bg-[#FEF9F1] text-[#910E19] hover:bg-[#e8dcc8] transition-colors duration-200">
                    ${renderLinkedinIcon()}
                </a>
                `;
            }

            if (instagramUrl) {
                html += `
                <a href="${escapeHtml(instagramUrl)}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram ${escapeHtml(user.name)}"
                    class="w-10 h-10 flex items-center justify-center rounded-md bg-[#FEF9F1] text-[#910E19] hover:bg-[#e8dcc8] transition-colors duration-200">
                    ${renderInstagramIcon()}
                </a>
                `;
            }

            return html;
        }

        function renderMemberCard(user) {
            let mediaContent = '';
            if (user.profile_video) {
                mediaContent = `
                    <video class="absolute inset-0 w-full h-full object-cover z-[30] profile-video"
                        muted playsinline preload="none" data-src="${escapeHtml(buildStorageUrl(user.profile_video))}"
                        aria-hidden="true"></video>
                `;
            }

            const photoUrl = buildStorageUrl(user.photo);
            const hasVideo = user.profile_video ? 'true' : 'false';

            return `
    <div class="transition-opacity duration-500 ease-out opacity-0 member-card-animate video-card" data-has-video="${hasVideo}">
        <div class="relative overflow-hidden shadow-lg member-card-fixed group">
            <div class="relative flex flex-col justify-end member-card-red-section" style="clip-path: polygon(20px 0, 100% 0, 100% calc(100% - 0px), 0 calc(100% - 0px), 0 20px);">
                
                ${mediaContent}

                <div class="profile-media-placeholder" aria-hidden="true"></div>
                <img src="${escapeHtml(photoUrl)}"
                     class="absolute inset-0 w-full h-full object-cover z-[20] profile-image transition-all duration-1000 ease-out"
                     alt="${escapeHtml(user.name)}" loading="lazy">
                     
                <!-- NAME OVERLAY (z-60) -->
                <div class="relative z-[60] w-full px-4 py-3 text-center member-info-overlay">
                    <h4 class="text-xl font-bold text-white member-name-text">${escapeHtml(user.name)}</h4>
                    <p class="text-sm text-white/90">${escapeHtml(user.position)}</p>
                </div>
            </div>
            
            <div class="bg-[#910E19] flex justify-between px-6 py-3 rounded-b-2xl">
                <span class="text-[#FEF9F1] text-3xl">→</span>
                <div class="flex gap-3">${renderSocial(user)}</div>
            </div>
        </div>
    </div>`;
        }




        function renderDivisionContainer(divisionName, members) {
            const heads = members.filter(u => isHead(u.position));
            const others = members.filter(u => !isHead(u.position));

            return `
            <div class="flex flex-col items-center p-6 mb-6 rounded-2xl md:p-8">

                ${renderDivisionHeader(divisionName)}

                ${heads.length ? `
                                                                                                                                                                        <div class="flex justify-center w-full mb-10">
                                                                                                                                                                            ${heads.map(renderMemberCard).join('')}
                                                                                                                                                                        </div>
                                                                                                                                                                        ` : ''}

                ${others.length ? `
                                                                                                                                                                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                                                                                                                                                            ${others.map(renderMemberCard).join('')}
                                                                                                                                                                        </div>
                                                                                                                                                                        ` : ''}

            </div>`;
        }

        const division_map = {
            'Badan Pengurus Harian': 'Badan Pengurus Harian.png',
            'Pengembangan Sumber Daya Mahasiswa': 'Pengembangan Sumber Daya Mahasiswa.png',
            'Penelitian dan Pengembangan': 'Penelitian dan Pengembangan.png',
            'Hubungan Mahasiswa': 'Hubungan Mahasiswa.png',
            'Media & Teknologi': 'Media & Teknologi.png'
        };


        function renderDivisionHeader(name) {
            const logoFile = division_map[name];
            const isSub = !logoFile;
            const titleTag = isSub ? 'h3' : 'h2';
            return `
                <div class="flex flex-col items-center gap-6 mb-10">
                ${
                    logoFile
                    ? `
                                                                                                                                                                                <div class="w-40 h-40">
                                                                                                                                                                                <img
                                                                                                                                                                                    src="/img/bagian/logo-divisi/${logoFile}"
                                                                                                                                                                                    class="object-contain w-full h-full"
                                                                                                                                                                                    alt="Logo ${name}"
                                                                                                                                                                                />
                                                                                                                                                                                </div>
                                                                                                                                                                            `
                    : ''
                }
                <${titleTag}
                    class="
                    text-center
                    text-white
                    ${isSub
                        ? 'text-2xl font-bold'
                        : 'text-2xl md:text-3xl font-bold mb-12'}
                    "
                >
                    ${name}
                </${titleTag}>
                </div>
            `;
        }


        async function renderPengurus(grouped, loadId) {
            const container = document.getElementById('pengurus-container');
            container.innerHTML = '';
            const divisions = Object.entries(grouped || {});

            if (!divisions.length) {
                container.innerHTML = '<p class="py-16 text-lg text-center text-white">Belum ada data pengurus untuk periode ini.</p>';
                return;
            }

            for (const [division, members] of divisions) {
                if (loadId !== activeLoadId) return;
                container.insertAdjacentHTML(
                    'beforeend',
                    renderDivisionContainer(division, members)
                );

                setupProfileImages(container.lastElementChild);
                await new Promise(resolve => requestAnimationFrame(resolve));
                container.lastElementChild.querySelectorAll('.member-card-animate').forEach(card => {
                    card.style.opacity = '1';
                });
            }
        }

        //  VIDEO PROFILE MODAL (Frontend)
        function playVideoProfile(videoUrl) {
            // Buat modal overlay
            const modalHtml = `
                <div id="video-modal" class="fixed inset-0 bg-black/90 z-[9999] flex items-center justify-center p-4 animate-fade-in">
                    <div class="relative max-w-2xl w-full max-h-[80vh]">
                        <video src="${videoUrl}" autoplay controls class="w-full h-auto shadow-2xl rounded-2xl" style="max-height: 70vh;">
                            Browser tidak support video.
                        </video>
                        <button onclick="closeVideoProfile()" 
                                class="absolute -top-4 -right-4 w-12 h-12 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center text-xl font-bold shadow-lg transition-all duration-200 hover:scale-110 z-[10000]">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <style>
                    @keyframes fade-in {
                        from { opacity: 0; }
                        to { opacity: 1; }
                    }
                    #video-modal video::-webkit-media-controls-overlay-enclosure { opacity: 1 !important; }
                </style>
            `;

            document.body.insertAdjacentHTML('beforeend', modalHtml);

            // Prevent body scroll
            document.body.style.overflow = 'hidden';

            // Close on ESC
            document.addEventListener('keydown', function escHandler(e) {
                if (e.key === 'Escape') closeVideoProfile();
            });
        }

        function closeVideoProfile() {
            const modal = document.getElementById('video-modal');
            if (modal) modal.remove();
            document.body.style.overflow = '';

            // Remove ESC listener
            document.removeEventListener('keydown', arguments.callee);
        }
    </script>
@endsection
