@extends('frontpage.layouts.app-frontpage')

@section('title', 'Berita')

@section('pageClass', 'berita')
@section('content')
    <!-- Header Section - Di luar wrapper supaya lebar selayar -->
    <div class="berita-header">
        <!-- Gambar dekorasi di dalam header -->
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out" data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out" data-animate-right>

        <h1 class="berita-title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>BERITA TERKINI
        </h1>
        <p class="berita-subtitle opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
            TEKNOLOGI INFORMASI</p>
        <div class="theme-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400" data-animate>
            <p style="font-size: 1.2rem; line-height: 1.6; font-weight: 600;">
                Dapatkan informasi terbaru seputar kegiatan, prestasi, dan perkembangan
                Himpunan Mahasiswa Teknologi Informasi
            </p>
        </div>
    </div>

    <div class="berita-wrapper">
        <!-- Search Section -->
        <div class="search-section">
            <form action="{{ route('frontpage.berita') }}"
                class="search-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="search-input-wrapper">
                    <input type="search" name="q" value="{{ Request::get('q') }}" class="search-input"
                        placeholder="Masukan Keyword Berita..." />
                    <button type="submit" class="search-button"></button>
                    <input type="hidden" name="limit" value="{{ Request::get('limit') }}">
                </div>
            </form>
        </div>
        <!-- Berita Cards Grid -->
        <div class="berita-cards-section">
            <div class="berita-cards-grid">
                @foreach ($posts as $post)
                    <div class="berita-card opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                        <a href="{{ route('frontpage.berita.show', $post->slug) }}" class="berita-card-link">
                            <div class="berita-card-image">
                                @if ($post->photo)
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" />
                                @else
                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                        alt="{{ $post->title }}" />
                                @endif
                                <div class="berita-category-badge">
                                    {{ $post->category->name }}
                                </div>
                            </div>
                            <div class="berita-card-content">
                                <div class="berita-date">
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </div>
                                <h3 class="berita-card-title">{{ $post->title }}</h3>
                                <p class="berita-card-excerpt">
                                    {{ Str::limit(strip_tags(str_replace(['<br>', '&nbsp;'], ' ', $post->body)), 120) }}
                                </p>
                                <div class="read-more-btn">
                                    Baca Selengkapnya →
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination Section -->
        <div class="pagination-section">
            <div class="pagination-wrapper opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                @php
                    $limit = Request::get('limit', 9);
                    $currentPage = (int) ceil($limit / 9);

                    // Hitung total data dinamis dari database
                    $totalPosts = \App\Models\Post::count(); // Dynamic count dari database
                    $totalPages = ceil($totalPosts / 9);

                    if ($totalPages < 1) {
                        $totalPages = 1;
                    }

                    // Cek apakah masih ada halaman selanjutnya
                    $hasMore = $posts->count() >= 9 && $currentPage < $totalPages;
                @endphp

                <!-- First Page Button -->
                @if ($currentPage > 1)
                    <a href="{{ route('frontpage.berita', ['q' => Request::get('q'), 'limit' => 9]) }}"
                        class="pagination-btn">
                        «
                    </a>
                @endif

                <!-- Previous Page Button -->
                @if ($currentPage > 1)
                    <a href="{{ route('frontpage.berita', ['q' => Request::get('q'), 'limit' => ($currentPage - 1) * 9]) }}"
                        class="pagination-btn">
                        ‹
                    </a>
                @endif

                <!-- Page Info -->
                <div class="page-info">
                    {{ $currentPage }}/{{ $totalPages }}
                </div>

                <!-- Next Page Button -->
                @if ($hasMore)
                    <a href="{{ route('frontpage.berita', ['q' => Request::get('q'), 'limit' => ($currentPage + 1) * 9]) }}"
                        class="pagination-btn">
                        ›
                    </a>
                @endif

                <!-- Last Page Button (shortcut ke halaman terakhir) -->
                @if ($currentPage < $totalPages && $totalPages > 2)
                    <a href="{{ route('frontpage.berita', ['q' => Request::get('q'), 'limit' => $totalPages * 9]) }}"
                        class="pagination-btn">
                        »
                    </a>
                @endif
            </div>
        </div>

        <!-- Footer Image -->
        <div class="footer-image-section">
            <div class="footer-image-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="footer-image-wrapper">
                    <img src="{{ asset('img/bagian/9.png') }}" alt="Bagian 9" class="footer-image">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        body.berita {
            background-color: #013049 !important;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .berita-header {
            background-color: #FEF9F1;
            padding: 60px 20px 80px 20px;
            text-align: center;
            border-radius: 0 0 120px 120px;
            margin-bottom: 0;
            width: 100%;
            position: relative;
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

        .berita-wrapper {
            background-color: #013049;
            min-height: 100vh;
            width: 100%;
            padding: 0 20px;
        }

        .berita-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            background: #910E19;
            padding: 20px 40px;
            border-radius: 50px;
            display: inline-block;
            margin: 0 0 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .berita-subtitle {
            font-size: 3.5rem;
            color: #000;
            margin-bottom: 30px;
            font-weight: 900;
        }

        .theme-card {
            background: transparent;
            color: black;
            padding: 0;
            border-radius: 0;
            max-width: 900px;
            margin: 0 auto;
            border: none;
            box-shadow: none;
            font-weight: 600;
        }

        /* Search Section */
        .search-section {
            padding: 60px 0 40px 0;
            text-align: center;
            background-color: #013049;
        }

        .search-container {
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
        }

        .search-input-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0;
            width: 100%;
            position: relative;
        }

        .search-icon {
            display: none;
        }

        .search-input {
            flex: 1;
            padding: 10px 55px 10px 24px;
            border: 3px solid #FEF9F1;
            border-radius: 999px;
            font-size: 1.1rem;
            background: rgba(254, 249, 241, 0.05);
            color: #FEF9F1;
            outline: none;
            text-align: left;
            transition: border 0.2s;
        }

        .search-input::placeholder {
            color: #FEF9F1;
            font-size: 1.05rem;
            text-align: center;
            transition: opacity 0.2s;
        }

        .search-input:focus::placeholder {
            opacity: 0;
        }

        .search-input:focus {
            border-color: #910E19;
        }

        .search-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            border-radius: 999px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-button:focus {
            outline: none;
        }

        .search-button::before {
            content: '';
            display: inline-block;
            width: 22px;
            height: 22px;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" stroke="%23FEF9F1" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        /* Berita Cards Section */
        .berita-cards-section {
            padding: 40px 0;
            background-color: #013049;
        }

        .berita-cards-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
            justify-content: center;
        }

        .berita-card {
            width: 350px;
            flex: 0 0 350px;
        }

        .berita-card {
            background: #910E19;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
        }

        .berita-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .berita-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }

        .berita-card-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .berita-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .berita-card:hover .berita-card-image img {
            transform: scale(1.1);
        }

        .berita-category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #FEF9F1;
            color: #910E19;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .berita-card-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 250px);
        }

        .berita-date {
            color: rgba(254, 249, 241, 0.8);
            font-size: 0.9rem;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .berita-card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #FEF9F1;
            margin-bottom: 15px;
            line-height: 1.4;
            flex-grow: 0;
        }

        .berita-card-excerpt {
            color: rgba(254, 249, 241, 0.9);
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
            font-size: 0.95rem;
        }

        .read-more-btn {
            color: #FEF9F1;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .berita-card:hover .read-more-btn {
            color: rgba(254, 249, 241, 0.8);
            transform: translateX(5px);
        }

        /* Pagination Section */
        .pagination-section {
            text-align: center;
            padding: 60px 0;
            background-color: #013049;
        }

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .pagination-btn {
            background: #910E19;
            border: none;
            color: #FEF9F1;
            padding: 0;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 6px;
            font-size: 2.1rem;
            font-weight: 700;
            line-height: 1;
        }

        .pagination-btn:hover {
            background: rgba(145, 14, 25, 0.8);
            color: #FEF9F1;
        }

        .pagination-btn:active {
            transform: scale(0.95);
        }

        .page-info {
            color: #FEF9F1;
            font-weight: 700;
            font-size: 1rem;
            text-align: center;
            background: #910E19;
            height: 40px;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }

        /* Footer Image Styles */
        .footer-image-section {
            width: 100%;
            text-align: center;
            margin: 48px 0 0 0;
        }

        .footer-image-container {
            background: #FEF9F1;
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            padding: 32px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-image-wrapper {
            width: 100%;
            text-align: center;
            position: relative;
        }

        .footer-image {
            max-width: 1600px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .header-decoration-left,
            .header-decoration-right {
                display: none;
            }

            /* Hide footer image on mobile */
            .footer-image-section {
                display: none;
            }

            .berita-title {
                font-size: 2.2rem;
                padding: 15px 30px;
            }

            .berita-subtitle {
                font-size: 1.8rem;
            }

            .theme-card p {
                font-size: 1rem !important;
            }

            .berita-cards-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 10px;
            }

            .berita-card {
                margin: 0 10px;
            }

            .search-input {
                font-size: 0.9rem;
                padding: 8px 40px 8px 16px;
            }

            .berita-wrapper {
                padding: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .berita-title {
                font-size: 1.8rem;
                padding: 12px 25px;
            }

            .berita-subtitle {
                font-size: 1.4rem;
            }

            .berita-cards-grid {
                padding: 0 5px;
            }

            .berita-card {
                margin: 0 5px;
            }

            .berita-card-content {
                padding: 20px;
            }

            .berita-card-title {
                font-size: 1.1rem;
            }

            .pagination-wrapper {
                gap: 6px;
            }

            .pagination-btn {
                width: 36px;
                height: 36px;
                font-size: 1.2rem;
                line-height: 1;
            }

            .page-info {
                font-size: 0.9rem;
                min-width: 50px;
                height: 36px;
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
            let beritaCardIndex = 0;

            animateElements.forEach((element, index) => {
                // Add staggered delay for berita cards in proper order (left to right, row by row)
                if (element.classList.contains('berita-card')) {
                    element.style.transitionDelay = `${beritaCardIndex * 150}ms`;
                    beritaCardIndex++;
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
                const headerElements = document.querySelectorAll('.berita-header [data-animate]');
                headerElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });

                // Animate header decorative images
                const headerDecorativeLeft = document.querySelectorAll(
                    '.berita-header [data-animate-left]');
                headerDecorativeLeft.forEach(element => {
                    element.classList.remove('opacity-0', '-translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });

                const headerDecorativeRight = document.querySelectorAll(
                    '.berita-header [data-animate-right]');
                headerDecorativeRight.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });
            }, 500);
        });
    </script>
@endsection
