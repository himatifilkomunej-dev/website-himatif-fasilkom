@extends('frontpage.layouts.app-frontpage')

@php
    $timeline_active = -1;

@endphp

@section('title', 'PROKER DETAIL')

@section('pageClass', 'proker')


@section('content')

    <!-- Main Content -->
    <main class="bg-[#02314A]">
        <!-- Decorative Images -->
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out hidden md:block"
            data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out hidden md:block"
            data-animate-right>

        <!-- Hero Section -->
        <section class="bg-[#FEF9F1] relative overflow-hidden text-white rounded-b-[6rem]">
            <div class="container px-4 py-16 mx-auto md:px-6 md:py-24">
                <div class="flex flex-col items-center gap-12 lg:flex-row">
                    <!-- Left Content -->
                    <div class="flex-1 text-center lg:text-left lg:ml-16">
                        <div class="inline-block mb-6 opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                            data-animate>
                            <span class="text-3xl text-red-700 font-bold">Program Kerja</span>
                        </div>

                        <!-- Program Logo -->
                        <div class="flex justify-center mb-8 lg:justify-start opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                            data-animate>
                            <div class="flex items-center justify-center w-32 h-32 p-4 bg-white shadow-lg rounded-2xl">
                                @if ($proker->logo)
                                    <img src="{{ asset('storage/' . $proker->logo) }}" alt="{{ $proker->name }} Logo"
                                        class="object-contain w-full h-full">
                                @else
                                    <div class="flex items-center justify-center w-full h-full text-4xl text-gray-400">
                                        💼
                                    </div>
                                @endif
                            </div>
                        </div>

                        <h1 class="mb-6 text-4xl font-black text-gray-900 md:text-5xl lg:text-6xl opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                            data-animate>
                            {{ $proker->name }}
                        </h1>

                        @if ($proker->is_registration_open === '1')
                            <div class="inline-flex items-center px-6 py-3 border rounded-full bg-red-700 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                                data-animate>
                                <span class="font-semibold">Pendaftaran Dibuka</span>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <!-- Background Patterns -->
            <div class="absolute top-0 left-0 opacity-10">
                <div class="w-64 h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full"></div>
            </div>
            <div class="absolute bottom-0 right-0 opacity-10">
                <div class="w-64 h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full"></div>
            </div>
        </section>

        <!-- Content Section -->
        <section class="py-16 bg-[#02314A]">
            <div class="container px-4 mx-auto md:px-6">
                <div class="max-w-6xl mx-auto">

                    <!-- Program Description -->
                    <div class="prose prose-lg max-w-6xl opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <div class="space-y-6 text-lg leading-relaxed text-white">
                            {!! $proker->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline and Documentation Section -->
        <section class="pb-16 bg-[#02314A]">
            <div class="container px-4 mx-auto md:px-6">
                <div class="max-w-6xl mx-auto">
                    <div id="accordion-flush" data-accordion="open"
                        class="px-2 opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-active-classes="bg-none text-white" data-inactive-classes="text-gray-500" data-animate>
                        @if ($proker->is_timeline_open)


                            <h6 id="accordion-flush-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                    data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                    aria-controls="accordion-flush-body-1">
                                    <span>Timeline {{ $proker->name === 'ITEC' ? 'UI/UX' : '' }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h6>
                            <div id="accordion-flush-body-1" class="hidden px-4"
                                aria-labelledby="accordion-flush-heading-1">
                                <div class="py-5 border-b border-gray-200">
                                    <ol class="relative border-s border-gray-200">
                                        @foreach ($proker->timeline as $key => $timeline)
                                            @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                @php
                                                    if ($timeline_active == -1) {
                                                        $timeline_active = $key;
                                                    }
                                                @endphp

                                                @if ($key == $timeline_active)
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-green-600 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-white">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @else
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-yellow-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-white">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @endif
                                            @else
                                                <li class="mb-10 ms-4">
                                                    <div
                                                        class="absolute w-3 h-3 bg-red-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                    </div>
                                                    <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                        @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                        @else
                                                            {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                            -
                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                        @endif
                                                    </time>
                                                    <h3 class="text-lg font-semibold text-white">
                                                        {{ $timeline[0] }}</h3>
                                                    {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                </li>
                                            @endif
                                        @endforeach

                                    </ol>

                                </div>
                            </div>
                            @if ($proker->name === 'ITEC')
                                <h6 id="accordion-flush-heading-99">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                        data-accordion-target="#accordion-flush-body-99" aria-expanded="true"
                                        aria-controls="accordion-flush-body-2">
                                        <span>Timeline Data Mining</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h6>
                                <div id="accordion-flush-body-99" class="hidden px-4"
                                    aria-labelledby="accordion-flush-heading-99">
                                    <div class="py-5 border-b border-gray-200">
                                        <ol class="relative border-s border-gray-200">
                                            @php
                                                $sementara = [
                                                    [
                                                        'Pendaftaran dan Pengumpulan Proposal Full Paper',
                                                        '2024-02-24T17:05',
                                                        '2024-03-18T19:18',
                                                    ],
                                                    [
                                                        'Pengumuman lolos/Babak Final',
                                                        '2024-03-25T19:30',
                                                        '2024-03-25T19:30',
                                                    ],
                                                    [
                                                        'TM dan Pengundian Nomor Urut',
                                                        '2024-03-29T09:31',
                                                        '2024-03-29T09:31',
                                                    ],
                                                    ['Final dan Presentasi', '2024-03-30T09:31', '2024-03-30T09:31'],
                                                ];
                                            @endphp
                                            @foreach ($sementara as $key => $timeline)
                                                @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                    @php
                                                        if ($timeline_active == -1) {
                                                            $timeline_active = $key;
                                                        }
                                                    @endphp

                                                    @if ($key == $timeline_active)
                                                        <li class="mb-10 ms-4">
                                                            <div
                                                                class="absolute w-3 h-3 bg-green-600 rounded-full mt-1.5 -start-1.5 border border-white">
                                                            </div>
                                                            <time
                                                                class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                                @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @else
                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @endif
                                                            </time>
                                                            <h3 class="text-lg font-semibold text-white">
                                                                {{ $timeline[0] }}</h3>
                                                            {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                        </li>
                                                    @else
                                                        <li class="mb-10 ms-4">
                                                            <div
                                                                class="absolute w-3 h-3 bg-yellow-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                            </div>
                                                            <time
                                                                class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                                @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @else
                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @endif
                                                            </time>
                                                            <h3 class="text-lg font-semibold text-white">
                                                                {{ $timeline[0] }}</h3>
                                                            {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                        </li>
                                                    @endif
                                                @else
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-red-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-white">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ol>

                                    </div>
                                </div>
                            @endif


                        @endif

                        @if ($proker->dokumentasi && $proker->is_dokumentasi_open)
                            <h6 id="accordion-flush-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                    data-accordion-target="#accordion-flush-body-2" aria-expanded="true"
                                    aria-controls="accordion-flush-body-2">
                                    <span>Galeri</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h6>
                            <div id="accordion-flush-body-2" class="hidden px-4"
                                aria-labelledby="accordion-flush-heading-2">
                                <div class="py-5 border-b border-gray-200">
                                    <div id="gallery" class="relative w-full" data-carousel="slide">
                                        <!-- Carousel wrapper -->
                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                            @foreach ($proker->dokumentasi as $key => $dokumentasi)
                                                <div class="hidden h-full w-full duration-700 ease-in-out"
                                                    data-carousel-item>
                                                    <img src="{{ asset('storage/' . $dokumentasi) }}"
                                                        alt="Dokumetasi {{ $key }}"
                                                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- Slider controls -->
                                        <button type="button"
                                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                            data-carousel-prev>
                                            <span
                                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30/30 group-hover:bg-white/50/60 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                                </svg>
                                                <span class="sr-only">Previous</span>
                                            </span>
                                        </button>
                                        <button type="button"
                                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                            data-carousel-next>
                                            <span
                                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30/30 group-hover:bg-white/50/60 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg>
                                                <span class="sr-only">Next</span>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>


                        @endif
                    </div>

                    <!-- Social Media Links and Action Buttons -->
                    <div class="mt-12 space-y-8 opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <!-- Social Media Links -->
                        <div class="flex flex-wrap justify-center gap-4">
                            @if (isset($proker->link_instagram) && !empty($proker->link_instagram))
                                <a target="_blank" href="{{ $proker->link_instagram }}"
                                    class="flex items-center space-x-3 px-6 py-3 border border-pink-500 text-pink-500 hover:bg-gradient-to-r hover:from-pink-500 hover:to-yellow-500 hover:text-white rounded-full transition-all duration-300 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                    </svg>
                                    <span class="font-semibold hidden sm:block">Instagram</span>
                                </a>
                            @endif

                            @if (isset($proker->link_contact_person) && !empty($proker->link_contact_person))
                                <a target="_blank" href="//wa.me/+62{{ substr($proker->link_contact_person, 1) }}"
                                    class="flex items-center space-x-3 px-6 py-3 border border-green-500 text-green-500 hover:bg-gradient-to-r hover:from-green-400 hover:to-green-600 hover:text-white rounded-full transition-all duration-300 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                    <span class="font-semibold hidden sm:block">Contact Person</span>
                                </a>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap justify-center gap-4">
                            @if (isset($proker->link_storage_certificate) && !empty($proker->link_storage_certificate))
                                <a target="_blank" href="{{ $proker->link_storage_certificate }}"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-full hover:from-red-700 hover:to-red-900 transition-all duration-300 hover:scale-105 shadow-lg">
                                    Sertifikat
                                </a>
                            @endif

                            @if ($proker->is_registration_open === '1')
                                @if ($proker->id !== 3)
                                    <a href="{{ $proker->link_registration }}" target="_blank"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-full hover:from-red-700 hover:to-red-900 transition-all duration-300 hover:scale-105 shadow-lg">
                                        Daftar Sekarang
                                    </a>
                                @else
                                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeo4ac_T7jZlIbINJ8Vdz0Cm0K0Lkd2RHor-ZdOs7XYw6fXXQ/viewform?usp=header"
                                        target="_blank"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-full hover:from-red-700 hover:to-red-900 transition-all duration-300 hover:scale-105 shadow-lg">
                                        Series 1
                                    </a>
                                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSdgaJNu4xDigpBpgKXheyyOYdu3ThtySEKqK5ZwxCPVQKwOvw/viewform?usp=sharing&ouid=112477555319119038945"
                                        target="_blank"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-full hover:from-red-700 hover:to-red-900 transition-all duration-300 hover:scale-105 shadow-lg">
                                        Series 2
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
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

        .from-gray-800 {
            --tw-gradient-from: #1f2937;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(31, 41, 55, 0));
        }

        .to-gray-900 {
            --tw-gradient-to: #111827;
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

        .to-green-600 {
            --tw-gradient-to: #16a34a;
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

        /* Background colors */
        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .bg-blue-100 {
            background-color: #dbeafe;
        }

        .bg-green-500\/20 {
            background-color: rgba(34, 197, 94, 0.2);
        }

        .bg-green-100 {
            background-color: #dcfce7;
        }

        /* Border colors */
        .border-gray-100 {
            border-color: #f3f4f6;
        }

        .border-gray-200 {
            border-color: #e5e7eb;
        }

        .border-green-400\/30 {
            border-color: rgba(74, 222, 128, 0.3);
        }

        .border-white\/30 {
            border-color: rgba(255, 255, 255, 0.3);
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

        .text-blue-600 {
            color: #2563eb;
        }

        .text-blue-800 {
            color: #1e40af;
        }

        .text-green-300 {
            color: #86efac;
        }

        .text-white\/80 {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Shadow utilities */
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .shadow-xl {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
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

        .rounded-3xl {
            border-radius: 1.5rem;
        }

        /* Spacing utilities */
        .gap-12 {
            gap: 3rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        /* Animation utilities */
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .5;
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Proker description styles */
        .proker-desc ul {
            padding-left: 2rem;
        }

        .proker-desc ul li {
            list-style: disc;
        }

        .proker-desc ol {
            padding-left: 2rem;
        }

        .proker-desc ol li {
            list-style: decimal;
        }

        /* Prose styles */
        .prose {
            color: #374151;
            max-width: none;
        }

        .prose-lg {
            font-size: 1.125rem;
            line-height: 1.7777778;
        }

        .prose h2 {
            color: #111827;
            font-weight: 700;
            font-size: 1.875rem;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.1111111;
        }

        .prose h3 {
            color: #111827;
            font-weight: 600;
            font-size: 1.5rem;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.3333333;
        }

        .prose p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose strong {
            color: #111827;
            font-weight: 600;
        }

        .prose a {
            color: #2563eb;
            text-decoration: underline;
            font-weight: 500;
        }

        .prose a:hover {
            color: #1d4ed8;
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
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

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
