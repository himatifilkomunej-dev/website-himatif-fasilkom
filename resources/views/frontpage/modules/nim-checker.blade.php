@extends('frontpage.layouts.app-frontpage')

@section('title', 'NIM Checker')

@section('pageClass', 'blog')
@section('content')
    <div class="nim-wrapper">
        <!-- sisi kiri -->
        <div class="side left opacity-0 -translate-x-8 transition-all duration-1000 ease-out" data-animate-left>
            <img src="{{ asset('img/bagian/1.png') }}" alt="kiri">
        </div>

        <!-- konten utama -->
        <main class="nim-main">
            <h1 class="title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>NIM CHECKER</h1>
            <h2 class="subtitle opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
                MAHASISWA TEKNOLOGI INFORMASI</h2>
            <p class="desc opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300" data-animate>Gunakan
                Pencarian Untuk Menampilkan List Detail Mahasiswa</p>

            <form action="{{ route('frontpage.nim-checker') }}" id="searchForm"
                class="search-form opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400" data-animate>
                <input type="search" name="q" id="searchInput" value="{{ Request::get('q') }}"
                    placeholder="Masukan NIM atau Nama Mahasiswa" autocomplete="off">
                <button type="submit"></button>
                <input type="hidden" name="limit" id="limitInput" value="{{ Request::get('limit') ?? 8 }}">
            </form>

            <div class="nim-list opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500" data-animate
                id="nimList">
                @foreach ($nims as $nim)
                    <div class="nim-item opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                        <p><strong>Nama:</strong> {{ $nim->name }}</p>
                        <p><strong>NIM:</strong> {{ $nim->nim }}</p>
                        <p><strong>Angkatan:</strong> {{ $nim->angkatan }}</p>
                        <p><strong>Status:</strong> {{ $nim->status }}</p>
                    </div>
                @endforeach
            </div>

            @if (isset($nims) && $nims !== [])
                <form action="{{ route('frontpage.nim-checker') }}" id="moreForm"
                    class="more-form opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600" data-animate>
                    <input type="hidden" name="q" id="moreQuery" value="{{ Request::get('q') }}">
                    <input type="hidden" name="limit" value="{{ Request::get('limit') + 8 }}">
                    <button type="button" id="moreBtn" class="more-btn">Tampilkan Lebih Banyak</button>
                </form>
            @endif
        </main>

        <!-- sisi kanan -->
        <div class="side right opacity-0 translate-x-8 transition-all duration-1000 ease-out" data-animate-right>
            <img src="{{ asset('img/bagian/2.png') }}" alt="kanan">
        </div>
    </div>

    <style>
        body.blog {
            background: #FEF9F1;
            margin: 0;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .nim-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            padding: 20px 0 0 0;
            min-height: 90vh;
        }

        .side {
            width: 35px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 0;
            margin-top: -100px;
            z-index: 1000;
        }

        .side.left {
            margin-right: auto;
            left: 0;
        }

        .side.right {
            margin-left: auto;
            right: 0;
        }



        .side img {
            width: 35px !important;
            height: auto !important;
        }

        /* Custom animations for side images */
        .side.left[data-animate-left] {
            opacity: 0 !important;
            transform: translateX(-32px) !important;
            transition: all 1000ms ease-out !important;
        }

        .side.right[data-animate-right] {
            opacity: 0 !important;
            transform: translateX(32px) !important;
            transition: all 1000ms ease-out !important;
        }

        .side.left[data-animate-left].animate-in {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }

        .side.right[data-animate-right].animate-in {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }

        /* Custom animations for main content */
        .nim-main>* {
            opacity: 0;
            transform: translateY(32px);
            transition: all 1000ms ease-out;
        }

        .nim-main>*.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .nim-main {
            flex: 1;
            max-width: 900px;
            text-align: center;
            padding-top: 60px;
        }

        .title {
            margin-top: 40px;
            font-size: 2.2rem;
            margin-bottom: 25px;
            display: inline-block;
            background: #910E19;
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 999px;
        }

        .subtitle {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 3.2rem;
            font-weight: bold;
            color: #222;
        }

        .desc {
            margin-bottom: 30px;
            font-size: 1.0rem;
            color: #333;
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0;
            margin-bottom: 40px;
            width: 100%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .search-form input[type="search"] {
            flex: 1;
            padding: 10px 55px 10px 24px;
            border: 3px solid #222;
            border-radius: 999px;
            font-size: 1.1rem;
            background: rgba(0, 16, 26, 0.05);
            outline: none;
            text-align: left;
            transition: border 0.2s;
        }

        .search-form button {
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

        .search-form button:hover {
            /* tidak perlu efek hover, tombol hanya ikon */
        }

        .search-form input[type="search"]::placeholder {
            color: #222;
            font-size: 1.05rem;
            text-align: center;
            transition: opacity 0.2s;
        }

        .search-form input[type="search"]:focus::placeholder {
            opacity: 0;
        }

        .search-form button:focus {
            outline: none;
        }

        .search-form button::before {
            content: '';
            display: inline-block;
            width: 22px;
            height: 22px;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        .nim-list {
            display: grid;
            gap: 20px;
            margin-bottom: 40px;
        }

        .nim-item {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: left;
        }

        .more-form {
            text-align: center;
        }

        .more-btn {
            background: linear-gradient(to right, #910E19, #B11226);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .more-btn:hover {
            background: #fff;
            color: #910E19;
            border: 1px solid #910E19;
        }

        .empty {
            margin-top: 40px;
            font-size: 0.95rem;
            color: #444;
        }

        @media (max-width: 768px) {
            .side {
                display: none;
            }

            .nim-wrapper {
                padding: 10px;
            }

            .title {
                font-size: 1.5rem;
                padding: 8px 18px;
            }

            .subtitle {
                font-size: 2rem;
            }

            .desc {
                font-size: 0.85rem;
            }

            .search-form input[type="search"] {
                font-size: 0.9rem;
                padding: 8px 40px 8px 16px;
            }
        }
    </style>

    <script>
        // Live search functionality
        let searchTimeout;
        const searchInput = document.getElementById('searchInput');
        const nimList = document.getElementById('nimList');
        const limitInput = document.getElementById('limitInput');
        let currentLimit = {{ Request::get('limit') ?? 8 }};

        // Live search on input
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            searchTimeout = setTimeout(() => {
                if (query.length > 0) {
                    performSearch(query, 8);
                } else {
                    nimList.innerHTML = '';
                }
            }, 300); // Debounce 300ms
        });

        // Handle form submit
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const query = searchInput.value.trim();
            if (query.length > 0) {
                performSearch(query, 8);
            }
        });

        // Handle "Tampilkan Lebih Banyak" button
        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === 'moreBtn') {
                e.preventDefault();
                const query = searchInput.value.trim();
                currentLimit += 8;
                performSearch(query, currentLimit);
            }
        });

        function performSearch(query, limit) {
            const url = `{{ route('frontpage.nim-checker') }}?q=${encodeURIComponent(query)}&limit=${limit}`;

            fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Parse HTML response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newNimList = doc.getElementById('nimList');
                    const newMoreForm = doc.getElementById('moreForm');

                    if (newNimList) {
                        nimList.innerHTML = newNimList.innerHTML;

                        // Update or remove "Tampilkan Lebih Banyak" button
                        const existingMoreForm = document.getElementById('moreForm');
                        if (newMoreForm) {
                            if (existingMoreForm) {
                                existingMoreForm.innerHTML = newMoreForm.innerHTML;
                            } else {
                                nimList.insertAdjacentHTML('afterend', newMoreForm.outerHTML);
                            }
                        } else {
                            if (existingMoreForm) {
                                existingMoreForm.remove();
                            }
                        }

                        // Animate new items
                        const items = nimList.querySelectorAll('.nim-item');
                        items.forEach((item, index) => {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(32px)';
                            setTimeout(() => {
                                item.style.transition = 'all 500ms ease-out';
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0)';
                            }, index * 50);
                        });
                    }
                })
                .catch(error => {
                    console.error('Search error:', error);
                });
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

            // Observer for left-to-right animations (1.png)
            const observerLeft = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        observerLeft.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer for right-to-left animations (2.png)
            const observerRight = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        observerRight.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with data-animate attribute
            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach((element, index) => {
                // Add staggered delay for nim items
                if (element.classList.contains('nim-item')) {
                    element.style.transitionDelay = `${600 + (index * 100)}ms`;
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

            // Main content animate on load (without intersection observer)
            setTimeout(() => {
                const mainElements = document.querySelectorAll('.nim-main > *');
                mainElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.classList.add('animate-in');
                    }, index * 200);
                });

                // Animate side decorative images immediately
                const leftElements = document.querySelectorAll('[data-animate-left]');
                console.log('Left elements found:', leftElements.length);
                leftElements.forEach(element => {
                    console.log('Animating left element');
                    element.classList.add('animate-in');
                });

                const rightElements = document.querySelectorAll('[data-animate-right]');
                console.log('Right elements found:', rightElements.length);
                rightElements.forEach(element => {
                    console.log('Animating right element');
                    element.classList.add('animate-in');
                });
            }, 500);
        });
    </script>
@endsection
