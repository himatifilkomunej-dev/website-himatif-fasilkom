@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')

@section('content')
    <!-- Header Section - Di luar wrapper supaya lebar selayar -->
    <div class="pemilu-header">
        <!-- Gambar dekorasi di dalam header -->
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out" data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out" data-animate-right>

        <h1 class="pemilu-title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>PEMILU HIMATIF
            2025</h1>
        <p class="pemilu-subtitle opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
            Dengan Tema</p>
        <div class="theme-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400" data-animate>
            <p style="font-size: 1.5rem; line-height: 1.6; font-weight: 600;">
                Mewujudkan Kepemimpinan Berintegritas, Visioner, dan
                Kolaboratif untuk Teknologi Informasi
            </p>
        </div>
    </div>

    <div class="pemilu-wrapper">
        <!-- konten utama -->

        <!-- Scroll Indicator -->
        <div style="text-align: center; padding: 40px 0;"
            class="opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
            <p style="color: #FEF9F1; margin-bottom: 15px;">Scroll kebawah untuk melihat Visi dan Misi mereka</p>
            <div style="width: 30px; height: 30px; margin: 0 auto; animation: bounce 2s infinite;">
                <svg viewBox="0 0 24 24" fill="#FEF9F1" style="width: 100%; height: 100%;">
                    <path d="M7 10l5 5 5-5z" />
                </svg>
            </div>
        </div>

        <!-- 3 Reasons Section -->
        <div class="reasons-section">
            <h2 class="reasons-title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>3 Alasan
                Kenapa Jangan Sampai Golput</h2>
            <div class="reasons-grid">
                <div class="reason-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                    data-animate>
                    <div class="reason-header">
                        Partisipasi Aktif Mendorong Kepemimpinan yang Berkualitas
                    </div>
                    <div class="reason-content">
                        Pemilihan umum adalah cara demokratis untuk menentukan pemimpin yang akan mewakili mahasiswa.
                        Dengan tidak Golput maka mahasiswa berpartisipasi aktif ini memastikan bahwa pemilihan dilakukan
                        secara adil dan demokratis.
                    </div>
                </div>

                <div class="reason-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                    data-animate>
                    <div class="reason-header">
                        Menghormati Proses Demokrasi
                    </div>
                    <div class="reason-content">
                        Dengan memberikan suara, mahasiswa ikut serta dalam pembentukan keputusan bersama dan
                        menunjukkan rasa tanggung jawab terhadap pilihan kepemimpinan yang akan mempengaruhi arah
                        himpunan.
                    </div>
                </div>

                <div class="reason-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-600"
                    data-animate>
                    <div class="reason-header">
                        Meningkatkan Legitimasi Pemimpin Terpilih
                    </div>
                    <div class="reason-content">
                        Memastikan bahwa kepemimpinan yang terpilih memiliki dukungan luas dari anggota himpunan. Jika
                        banyak anggota memilih untuk golput, pemimpin terpilih mungkin menghadapi tantangan untuk
                        meyakinkan anggota bahwa mereka memiliki dukungan yang diperlukan.
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider between reasons and candidates section -->
        <div class="divider"></div>

        <!-- Candidates Section -->
        <div class="candidates-section">
            @foreach ($candidates as $key => $candidate)
                @if ($key > 0)
                    <div class="divider opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate></div>
                @endif

                <div class="candidate-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                    <div class="candidate-grid" style="{{ $key === 1 ? 'direction: rtl;' : '' }}">
                        <!-- Paslon Badge -->
                        <div class="badge-wrapper" style="{{ $key === 1 ? 'direction: ltr;' : '' }}">
                            <div class="paslon-badge">Paslon {{ $candidate->id }}</div>
                        </div>

                        <div class="candidate-photo-section" style="{{ $key === 1 ? 'direction: ltr;' : '' }}">

                            <div class="photo-name-card">
                                <div class="photo-section">
                                    <img src="{{ asset('storage/' . $candidate->photo) }}"
                                        alt="Candidate {{ $candidate->id }}" class="candidate-photo">
                                </div>

                                <div class="candidate-name">
                                    {{ $candidate->nama }}
                                </div>

                                <div class="name-social-section">
                                    <div class="social-section">
                                        <div class="arrow-left">→</div>
                                        <div class="social-icons-right">
                                            <img src="{{ asset('img/bagian/icon.png') }}" alt="Social"
                                                class="social-icon-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="candidate-info" style="{{ $key === 1 ? 'direction: ltr;' : '' }}">
                            <div class="info-card">
                                <div class="info-header">Visi</div>
                                <div class="info-content">
                                    {{ $candidate->visi }}
                                </div>
                            </div>

                            <div class="info-card">
                                <div class="info-header">Misi</div>
                                <div class="info-content">
                                    <ol>
                                        @foreach ($candidate->misi as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Vote Section -->
        <div class="vote-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
            <p class="vote-text">Klik tombol, jika sudah siap memberikan suara</p>
            <button class="vote-button" onclick="location.href='{{ route('frontpage.pemilu.vote') }}'">
                Vote Sekarang
            </button>
        </div>
        <!-- Footer Image -->

        <!-- Footer Image -->
        <div style="width:100%;text-align:center;margin:48px 0 0 0;"
            class="opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
            <div
                style="background:#FEF9F1;width:100vw;max-width:100%;margin:0 auto;padding:32px 0;display:flex;justify-content:center;align-items:center;position:relative;">
                <div style="width:100%;text-align:center;position:relative;">
                    <img src="{{ asset('img/bagian/9.png') }}" alt="Bagian 8"
                        style="max-width:1600px;width:100%;height:auto;display:block;margin:0 auto;position:absolute;top:-40px;left:50%;transform:translateX(-50%);">
                </div>
            </div>
        </div>
    @endsection

    @section('style')
        <style>
            body.pemilu {
                background-color: #013049 !important;
                margin: 0;
                padding: 0;
                font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            }

            .pemilu-header {
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

            .pemilu-wrapper {
                background-color: #013049;
                min-height: 100vh;
                width: 100%;
            }

            .pemilu-title {
                font-size: 4rem;
                font-weight: 700;
                color: white;
                background: #910E19;
                padding: 20px 40px;
                border-radius: 50px;
                display: inline-block;
                margin: 0 0 30px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            .pemilu-subtitle {
                font-size: 1.4rem;
                color: #013049;
                margin-bottom: 30px;
                font-weight: 600;
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

            .reasons-section {
                padding: 80px 20px;
                text-align: center;
                background-color: #013049;
            }

            .reasons-title {
                font-size: 2.5rem;
                font-weight: 800;
                color: #FEF9F1;
                margin-bottom: 50px;
            }

            .reasons-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 30px;
                max-width: 1200px;
                margin: 0 auto;
            }

            .reason-card {
                background: #910E19;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
            }

            .reason-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            }

            .reason-header {
                background: #910E19;
                color: #FEF9F1;
                padding: 20px;
                font-weight: 700;
                font-size: 1.1rem;
                text-align: center;
            }

            .reason-content {
                background: #910E19;
                padding: 25px;
                color: #FEF9F1;
                font-size: 1rem;
                line-height: 1.6;
                text-align: left;
            }

            .candidates-section {
                padding: 80px 20px;
                background-color: #013049;
            }

            .candidate-container {
                max-width: 1400px;
                margin: 0 auto 60px;
                background: #013049;
                border-radius: 0;
                padding: 0;
                box-shadow: none;
                border: none;
                position: relative;
            }

            .paslon-badge-container {
                text-align: left;
                margin-bottom: 20px;
            }

            .paslon-badge {
                background: #910E19;
                color: #FEF9F1;
                padding: 12px 30px;
                border-radius: 30px;
                font-weight: 700;
                font-size: 1.2rem;
                display: inline-block;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }

            .candidate-grid {
                display: grid;
                grid-template-columns: 380px 1fr;
                grid-template-rows: auto 1fr;
                gap: 40px;
                align-items: start;
                justify-content: center;
                padding: 0 40px;
            }

            .badge-wrapper {
                grid-column: 1;
                grid-row: 1;
                text-align: center;
                margin-bottom: -20px;
                /* Reverted to the previous margin value */
            }

            .candidate-photo-section {
                grid-column: 1;
                grid-row: 2;
                display: flex;
                justify-content: center;
                height: auto;
            }

            .photo-name-card {
                background: #910E19;
                border-radius: 25px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
                text-align: center;
                position: relative;
                overflow: visible;
                width: 300px;
                /* Tetapkan ukuran tetap untuk mencegah pelebaran */
                clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 25%);
            }

            .photo-section {
                background: #910E19;
                padding: 40px 40px 30px 40px;
            }

            .name-social-section {
                background: #FEF9F1;
                padding: 15px 20px;
                color: #013049;
                border-radius: 0 0 25px 25px;
            }

            .candidate-photo {
                width: 220px;
                height: 220px;
                object-fit: cover;
                border-radius: 50%;
            }

            .candidate-name {
                font-weight: 900;
                font-size: 1.3rem;
                text-align: center;
                margin-bottom: 20px;
                color: #FEF9F1;
                padding: 0 20px;
            }

            .social-section {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 15px;
                width: 100%;
            }

            .arrow-left {
                font-size: 3.5rem;
                /* Membuat panah lebih besar */
                color: #910E19;
                font-weight: 900;
                line-height: 1;
                letter-spacing: 0.1em;
                /* Menambah panjang panah */
                margin-top: -10px
            }

            .social-icons-right {
                display: flex;
                gap: 8px;
            }

            .social-icon-img {
                height: 35px;
                width: auto;
                object-fit: contain;
            }

            .linkedin-icon {
                width: 32px;
                height: 32px;
                border: 3px solid #910E19;
                color: #910E19;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 5px;
                font-weight: 700;
                font-size: 0.9rem;
                background: transparent;
            }

            .instagram-icon {
                width: 32px;
                height: 32px;
                border: 3px solid #910E19;
                color: #910E19;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 5px;
                font-size: 1rem;
                background: transparent;
            }

            .candidate-info {
                grid-column: 2;
                grid-row: 1 / 3;
                display: flex;
                flex-direction: column;
                gap: 25px;
                height: auto;
                margin-top: 70px
            }

            .info-card {
                background: transparent;
                border: 2px solid #FEF9F1;
                border-radius: 15px;
                overflow: hidden;
                margin-bottom: 20px;
            }

            .info-header {
                background: transparent;
                color: #FEF9F1;
                padding: 15px 25px;
                font-size: 1.5rem;
                font-weight: 700;
                text-align: left;
                border-bottom: 2px solid #FEF9F1;
            }

            .info-content {
                padding: 25px;
                color: #FEF9F1;
                font-size: 1rem;
                line-height: 1.7;
                text-align: left;
            }

            .info-content ol {
                padding-left: 20px;
                color: #FEF9F1;
            }

            .info-content li {
                margin-bottom: 10px;
                color: #FEF9F1;
            }

            .vote-section {
                text-align: center;
                padding: 60px 20px;
                background-color: #013049;
            }

            .vote-text {
                font-size: 1.3rem;
                color: #FEF9F1;
                margin-bottom: 30px;
                font-weight: 600;
            }

            .vote-button {
                background: #910E19;
                color: #FEF9F1;
                padding: 18px 40px;
                border-radius: 50px;
                font-size: 1.2rem;
                font-weight: 700;
                cursor: pointer;
                transition: all 0.3s ease;
                border: none;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            .vote-button:hover {
                background: #FEF9F1;
                color: #910E19;
                transform: translateY(-3px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            }

            .divider {
                height: 2px;
                background: #FEF9F1;
                border-radius: 5px;
                margin: 60px auto;
                width: 80%;
                max-width: 600px;
            }

            @keyframes bounce {

                0%,
                20%,
                53%,
                80%,
                100% {
                    transform: translateY(0);
                }

                40%,
                43% {
                    transform: translateY(-10px);
                }

                70% {
                    transform: translateY(-5px);
                }
            }

            @media (max-width: 768px) {

                .header-decoration-left,
                .header-decoration-right {
                    display: none;
                }

                /* Hide entire cream footer section on mobile */
                div[style*="background:#FEF9F1"] {
                    display: none !important;
                }

                /* Hide bagian/9.png on mobile */
                img[src*="bagian/9.png"] {
                    display: none !important;
                }

                .pemilu-title {
                    font-size: 2.5rem;
                }

                .candidate-grid {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 20px;
                    padding: 0 20px;
                }

                .badge-wrapper {
                    order: 1;
                    margin-bottom: 0;
                    margin-top: -20px;
                    width: 100%;
                }

                .candidate-photo-section {
                    order: 2;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                }

                .photo-name-card {
                    width: 250px;
                    /* Ukuran card yang lebih pas untuk mobile */
                }

                .photo-section {
                    padding: 30px 20px 25px 20px;
                    /* Sesuaikan padding untuk mobile */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .name-social-section {
                    padding: 20px;
                    /* Perbesar padding area krem */
                    width: 100%;
                    box-sizing: border-box;
                }

                .social-section {
                    justify-content: space-between;
                    gap: 20px;
                    /* Perbesar gap untuk lebih proporsional */
                }

                .arrow-left {
                    font-size: 3rem;
                    /* Sesuaikan ukuran panah untuk mobile */
                }

                .social-icons-right {
                    gap: 12px;
                    /* Perbesar gap antar icon */
                }

                .social-icon-img {
                    height: 30px;
                    /* Sesuaikan ukuran icon untuk mobile */
                }

                .candidate-info {
                    order: 3;
                    width: 100%;
                    padding: 0 20px;
                    margin-top: 0;
                }

                .info-card {
                    margin-bottom: 20px;
                }

                .candidate-photo {
                    width: 180px;
                    height: 180px;
                    /* Sesuaikan ukuran foto untuk mobile */
                }

                .candidate-name {
                    font-size: 1.2rem;
                    /* Sesuaikan ukuran font nama untuk mobile */
                    padding: 0 15px;
                }

                .reasons-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }

                .candidate-container {
                    padding: 0;
                }

                .pemilu-header>div:first-child {
                    grid-template-columns: 1fr !important;
                    text-align: center !important;
                }

                .pemilu-header>div:first-child>div:first-child {
                    text-align: center !important;
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
                animateElements.forEach((element, index) => {
                    // Add staggered delay for reason cards and candidate containers
                    if (element.classList.contains('reason-card') || element.classList.contains(
                            'candidate-container')) {
                        element.style.transitionDelay = `${200 + (index * 100)}ms`;
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
                    const headerElements = document.querySelectorAll('.pemilu-header [data-animate]');
                    headerElements.forEach(element => {
                        element.classList.remove('opacity-0', 'translate-y-8');
                        element.classList.add('opacity-100', 'translate-y-0');
                    });

                    // Animate header decorative images
                    const headerDecorativeLeft = document.querySelectorAll(
                        '.pemilu-header [data-animate-left]');
                    headerDecorativeLeft.forEach(element => {
                        element.classList.remove('opacity-0', '-translate-x-8');
                        element.classList.add('opacity-100', 'translate-x-0');
                    });

                    const headerDecorativeRight = document.querySelectorAll(
                        '.pemilu-header [data-animate-right]');
                    headerDecorativeRight.forEach(element => {
                        element.classList.remove('opacity-0', 'translate-x-8');
                        element.classList.add('opacity-100', 'translate-x-0');
                    });
                }, 500);
            });
        </script>
    @endsection
