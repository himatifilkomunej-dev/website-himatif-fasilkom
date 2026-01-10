@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')

@section('content')
    <!-- Header Section -->
    <div class="pemilu-header">
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out" data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out" data-animate-right>

        <h1 class="pemilu-title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>PEMILIHAN
            KANDIDAT</h1>
        <p class="pemilu-subtitle opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>Ketua
            Umum HIMATIF 2025</p>
    </div>


    <div class="pemilu-wrapper">
        @if (session('type') && session('message'))
            <div class="alert-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="alert-message">
                    {{ session('message') }}
                    <span class="alert-close" onclick="this.parentElement.parentElement.remove();">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                            <path
                                d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z">
                            </path>
                        </svg>
                    </span>
                </div>
            </div>
        @endif

        <form action="{{ route('frontpage.pemilu.submitVote') }}" method="POST" class="vote-form-container">
            @csrf

            <!-- Form Input Section -->
            <div class="form-inputs-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="input-group">
                    <label for="nim" class="input-label">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-input" placeholder="Masukkan NIM Anda"
                        required>
                </div>

                <div class="input-group">
                    <label for="token" class="input-label">Token</label>
                    <input type="text" id="token" name="token" class="form-input" placeholder="Masukkan Token Anda"
                        required>
                </div>
            </div>

            <!-- Candidates Selection Section -->
            <div class="candidates-vote-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                @foreach ($candidates as $candidate)
                    <div class="candidate-vote-card opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <input type="radio" name="candidate_id" value="{{ $candidate->id }}"
                            id="candidate-{{ $candidate->id }}" class="candidate-radio" required />
                        <label for="candidate-{{ $candidate->id }}" class="candidate-vote-label">
                            <div class="paslon-badge-vote">Paslon {{ $candidate->id }}</div>
                            <div class="photo-vote-card">
                                <div class="photo-vote-section">
                                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->nama }}"
                                        class="candidate-photo-vote">
                                </div>
                                <div class="candidate-name-vote">
                                    {{ $candidate->nama }}
                                </div>
                                <div class="social-section-vote">
                                    <div class="arrow-left-vote">→</div>
                                    <div class="social-icons-vote">
                                        <img src="{{ asset('img/bagian/icon.png') }}" alt="Social"
                                            class="social-icon-img-vote">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="submit-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <button type="submit" class="submit-button">Kirim Pilihan</button>
            </div>
        </form>
    </div>

    <!-- Footer Image Dekorasi (moved to bottom) -->
    <div style="width:100%;text-align:center;margin:0;"
        class="opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
        <div
            style="background:#FEF9F1;width:100vw;max-width:100%;margin:0 auto;padding:32px 0;display:flex;justify-content:center;align-items:center;position:relative;">
            <div style="width:100%;text-align:center;position:relative;">
                <img src="{{ asset('img/bagian/9.png') }}" alt="Bagian 9"
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
            padding: 100px 20px 160px 20px;
            text-align: center;
            border-radius: 0 0 120px 120px;
            margin-bottom: 40px;
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
            padding: 60px 20px;
        }

        .pemilu-title {
            font-size: 3rem;
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

        .alert-container {
            max-width: 1200px;
            margin: 0 auto 40px;
            padding: 0 20px;
        }

        .alert-message {
            position: relative;
            background: #910E19;
            color: #FEF9F1;
            padding: 20px 60px 20px 30px;
            border-radius: 15px;
            font-weight: 600;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .alert-close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }

        .alert-close svg {
            width: 100%;
            height: 100%;
            fill: #FEF9F1;
        }

        .vote-form-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-inputs-section {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 40px;
            margin-bottom: 60px;
        }

        .input-group {
            margin-bottom: 30px;
        }

        .input-group:last-child {
            margin-bottom: 0;
        }

        .input-label {
            display: block;
            color: #FEF9F1;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 3px solid #FEF9F1;
            border-radius: 999px;
            background: #29546a;
            color: #FEF9F1;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-align: center;
            box-sizing: border-box;
        }

        .form-input::placeholder {
            color: rgba(254, 249, 241, 0.7);
            text-align: center;
        }

        .form-input:focus {
            outline: none;
            border-color: #FEF9F1;
            background: #29546a;
        }

        .candidates-vote-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            margin-bottom: 60px;
        }

        .candidate-vote-card {
            position: relative;
            max-width: 320px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .candidate-radio {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .candidate-vote-label {
            display: block;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .candidate-vote-label:hover {
            transform: translateY(-5px);
        }

        .paslon-badge-vote {
            background: #910E19;
            color: #FEF9F1;
            padding: 8px 18px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            width: 100%;
            max-width: 140px;
            margin-left: auto;
            margin-right: auto;
        }

        .photo-vote-card {
            background: #910E19;
            border-radius: 25px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
            text-align: center;
            overflow: visible;
            clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 25%);
            transition: all 0.3s ease;
        }

        .candidate-radio:checked+.candidate-vote-label .photo-vote-card {
            box-shadow: 0 12px 32px rgba(145, 14, 25, 0.5);
            transform: scale(1.02);
        }

        .candidate-radio:checked+.candidate-vote-label .paslon-badge-vote {
            background: #FEF9F1;
            color: #910E19;
        }

        .photo-vote-section {
            background: #910E19;
            padding: 40px 40px 30px 40px;
        }

        .candidate-photo-vote {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
        }

        .candidate-name-vote {
            font-weight: 900;
            font-size: 1.3rem;
            text-align: center;
            margin-bottom: 20px;
            color: #FEF9F1;
            padding: 0 20px;
        }

        .social-section-vote {
            background: #FEF9F1;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border-radius: 0 0 25px 25px;
        }

        .arrow-left-vote {
            font-size: 3.5rem;
            color: #910E19;
            font-weight: 900;
            line-height: 1;
            letter-spacing: 0.1em;
            margin-top: -10px;
        }

        .social-icons-vote {
            display: flex;
            gap: 8px;
        }

        .social-icon-img-vote {
            height: 35px;
            width: auto;
            object-fit: contain;
        }

        .submit-section {
            text-align: center;
            padding: 20px 0 40px;
        }

        .submit-button {
            background: #910E19;
            color: #FEF9F1;
            padding: 18px 60px;
            border-radius: 50px;
            font-size: 1.3rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .submit-button:hover {
            background: #FEF9F1;
            color: #910E19;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
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
                font-size: 2rem;
                padding: 15px 30px;
            }

            .pemilu-subtitle {
                font-size: 1.1rem;
            }

            .form-inputs-section {
                padding: 30px 20px;
            }

            .candidates-vote-section {
                display: flex;
                justify-content: center;
                gap: 60px;
                margin-bottom: 60px;
                flex-wrap: wrap;
            }

            .candidate-photo-vote {
                width: 180px;
                height: 180px;
            }

            .photo-vote-section {
                padding: 30px 30px 20px 30px;
            }

            .submit-button {
                padding: 15px 40px;
                font-size: 1.1rem;
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
                // Add staggered delay for candidate vote cards
                if (element.classList.contains('candidate-vote-card')) {
                    element.style.transitionDelay = `${400 + (index * 200)}ms`;
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
