@extends('frontpage.layouts.app-frontpage')

@section('title', 'iThings - Produk HIMATIF')

@section('pageClass', 'ithings')
@section('content')
    <!-- Header Section - Di luar wrapper supaya lebar selayar -->
    <div class="ithings-header">
        <!-- Gambar dekorasi di dalam header -->
        <img src="{{ asset('img/bagian/3.png') }}"
            class="header-decoration-left opacity-0 -translate-x-8 transition-all duration-1000 ease-out" data-animate-left>
        <img src="{{ asset('img/bagian/4.png') }}"
            class="header-decoration-right opacity-0 translate-x-8 transition-all duration-1000 ease-out" data-animate-right>

        <h1 class="ithings-title opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>iTHINGS</h1>
        <p class="ithings-subtitle opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-200" data-animate>
            PRODUK HIMATIF</p>
        <div class="theme-card opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-400" data-animate>
            <p style="font-size: 1.2rem; line-height: 1.6; font-weight: 600;">
                Temukan berbagai produk eksklusif dari Himpunan Mahasiswa Teknologi Informasi
            </p>
        </div>
    </div>

    <!-- Carousel Section - Full Width -->
    @if (isset($carouselProducts) && $carouselProducts->count() > 0)
        <div class="carousel-section-fullwidth">
            <div class="carousel-wrapper-fullwidth">
                <div class="carousel-track-fullwidth" id="carouselTrack">
                    @foreach ($carouselProducts as $product)
                        <div class="carousel-slide-fullwidth">
                            <a href="{{ route('frontpage.ithings.show', $product->slug) }}" class="carousel-link-fullwidth">
                                <div class="carousel-image-wrapper">
                                    @if ($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" />
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                            alt="{{ $product->name }}" />
                                    @endif
                                    <div class="carousel-overlay">
                                        <div class="carousel-product-name">{{ $product->name }}</div>
                                        <div class="carousel-product-price">{{ $product->formatted_price }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <!-- Duplicate for infinite scroll -->
                    @foreach ($carouselProducts as $product)
                        <div class="carousel-slide-fullwidth">
                            <a href="{{ route('frontpage.ithings.show', $product->slug) }}" class="carousel-link-fullwidth">
                                <div class="carousel-image-wrapper">
                                    @if ($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" />
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                            alt="{{ $product->name }}" />
                                    @endif
                                    <div class="carousel-overlay">
                                        <div class="carousel-product-name">{{ $product->name }}</div>
                                        <div class="carousel-product-price">{{ $product->formatted_price }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="ithings-wrapper">

        <!-- Search Section -->
        <div class="search-section">
            <form action="{{ route('frontpage.ithings.index') }}"
                class="search-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <div class="search-input-wrapper">
                    <input type="search" name="q" value="{{ Request::get('q') }}" class="search-input"
                        placeholder="Masukan Keyword Produk..." />
                    <button type="submit" class="search-button"></button>
                    <input type="hidden" name="category" value="{{ Request::get('category') }}">
                    <input type="hidden" name="limit" value="{{ Request::get('limit') }}">
                </div>
            </form>
        </div>

        <!-- Category Filter -->
        <div class="category-section">
            <div class="category-container opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q')]) }}"
                    class="category-pill {{ !Request::get('category') ? 'active' : '' }}">
                    Semua Produk
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q'), 'category' => $category->id]) }}"
                        class="category-pill {{ Request::get('category') == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Products Cards Grid -->
        <!-- Products Cards Grid -->
        <div class="products-cards-section">
            <div class="products-cards-grid">
                @forelse ($products as $product)
                    <div class="product-card opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                        <a href="{{ route('frontpage.ithings.show', $product->slug) }}" class="product-card-link">
                            <div class="product-card-image">
                                @if ($product->photo)
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                        alt="{{ $product->name }}" />
                                @endif
                                <div
                                    class="product-status-badge {{ $product->status == 1 ? 'status-available' : 'status-unavailable' }}">
                                    {{ $product->status == 1 ? 'Tersedia' : 'Belum Tersedia' }}
                                </div>
                            </div>
                            <div class="product-card-content">
                                <h3 class="product-card-title">{{ $product->name }}</h3>
                                @if ($product->size)
                                    <p class="product-size">
                                        <i class="fas fa-ruler"></i> {{ $product->size }}
                                    </p>
                                @endif
                                <div class="product-price-section">
                                    <span class="product-price">{{ $product->formatted_price }}</span>
                                </div>
                                <div class="view-detail-btn">
                                    Lihat Detail →
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="no-products"
                        style="grid-column: 1/-1; text-align: center; padding: 60px 20px; color: #FEF9F1;">
                        <i class="fas fa-box-open" style="font-size: 4rem; margin-bottom: 20px; opacity: 0.5;"></i>
                        <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Tidak ada produk ditemukan</h3>
                        <p>Silakan coba kata kunci atau kategori lain</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination Section -->
        @if ($products->count() > 0)
            <div class="pagination-section">
                <div class="pagination-wrapper opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate>
                    @php
                        $limit = Request::get('limit', 9);
                        $currentPage = (int) ceil($limit / 9);

                        $query = \App\Models\IthingsProduct::where('status', 1);

                        if (Request::get('q')) {
                            $query->where('name', 'LIKE', '%' . Request::get('q') . '%');
                        }
                        if (Request::get('category')) {
                            $query->where('category_id', Request::get('category'));
                        }

                        $totalProducts = $query->count();
                        $totalPages = ceil($totalProducts / 9);

                        if ($totalPages < 1) {
                            $totalPages = 1;
                        }

                        $hasMore = $products->count() >= 9 && $currentPage < $totalPages;
                    @endphp

                    <!-- First Page Button -->
                    @if ($currentPage > 1)
                        <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q'), 'category' => Request::get('category'), 'limit' => 9]) }}"
                            class="pagination-btn">
                            «
                        </a>
                    @endif

                    <!-- Previous Page Button -->
                    @if ($currentPage > 1)
                        <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q'), 'category' => Request::get('category'), 'limit' => ($currentPage - 1) * 9]) }}"
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
                        <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q'), 'category' => Request::get('category'), 'limit' => ($currentPage + 1) * 9]) }}"
                            class="pagination-btn">
                            ›
                        </a>
                    @endif

                    <!-- Last Page Button -->
                    @if ($currentPage < $totalPages && $totalPages > 2)
                        <a href="{{ route('frontpage.ithings.index', ['q' => Request::get('q'), 'category' => Request::get('category'), 'limit' => $totalPages * 9]) }}"
                            class="pagination-btn">
                            »
                        </a>
                    @endif
                </div>
            </div>
        @endif

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
    <a href="https://wa.me/6282228183433?text=Halo,%20kak%20mau%20beli%20produk%20iThings" class="whatsapp-float"
        target="_blank" rel="noopener noreferrer">
        <i class="fab fa-whatsapp"></i>
        <span>Pesan Sekarang</span>
    </a>
@endsection

@section('style')
    <style>
        body.ithings {
            background-color: #013049 !important;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .ithings-header {
            background-color: #FEF9F1;
            padding: 60px 20px 80px 20px;
            text-align: center;
            border-radius: 0 0 120px 120px;
            margin-bottom: 0;
            width: 100%;
            position: relative;
            overflow: visible;
        }

        .header-decoration-left {
            position: absolute;
            top: -50px;
            left: 0;
            width: 35px;
            height: auto;
            z-index: 1000;
        }

        .header-decoration-right {
            position: absolute;
            top: -50px;
            right: 0;
            width: 35px;
            height: auto;
            z-index: 1000;
        }

        .ithings-wrapper {
            background-color: #013049;
            min-height: 100vh;
            width: 100%;
            padding: 0 20px;
        }

        .ithings-title {
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

        .ithings-subtitle {
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

        /* Full-Width Carousel Section - Modern E-commerce Style */
        .carousel-section-fullwidth {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            padding: 80px 0;
            background: linear-gradient(180deg, #013049 0%, #01243a 100%);
            overflow: hidden;
        }

        .carousel-wrapper-fullwidth {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        /* Gradient fade on edges for seamless effect */
        .carousel-wrapper-fullwidth::before,
        .carousel-wrapper-fullwidth::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 150px;
            z-index: 2;
            pointer-events: none;
        }

        .carousel-wrapper-fullwidth::before {
            left: 0;
            background: linear-gradient(to right, #013049, transparent);
        }

        .carousel-wrapper-fullwidth::after {
            right: 0;
            background: linear-gradient(to left, #013049, transparent);
        }

        .carousel-track-fullwidth {
            display: flex;
            gap: 25px;
            animation: carousel-scroll 40s linear infinite;
            will-change: transform;
        }

        .carousel-track-fullwidth:hover {
            animation-play-state: paused;
        }

        @keyframes carousel-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-50% - 12.5px));
            }
        }

        .carousel-slide-fullwidth {
            flex: 0 0 350px;
            height: 380px;
            position: relative;
        }

        .carousel-link-fullwidth {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            position: relative;
        }

        .carousel-image-wrapper {
            width: 100%;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-image-wrapper:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6);
        }

        .carousel-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-link-fullwidth:hover .carousel-image-wrapper img {
            transform: scale(1.08);
        }

        /* Overlay with product info */
        .carousel-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, transparent 100%);
            padding: 30px 25px;
            transform: translateY(0);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-link-fullwidth:hover .carousel-overlay {
            background: linear-gradient(to top, rgba(145, 14, 25, 0.95) 0%, rgba(145, 14, 25, 0.75) 50%, transparent 100%);
        }

        .carousel-product-name {
            color: #FEF9F1;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 6px;
            line-height: 1.3;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .carousel-product-price {
            color: #FEF9F1;
            font-size: 1.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* Search Section */
        .search-section {
            padding: 60px 0 30px 0;
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

        /* Category Filter Section */
        .category-section {
            padding: 20px 0 40px 0;
            text-align: center;
            background-color: #013049;
        }

        .category-container {
            display: flex;
            gap: 12px;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .category-pill {
            background: rgba(254, 249, 241, 0.1);
            color: #FEF9F1;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .category-pill:hover {
            background: rgba(254, 249, 241, 0.15);
            transform: translateY(-2px);
        }

        .category-pill.active {
            background: #910E19;
            color: #FEF9F1;
            border-color: #910E19;
            box-shadow: 0 8px 20px rgba(145, 14, 25, 0.3);
        }

        /* Products Cards Section */
        .products-cards-section {
            padding: 40px 0;
            background-color: #013049;
        }

        .products-cards-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
            justify-content: center;
        }

        .product-card {
            width: 350px;
            flex: 0 0 350px;
            background: #910E19;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .product-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }

        .product-card-image {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.1);
        }

        .product-status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-available {
            background: #28a745;
            color: #FEF9F1;
        }

        .status-unavailable {
            background: #6c757d;
            color: #FEF9F1;
        }

        .product-card-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
        }

        .product-card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #FEF9F1;
            margin-bottom: 12px;
            line-height: 1.3;
            min-height: 55px;
        }

        .product-size {
            color: rgba(254, 249, 241, 0.8);
            font-size: 0.9rem;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .product-size i {
            margin-right: 5px;
        }

        .product-price-section {
            margin-bottom: 20px;
            padding: 15px 0;
            border-top: 2px solid rgba(254, 249, 241, 0.2);
            border-bottom: 2px solid rgba(254, 249, 241, 0.2);
        }

        .product-price {
            color: #FEF9F1;
            font-size: 2rem;
            font-weight: 800;
            display: block;
        }

        .view-detail-btn {
            color: #910E19;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-align: center;
            background: #FEF9F1;
            padding: 12px 20px;
            border-radius: 10px;
            margin-top: auto;
            box-shadow: 0 4px 15px rgba(254, 249, 241, 0.2);
        }

        .product-card:hover .view-detail-btn {
            background: rgba(254, 249, 241, 0.95);
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(254, 249, 241, 0.3);
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

        /* Responsive Design */
        @media (max-width: 1024px) {
            .carousel-slide-fullwidth {
                flex: 0 0 300px;
                height: 340px;
            }

            .carousel-product-name {
                font-size: 1.2rem;
            }

            .carousel-product-price {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {

            .header-decoration-left,
            .header-decoration-right {
                display: none;
            }

            .footer-image-section {
                display: none;
            }

            .ithings-title {
                font-size: 2.2rem;
                padding: 15px 30px;
            }

            .ithings-subtitle {
                font-size: 1.8rem;
            }

            .theme-card p {
                font-size: 1rem !important;
            }

            .carousel-slide-fullwidth {
                flex: 0 0 250px;
                height: 300px;
            }

            .carousel-wrapper-fullwidth::before,
            .carousel-wrapper-fullwidth::after {
                width: 80px;
            }

            .carousel-product-name {
                font-size: 1.1rem;
            }

            .carousel-product-price {
                font-size: 1.3rem;
            }

            .products-cards-grid {
                gap: 20px;
                padding: 0 10px;
            }

            .product-card {
                margin: 0 10px;
            }

            .search-input {
                font-size: 0.9rem;
                padding: 8px 40px 8px 16px;
            }

            .ithings-wrapper {
                padding: 0 10px;
            }

            .category-container {
                gap: 8px;
            }

            .category-pill {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
                padding: 12px 20px;
            }

            .whatsapp-float span {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .ithings-title {
                font-size: 1.8rem;
                padding: 12px 25px;
            }

            .ithings-subtitle {
                font-size: 1.4rem;
            }

            .carousel-section-fullwidth {
                padding: 50px 0;
            }

            .carousel-slide-fullwidth {
                flex: 0 0 240px;
                height: 300px;
            }

            .carousel-track-fullwidth {
                gap: 15px;
            }

            .carousel-wrapper-fullwidth::before,
            .carousel-wrapper-fullwidth::after {
                width: 50px;
            }

            .carousel-product-name {
                font-size: 1rem;
            }

            .carousel-product-price {
                font-size: 1.2rem;
            }

            .products-cards-grid {
                padding: 0 5px;
            }

            .product-card {
                margin: 0 5px;
            }

            .product-card-content {
                padding: 20px;
            }

            .product-card-title {
                font-size: 1.2rem;
                min-height: auto;
            }

            .product-price {
                font-size: 1.6rem;
            }

            .pagination-wrapper {
                gap: 6px;
            }

            .pagination-btn {
                width: 36px;
                height: 36px;
                font-size: 1.2rem;
            }

            .page-info {
                font-size: 0.9rem;
                min-width: 50px;
                height: 36px;
            }

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
        }
    </style>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carousel automatically scrolls with CSS animation
            // No JavaScript needed for basic functionality
            // Smooth scroll animations with Intersection Observer
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
            let productCardIndex = 0;

            animateElements.forEach((element, index) => {
                // Add staggered delay for product cards in proper order (left to right, row by row)
                if (element.classList.contains('product-card')) {
                    element.style.transitionDelay = `${productCardIndex * 150}ms`;
                    productCardIndex++;
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
                const headerElements = document.querySelectorAll('.ithings-header [data-animate]');
                headerElements.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-y-8');
                    element.classList.add('opacity-100', 'translate-y-0');
                });

                // Animate header decorative images
                const headerDecorativeLeft = document.querySelectorAll(
                    '.ithings-header [data-animate-left]');
                headerDecorativeLeft.forEach(element => {
                    element.classList.remove('opacity-0', '-translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });

                const headerDecorativeRight = document.querySelectorAll(
                    '.ithings-header [data-animate-right]');
                headerDecorativeRight.forEach(element => {
                    element.classList.remove('opacity-0', 'translate-x-8');
                    element.classList.add('opacity-100', 'translate-x-0');
                });
            }, 500);
        });
    </script>
@endsection
