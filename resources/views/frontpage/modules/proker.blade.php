@extends('frontpage.layouts.app-frontpage')

@section('title', 'PROKER')

@section('pageClass', 'proker')
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

            <div class="container relative z-10 mx-auto flex justify-center">
                <div class="flex flex-col items-center">
                    <div class="inline-block px-8 py-4 mb-6 text-white rounded-full bg-[#910E19] opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <span class="proker-title text-xl md:text-6xl font-semibold">PROGRAM KERJA</span>
                    </div>
                    <h1 class="mb-6 text-xl font-black text-gray-900 md:text-8xl opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>
                        HIMATIF
                    </h1>
                    <p class="max-w-6xl text-lg leading-relaxed text-gray-600 text-center opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate>
                        {{ $header['2-text2']->content ?? 'Program kerja HIMATIF merupakan sejumlah kegiatan dan inisiatif yang ditujukan untuk meningkatkan kualitas mahasiswa Teknologi Informasi.' }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Program Kerja Section -->
        <section class="bg-[#02314A] px-4 py-16 md:px-6 rounded-t-[4rem]">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($prokers as $proker)
                        @php
                            $prokerIcons = [
                                'COD' => '💻',
                                'Tech Workshop' => '🎯',
                                'HIMATIF Gathering' => '🤝',
                                'Research Day' => '🔬',
                                'Web Development' => '🌐',
                                'HIMATIF Competition' => '🏆',
                                'Mobile App Dev' => '📱',
                                'Leadership Training' => '🎓',
                                'Career Preparation' => '💼',
                                'UI/UX Workshop' => '🎨',
                                'Innovation Challenge' => '🌟',
                                'AI & Machine Learning' => '🤖',
                            ];

                            $prokerBackgrounds = [
                                'COD' => '#8B2332',
                                'Tech Workshop' => '#2D5F3F',
                                'HIMATIF Gathering' => '#6B4C9A',
                                'Research Day' => '#B8352A',
                                'Web Development' => '#D4A017',
                                'HIMATIF Competition' => '#4B5FA0',
                                'Mobile App Dev' => '#C75B7A',
                                'Leadership Training' => '#2A9D8F',
                                'Career Preparation' => '#E67E22',
                                'UI/UX Workshop' => '#0891B2',
                                'Innovation Challenge' => '#84CC16',
                                'AI & Machine Learning' => '#E11D48',
                            ];

                            $divisionColors = [
                                'PSDM' => 'blue',
                                'LITBANG' => 'red',
                                'HUMAS' => 'purple',
                                'MEDIATEK' => 'green',
                            ];

                            // Mapping program kerja ke divisi berdasarkan data yang diberikan
                            $prokerToDivision = [
                                // PSDM - Pengembangan Sumber Daya Mahasiswa
                                'COD' => 'PSDM',
                                'Character Organization Development (COD)' => 'PSDM',
                                'MAKRAB' => 'PSDM',
                                'Malam Keakraban' => 'PSDM',
                                'HIMATIF TALK' => 'PSDM',
                                'HIMATIF Talk' => 'PSDM',
                                'MUBES TI' => 'PSDM',
                                'Musyawarah Besar (MUBES)' => 'PSDM',
                                'OPREC' => 'PSDM',
                                'Open Recruitment (OPREC)' => 'PSDM',
                                'PEMILU' => 'PSDM',
                                'Pemilihan Umum (PEMILU)' => 'PSDM',
                                'IThings' => 'PSDM',

                                // LITBANG - Penelitian & Pengembangan
                                'ITDEV' => 'LITBANG',
                                'IT Development Training (ITDev)' => 'LITBANG',
                                'ITEC' => 'LITBANG',
                                'Information Technology Competition (ITEC)' => 'LITBANG',
                                'PEMBINAAN GEMASTIK' => 'LITBANG',
                                'Pembinaan Gemastik' => 'LITBANG',
                                'KOMPAK' => 'LITBANG',
                                'Komunitas Pengembangan Akademik (KOMPAK)' => 'LITBANG',
                                'TIC' => 'LITBANG',
                                'Technology Innovative Challenge (TIC)' => 'LITBANG',
                                'PEMETAAN MINAT BAKAT' => 'LITBANG',
                                'Pemetaan Minat dan Bakat' => 'LITBANG',
                                'LITE COMPETITION' => 'LITBANG',
                                'KOTLIN' => 'LITBANG',
                                'FESTECH' => 'LITBANG',

                                // HUMAS - Hubungan Mahasiswa
                                'Talk in Tech (TIT)' => 'HUMAS',
                                'TIT' => 'HUMAS',
                                'SARASEHAN' => 'HUMAS',
                                'Sarasehan' => 'HUMAS',
                                'DIESGREET' => 'HUMAS',
                                'Dies Natalis & Meet and Greet (DIESGREET)' => 'HUMAS',
                                'SkripsITalk' => 'HUMAS',
                                'HIMATIF PEDULI' => 'HUMAS',

                                // MEDIATEK - Media & Teknologi
                                'MEDIATEK TRAINING' => 'MEDIATEK',
                                'MEDTRA' => 'MEDIATEK',
                                'Pelatihan Mediatek (MEDTRA)' => 'MEDIATEK',
                            ];

                            $icon = $prokerIcons[$proker->name] ?? '💼';
                            $bgColor = $prokerBackgrounds[$proker->name] ?? '#8B2332';

                            // Tentukan divisi berdasarkan nama proker
                            $divisionName = $prokerToDivision[$proker->name] ?? 'PSDM';

                            // Fallback ke sistem lama jika ada data dari prokerUsers
                            if (isset($proker->prokerUsers) && $proker->prokerUsers->count() > 0) {
                                $firstUser = $proker->prokerUsers->first();
                                if ($firstUser && $firstUser->prokerDivision) {
                                    $userDivisionName = $firstUser->prokerDivision->name ?? null;
                                    if ($userDivisionName) {
                                        $divisionName = $userDivisionName;
                                    }
                                }
                            }

                            $divisionColor = $divisionColors[$divisionName] ?? 'blue';
                        @endphp

                        <!-- Wrapper agar arrow tidak ketutup overflow -->
                        <a href="{{ route('frontpage.proker.show', $proker->id) }}"
                            class="relative block group opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                            data-animate>

                            <!-- Card -->
                            <div
                                class="overflow-hidden shadow-lg proker-card 
                                        rounded-br-[8rem] rounded-t-3xl rounded-bl-3xl 
                                        hover:shadow-2xl transition-all duration-300 
                                        h-[420px] flex flex-col bg-[#910E19]">

                                <!-- Logo Icon -->
                                <div
                                    class="absolute top-6 left-1/2 transform -translate-x-1/2 w-38 h-38 flex items-center justify-center">
                                    @if ($proker->logo)
                                        <img src="{{ asset('storage/' . $proker->logo) }}" alt="{{ $proker->name }}"
                                            class="w-32 h-32 object-cover rounded-lg border-2 border-white/20">
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                            alt="placeholder" class="w-32 h-32 object-contain">
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="relative z-10 flex flex-col flex-1 p-6">
                                    <!-- Title -->
                                    @php
                                        $nameLength = strlen($proker->name);
                                        if ($nameLength <= 14) {
                                            $fontClass = 'text-3xl';
                                        } elseif ($nameLength <= 18) {
                                            $fontClass = 'text-2xl';
                                        } elseif ($nameLength <= 22) {
                                            $fontClass = 'text-xl';
                                        } else {
                                            $fontClass = 'text-lg';
                                        }
                                    @endphp
                                    <h3 class="mt-40 mb-4 font-bold text-white {{ $fontClass }}"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $proker->name }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="flex-1 mb-4 text-base leading-relaxed text-white text-opacity-90">
                                        {{ substr(strip_tags($proker->description), 0, 85) . (strlen(strip_tags($proker->description)) > 85 ? '...' : '') }}
                                    </p>

                                    <!-- Bottom Section -->
                                    <div class="flex items-end justify-between mt-auto">
                                        <span
                                            class="px-4 py-2 text-sm font-bold tracking-wide text-gray-900 bg-white rounded-full">
                                            {{ $divisionName }}
                                        </span>
                                    </div>

                                    <!-- Registration Status -->
                                    @if ($proker->is_registration_open === '1')
                                        <div class="absolute top-6 right-6">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-green-900 bg-green-200 rounded-full">
                                                Buka
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Arrow Icon  -->
                            <div
                                class="absolute bottom-10 right-5 z-20 
                                        flex items-center justify-center w-16 h-16 
                                        transition-transform duration-300 bg-white rounded-full 
                                        group-hover:scale-110 group-hover:-rotate-12 
                                        translate-x-1/3 translate-y-1/3">
                                <svg class="w-8 h-8 text-gray-900 transition-transform duration-300 
                                            group-hover:-translate-x-1 group-hover:-translate-y-1"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17L7 7M7 7H17M7 7V17">
                                    </path>
                                </svg>
                            </div>

                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="w-full h-full bg-[#FEF9F1] opacity-0 translate-y-8 transition-all duration-1000 ease-out hidden md:block"
            data-animate>
            <img src="{{ asset('img/bagian/horizontal-pattern.png') }}" alt="">
        </div>
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

        /* Proker card colors */
        .from-blue-500 {
            --tw-gradient-from: #3b82f6;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(59, 130, 246, 0));
        }

        .to-blue-700 {
            --tw-gradient-to: #1d4ed8;
        }

        .from-green-500 {
            --tw-gradient-from: #10b981;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(16, 185, 129, 0));
        }

        .to-green-700 {
            --tw-gradient-to: #047857;
        }

        .from-purple-500 {
            --tw-gradient-from: #8b5cf6;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(139, 92, 246, 0));
        }

        .to-purple-700 {
            --tw-gradient-to: #7c3aed;
        }

        .from-red-500 {
            --tw-gradient-from: #ef4444;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(239, 68, 68, 0));
        }

        .to-red-700 {
            --tw-gradient-to: #b91c1c;
        }

        .from-yellow-500 {
            --tw-gradient-from: #eab308;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(234, 179, 8, 0));
        }

        .to-yellow-700 {
            --tw-gradient-to: #a16207;
        }

        .from-indigo-500 {
            --tw-gradient-from: #6366f1;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(99, 102, 241, 0));
        }

        .to-indigo-700 {
            --tw-gradient-to: #4338ca;
        }

        .from-pink-500 {
            --tw-gradient-from: #ec4899;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(236, 72, 153, 0));
        }

        .to-pink-700 {
            --tw-gradient-to: #be185d;
        }

        .from-teal-500 {
            --tw-gradient-from: #14b8a6;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(20, 184, 166, 0));
        }

        .to-teal-700 {
            --tw-gradient-to: #0f766e;
        }

        .from-orange-500 {
            --tw-gradient-from: #f97316;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(249, 115, 22, 0));
        }

        .to-orange-700 {
            --tw-gradient-to: #c2410c;
        }

        .from-cyan-500 {
            --tw-gradient-from: #06b6d4;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(6, 182, 212, 0));
        }

        .to-cyan-700 {
            --tw-gradient-to: #0e7490;
        }

        .from-lime-500 {
            --tw-gradient-from: #84cc16;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(132, 204, 22, 0));
        }

        .to-lime-700 {
            --tw-gradient-to: #4d7c0f;
        }

        .from-rose-500 {
            --tw-gradient-from: #f43f5e;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(244, 63, 94, 0));
        }

        .to-rose-700 {
            --tw-gradient-to: #be123c;
        }

        /* Proker card hover effects */
        .proker-card {
            transition: all 0.3s ease;
        }

        .proker-card:hover {
            transform: translateY(-5px);
        }

        .proker-card:hover .arrow-icon {
            transform: translateX(5px);
        }

        /* Division badge colors */
        .text-blue-800 {
            color: #1e40af;
        }

        .bg-blue-100 {
            background-color: #dbeafe;
        }

        .text-green-800 {
            color: #166534;
        }

        .bg-green-100 {
            background-color: #dcfce7;
        }

        .text-purple-800 {
            color: #6b21a8;
        }

        .bg-purple-100 {
            background-color: #f3e8ff;
        }

        .text-red-800 {
            color: #991b1b;
        }

        .bg-red-100 {
            background-color: #fee2e2;
        }

        .text-indigo-800 {
            color: #3730a3;
        }

        .bg-indigo-100 {
            background-color: #e0e7ff;
        }

        .text-orange-800 {
            color: #9a3412;
        }

        .bg-orange-100 {
            background-color: #fed7aa;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Ensure proper spacing */
        .gap-12 {
            gap: 3rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        /* Shadow utilities */
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .shadow-xl {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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

        /* Background colors */
        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .bg-white {
            background-color: #ffffff;
        }

        /* Border colors */
        .border-gray-100 {
            border-color: #f3f4f6;
        }

        /* Text colors */
        .text-gray-900 {
            color: #111827;
        }

        .text-gray-600 {
            color: #4b5563;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-gray-400 {
            color: #9ca3af;
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

        /* Custom font-weight for PROGRAM KERJA title */
        .proker-title {
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
            let prokerCardIndex = 0;

            animateElements.forEach((element, index) => {
                // Add staggered delay for proker cards in proper order (left to right, row by row)
                if (element.classList.contains('group')) {
                    element.style.transitionDelay = `${prokerCardIndex * 100}ms`;
                    prokerCardIndex++;
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
