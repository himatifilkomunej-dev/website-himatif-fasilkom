@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')

    <div class="pemilu-info-bg min-h-screen w-full flex items-center justify-center" style="background:#FEF9F1;">
        <div class="pemilu-info-card bg-white rounded-3xl shadow-2xl p-16 max-w-4xl w-full mx-auto opacity-0 translate-y-8 transition-all duration-1000 ease-out"
            data-animate>
            @if (request()->query('status') === 'campaign')
                <div class="text-center flex flex-col items-center">
                    <h2 class="font-extrabold text-5xl text-[#013049] mb-10 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>Periode Voting Belum Dimulai</h2>
                    <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                        class="w-2/3 max-w-lg my-12 rounded-2xl shadow-lg opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate />
                    <!-- Jika ingin menampilkan logo di halaman ini, gunakan contoh berikut: -->

                    <p class="text-xl text-[#013049] opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>Silahkan klik
                        <a href="/pemilu"
                            class="bg-[#910E19] px-5 py-2 rounded-full text-white font-semibold hover:bg-[#013049] hover:text-[#910E19] transition">Link</a>
                        berikut untuk melihat visi & misi kandidat Pemilu HIMATIF 2025.
                    </p>
                </div>
            @elseif (request()->query('status') === 'ended')
                <div class="text-center flex flex-col items-center">
                    <h2 class="font-extrabold text-5xl text-[#013049] mb-10 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>Periode Pemilu Telah Berakhir</h2>
                    <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                        class="w-2/3 max-w-lg my-12 rounded-2xl shadow-lg opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate />
                    <p class="text-xl text-[#013049] opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2025.</p>
                </div>
            @elseif (request()->query('status') === 'notstarted')
                <div class="text-center flex flex-col items-center">
                    <h2 class="font-extrabold text-5xl text-[#013049] mb-10 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>Periode Pemilu Belum Dimulai</h2>
                    <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                        class="w-2/3 max-w-lg my-12 rounded-2xl shadow-lg opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate />
                    <p class="text-xl text-[#013049] opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>Silahkan menunggu informasi lebih lanjut terkait PEMILU HIMATIF
                        2025.</p>
                </div>
            @elseif (request()->query('status') === 'success')
                <div class="text-center flex flex-col items-center">
                    <h2 class="font-extrabold text-5xl text-[#013049] mb-10 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>Suara Berhasil Disimpan ✔</h2>
                    <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                        class="w-2/3 max-w-lg my-12 rounded-2xl shadow-lg opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate />
                    <p class="text-xl text-[#013049] opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2025.</p>
                </div>
            @else
                <div class="text-center flex flex-col items-center">
                    <h2 class="font-extrabold text-5xl text-[#013049] mb-10 opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                        data-animate>Pemilu HIMATIF 2025</h2>
                    <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                        class="w-2/3 max-w-lg my-12 rounded-2xl shadow-lg opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                        data-animate />
                    <p class="text-xl text-[#013049] opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                        data-animate>Silahkan nantikan informasi lebih lanjut terkait Pemilu HIMATIF
                        2025.</p>
                </div>
            @endif
        </div>
    </div>

    </div>

@endsection

@section('style')
    <style>
        .pemilu-info-bg {
            background: #FEF9F1 !important;
        }

        .pemilu-info-card {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 12px 48px rgba(1, 48, 73, 0.16);
            padding: 4rem;
            max-width: 900px;
        }

        .pemilu-info-card h2 {
            font-size: 3rem;
        }

        .pemilu-info-card img {
            max-width: 400px;
            width: 80%;
        }

        .pemilu-info-card p {
            font-size: 1.3rem;
        }

        @media (max-width: 768px) {
            .pemilu-info-bg {
                padding: 1rem;
            }

            .pemilu-info-card {
                padding: 2rem;
                margin: 0 1rem;
                max-width: 100%;
                width: calc(100% - 2rem);
            }

            .pemilu-info-card h2 {
                font-size: 2.5rem;
                margin-bottom: 2rem;
            }

            .pemilu-info-card img {
                max-width: 300px;
                width: 70%;
                margin: 2rem auto;
            }

            .pemilu-info-card p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 640px) {
            .pemilu-info-bg {
                padding: 0.5rem;
            }

            .pemilu-info-card {
                padding: 1.5rem;
                margin: 0 0.5rem;
                width: calc(100% - 1rem);
                border-radius: 1.5rem;
            }

            .pemilu-info-card h2 {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                line-height: 1.2;
            }

            .pemilu-info-card img {
                max-width: 250px;
                width: 60%;
                margin: 1.5rem auto;
            }

            .pemilu-info-card p {
                font-size: 1rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 480px) {
            .pemilu-info-card {
                padding: 1rem;
                margin: 0 0.25rem;
                width: calc(100% - 0.5rem);
            }

            .pemilu-info-card h2 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .pemilu-info-card img {
                max-width: 200px;
                width: 50%;
                margin: 1rem auto;
            }

            .pemilu-info-card p {
                font-size: 0.9rem;
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

            // Observe all elements with data-animate attribute
            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach(element => {
                observer.observe(element);
            });

            // Trigger animations on page load after a short delay
            setTimeout(() => {
                const elements = document.querySelectorAll('[data-animate]');
                elements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });
            }, 200);
        });
    </script>
@endsection
