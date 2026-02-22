@extends('frontpage.layouts.app-frontpage')

@section('title', $product->name . ' - iThings')

@section('pageClass', 'ithings-detail')
@section('content')
    <!-- Header Section -->
    <div class="ithings-header">
        <div class="header-title-section opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
            <span class="ithings-title">iThings</span>
            <span class="ithings-subtitle">PRODUK HIMATIF</span>
        </div>

        <div class="theme-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
            <h1 class="product-show-title">{{ $product->name }}</h1>
            <div class="product-meta">
                <span class="product-category">{{ $product->category->name }}</span>
                @if ($product->size)
                    <span class="product-size-meta">• {{ $product->size }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="ithings-wrapper">
        <div class="product-content-section">
            <div class="product-content-grid">
                <!-- Main Product Content -->
                <div class="product-main-content">
                    <div class="product-detail-card opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                        data-animate>
                        <div class="product-featured-image">
                            @if ($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                                    class="detail-image">
                            @else
                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                    alt="{{ $product->name }}" class="detail-image">
                            @endif
                            <div
                                class="product-status-badge-detail {{ $product->status == 1 ? 'status-available' : 'status-unavailable' }}">
                                {{ $product->status == 1 ? 'Tersedia' : 'Belum Tersedia' }}
                            </div>
                        </div>

                        <div class="product-detail-content opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200"
                            data-animate>
                            <div class="product-price-section">
                                <h2 class="product-price-large">{{ $product->formatted_price }}</h2>
                            </div>

                            @if ($product->description)
                                <div class="product-description">
                                    <h3>Deskripsi Produk</h3>
                                    <p>{{ $product->description }}</p>
                                </div>
                            @endif

                            <div class="product-specifications">
                                <h3>Spesifikasi</h3>
                                <table class="spec-table">
                                    <tr>
                                        <td class="spec-label">Status</td>
                                        <td class="spec-value">
                                            <span
                                                class="spec-status-badge {{ $product->status == 1 ? 'status-available' : 'status-unavailable' }}">
                                                {{ $product->status == 1 ? 'Tersedia' : 'Belum Tersedia' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="spec-label">Kategori</td>
                                        <td class="spec-value">{{ $product->category->name }}</td>
                                    </tr>
                                    @if ($product->size)
                                        <tr>
                                            <td class="spec-label">Ukuran</td>
                                            <td class="spec-value">{{ $product->size }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="spec-label">Harga</td>
                                        <td class="spec-value">{{ $product->formatted_price }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="product-sidebar opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-300"
                    data-animate>
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Produk Lainnya</h3>
                        <div class="sidebar-products">
                            @forelse ($relatedProducts as $related)
                                <div class="sidebar-product-item opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                                    data-animate>
                                    <div class="sidebar-product-image">
                                        @if ($related->photo)
                                            <img src="{{ asset('storage/' . $related->photo) }}"
                                                alt="{{ $related->name }}">
                                        @else
                                            <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                alt="{{ $related->name }}">
                                        @endif
                                    </div>
                                    <div class="sidebar-product-content">
                                        <a href="{{ route('frontpage.ithings.show', $related->slug) }}"
                                            class="sidebar-product-title">
                                            {{ $related->name }}
                                        </a>
                                        <div class="sidebar-product-price">
                                            {{ $related->formatted_price }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="no-related">Tidak ada produk lainnya</p>
                            @endforelse
                        </div>

                        <div class="sidebar-link opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400"
                            data-animate>
                            <a href="{{ route('frontpage.ithings.index') }}" class="view-all-link">
                                Tampilkan Semua Produk →
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

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6289503739107?text=Halo,%20kak%20mau%20beli%20ini%20dungs%20{{ urlencode($product->name) }}"
        class="whatsapp-float" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-whatsapp"></i>
        <span>Pesan Sekarang</span>
    </a>
@endsection

@section('style')
    <style>
        body.ithings-detail {
            background-color: #013049 !important;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Header */
        .ithings-header {
            background-color: #FEF9F1;
            padding: 60px 20px 120px 20px;
            text-align: center;
            border-radius: 0 0 120px 120px;
            position: relative;
            margin-bottom: 40px;
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
        }

        .ithings-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            background: #910E19;
            padding: 15px 30px;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .ithings-subtitle {
            font-size: 1.5rem;
            font-weight: 900;
            color: #013049;
            letter-spacing: 2px;
        }

        .theme-card {
            max-width: 1000px;
            margin: 0 auto;
            text-align: left;
        }

        .product-show-title {
            color: #013049;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .product-meta {
            color: #666;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .product-category {
            background: #910E19;
            color: #FEF9F1;
            padding: 5px 15px;
            border-radius: 15px;
            font-weight: 700;
        }

        .product-size-meta {
            color: #666;
            margin-left: 10px;
        }

        /* Wrapper */
        .ithings-wrapper {
            background-color: #013049;
            min-height: 100vh;
            padding: 0 20px;
        }

        .product-content-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0;
        }

        .product-content-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
            align-items: start;
        }

        /* Main Product Content */
        .product-main-content {
            background: #FEF9F1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .product-detail-card {
            padding: 0;
        }

        .product-featured-image {
            width: 100%;
            max-height: 600px;
            overflow: hidden;
            background: #f5f5f5;
            position: relative;
        }

        .detail-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-status-badge-detail {
            position: absolute;
            top: 25px;
            right: 25px;
            padding: 12px 24px;
            border-radius: 8px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .product-detail-content {
            padding: 40px;
        }

        .product-price-section {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
        }

        .product-price-large {
            color: #910E19;
            font-size: 3rem;
            font-weight: 800;
            margin: 0;
        }

        .product-description {
            margin-bottom: 30px;
        }

        .product-description h3,
        .product-specifications h3 {
            color: #013049;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .product-description p {
            color: #333;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .spec-table {
            width: 100%;
            border-collapse: collapse;
        }

        .spec-table tr {
            border-bottom: 1px solid #e0e0e0;
        }

        .spec-table td {
            padding: 15px 0;
            font-size: 1rem;
        }

        .spec-label {
            color: #666;
            font-weight: 600;
            width: 30%;
        }

        .spec-value {
            color: #013049;
            font-weight: 700;
        }

        .spec-status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-available {
            background: #28a745;
        }

        .status-unavailable {
            background: #6c757d;
        }

        /* Sidebar */
        .product-sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-card {
            background: #FEF9F1;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .sidebar-title {
            color: #013049;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #910E19;
        }

        .sidebar-products {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-product-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: white;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .sidebar-product-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .sidebar-product-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: #f5f5f5;
        }

        .sidebar-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar-product-title {
            color: #013049;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sidebar-product-title:hover {
            color: #910E19;
        }

        .sidebar-product-price {
            color: #910E19;
            font-weight: 800;
            font-size: 1.1rem;
        }

        .no-related {
            color: #666;
            text-align: center;
            padding: 20px;
        }

        .sidebar-link {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid #e0e0e0;
        }

        .view-all-link {
            display: block;
            text-align: center;
            color: #910E19;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            padding: 12px;
            background: white;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            background: #910E19;
            color: #FEF9F1;
        }

        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            color: white;
            border-radius: 50px;
            padding: 15px 25px;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            z-index: 1000;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            background: #20BA5A;
            color: white;
            transform: scale(1.05);
            box-shadow: 0 10px 35px rgba(37, 211, 102, 0.5);
        }

        .whatsapp-float i {
            font-size: 1.5rem;
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            }

            50% {
                box-shadow: 0 8px 35px rgba(37, 211, 102, 0.6);
            }
        }

        /* Footer Image */
        .footer-image-section {
            width: 100%;
            text-align: center;
            margin: 60px 0 0 0;
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

        /* Responsive */
        @media (max-width: 1024px) {
            .product-content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .footer-image-section {
                display: none;
            }

            .header-title-section {
                flex-direction: column;
                gap: 10px;
            }

            .ithings-title {
                font-size: 1.5rem;
                padding: 12px 25px;
            }

            .ithings-subtitle {
                font-size: 1.2rem;
            }

            .product-show-title {
                font-size: 2rem;
            }

            .product-price-large {
                font-size: 2.2rem;
            }

            .product-detail-content {
                padding: 25px;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
                padding: 12px 20px;
            }
        }

        @media (max-width: 480px) {
            .whatsapp-float span {
                display: none;
            }

            .whatsapp-float {
                width: 60px;
                height: 60px;
                padding: 0;
                justify-content: center;
                border-radius: 50%;
            }

            .whatsapp-float i {
                font-size: 2rem;
            }

            .sidebar-product-image {
                width: 60px;
                height: 60px;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach(element => {
                observer.observe(element);
            });

            setTimeout(() => {
                const headerElements = document.querySelectorAll('.ithings-header [data-animate]');
                headerElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });
            }, 500);
        });
    </script>
@endsection
