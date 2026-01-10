@extends('frontpage.layouts.app-frontpage')

@section('title', 'Detail Berita')

@section('pageClass', 'berita')
@section('content')
    <!-- Header Section - Di luar wrapper supaya lebar selayar -->
    <div class="berita-header">
        <div class="header-title-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
            <span class="berita-title">BERITA TERKINI</span>
            <span class="berita-subtitle">TEKNOLOGI INFORMASI</span>
        </div>

        <div class="theme-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
            <h1 class="berita-show-title">{{ $post->title }}</h1>
            <div class="berita-meta">
                <span class="berita-date-header">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
            </div>
        </div>
    </div>

    <div class="berita-wrapper">
        <div class="berita-content-section">
            <div class="berita-content-grid">
                <div class="berita-main-content">
                    <div class="berita-article-card opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <div class="berita-featured-image">
                            @if ($post->photo)
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}"
                                    class="article-image">
                            @else
                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                    alt="{{ $post->title }}" class="article-image">
                            @endif
                        </div>

                        <div class="berita-article-content opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                            data-animate>
                            <div class="article-body">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="berita-sidebar opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300"
                    data-animate>
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Berita Lainnya</h3>
                        <div class="sidebar-posts">
                            @foreach ($otherPosts as $otherPost)
                                <div class="sidebar-post-item opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                                    data-animate>
                                    <div class="sidebar-post-image">
                                        @if ($otherPost->photo)
                                            <img src="{{ asset('storage/' . $otherPost->photo) }}"
                                                alt="{{ $otherPost->title }}">
                                        @else
                                            <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                alt="{{ $otherPost->title }}">
                                        @endif
                                    </div>
                                    <div class="sidebar-post-content">
                                        <a href="{{ route('frontpage.berita.show', $otherPost->slug) }}"
                                            class="sidebar-post-title">
                                            {{ $otherPost->title }}
                                        </a>
                                        <div class="sidebar-post-excerpt">
                                            {{ Str::limit(strip_tags($otherPost->body), 60) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-link opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                            data-animate>
                            <a href="{{ route('frontpage.berita') }}" class="view-all-link">
                                Tampilkan Semua Berita →
                            </a>
                        </div>
                    </div>
                </div>
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
    @vite('resources/css/frontpage/ckeditor.css')

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



        .berita-wrapper {
            background-color: #013049;
            min-height: 100vh;
            width: 100%;
            padding: 0 20px;
        }

        .header-title-section {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            justify-content: flex-start;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
        }

        .berita-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            background: #910E19;
            padding: 15px 30px;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .berita-subtitle {
            font-size: 1.8rem;
            color: #000000;
            font-weight: 900;
        }

        .theme-card {
            background: transparent;
            color: black;
            padding: 0;
            border-radius: 0;
            max-width: 1000px;
            margin: 0 auto;
            border: none;
            box-shadow: none;
            text-align: left;
        }

        .berita-show-title {
            font-size: 2.5rem;
            font-weight: 900;
            color: #013049;
            margin-bottom: 15px;
            line-height: 1.2;
            text-align: left;
        }

        .berita-meta {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            margin-bottom: 10px;
        }

        .berita-date-header {
            color: #013049;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .berita-content-section {
            padding: 60px 0;
            background-color: #013049;
        }

        .berita-content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .berita-main-content {
            background: #013049;
        }

        .berita-article-card {
            background: transparent;
            margin-bottom: 30px;
        }

        .berita-featured-image {
            width: 100%;
            height: 400px;
            overflow: hidden;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .berita-article-content {
            padding: 0;
        }

        .article-body {
            color: #FEF9F1;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .article-body h1,
        .article-body h2,
        .article-body h3 {
            color: #FEF9F1;
            font-weight: 700;
            margin: 30px 0 20px 0;
        }

        .article-body p {
            margin-bottom: 20px;
            color: #FEF9F1;
        }

        .berita-sidebar {
            background: #013049;
        }

        .sidebar-card {
            background: transparent;
            padding: 0;
        }

        .sidebar-title {
            color: #FEF9F1;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }

        .sidebar-posts {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-post-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: #910E19;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .sidebar-post-item:hover {
            background: rgba(145, 14, 25, 0.8);
        }

        .sidebar-post-image {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .sidebar-post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-post-content {
            flex: 1;
        }

        .sidebar-post-title {
            color: #FEF9F1;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .sidebar-post-title:hover {
            color: rgba(254, 249, 241, 0.8);
        }

        .sidebar-post-excerpt {
            color: rgba(254, 249, 241, 0.7);
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .sidebar-link {
            margin-top: 25px;
            text-align: center;
        }

        .view-all-link {
            color: #910E19;
            text-decoration: none;
            font-weight: 600;
            padding: 12px 25px;
            background: #FEF9F1;
            border: 2px solid #FEF9F1;
            border-radius: 25px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            background: rgba(254, 249, 241, 0.8);
            color: #910E19;
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

            .footer-image-section {
                display: none;
            }

            .header-title-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .berita-title {
                font-size: 1.5rem;
                padding: 12px 25px;
            }

            .berita-subtitle {
                font-size: 1.5rem;
            }

            .berita-show-title {
                font-size: 1.8rem;
            }

            .berita-content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 0 10px;
            }

            .berita-article-content {
                padding: 25px;
            }

            .article-body {
                font-size: 1rem;
            }

            .berita-wrapper {
                padding: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .berita-title {
                font-size: 1.3rem;
                padding: 10px 20px;
            }

            .berita-subtitle {
                font-size: 1.3rem;
            }

            .berita-show-title {
                font-size: 1.5rem;
            }

            .berita-article-content {
                padding: 20px;
            }

            .sidebar-card {
                padding: 20px;
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

            // Observer for vertical animations
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
            animateElements.forEach((element, index) => {
                // Add staggered delay for sidebar posts
                if (element.classList.contains('sidebar-post-item')) {
                    element.style.transitionDelay = `${500 + (index * 100)}ms`;
                }
                observer.observe(element);
            });

            // Header section animate on load (without intersection observer)
            setTimeout(() => {
                const headerElements = document.querySelectorAll('.berita-header [data-animate]');
                headerElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });
            }, 500);
        });
    </script>

    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
         */
        /*
        var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        // (function() { // DON'T EDIT BELOW THIS LINE
        //     var d = document,
        //         s = d.createElement('script');

        //     s.src = 'https://firmantest.disqus.com/embed.js';

        //     s.setAttribute('data-timestamp', +new Date());
        //     (d.head || d.body).appendChild(s);
        // })();
    </script>
@endsection
