<nav class="bg-[#FEF9F1] relative z-40 px-8 pt-0 pb-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a class="flex items-center space-x-3 mt-4" href="/">
            <img src="{{ asset('img/logo.png') }}" class="h-12 w-12" alt="Logo Himatif">
            <div class="text-3xl font-bold text-[#00101A]">HIMATIF</div>
        </a>

        <!-- Desktop Menu (Custom Native CSS Shapes) -->
        <div class="desktop-nav hidden lg:flex">
            <div class="nav-outer-shape">
                <div class="nav-inner-pill">
                    <a id="beranda" href="/" class="nav-item nav-link active">Beranda</a>
                    <a id="tentang" href="/tentang" class="nav-item nav-link">Tentang</a>
                    <a id="pengurus" href="/pengurus" class="nav-item nav-link">Divisi & Pengurus</a>
                    <a id="proker" href="/proker" class="nav-item nav-link">Proker</a>
                    <a id="berita" href="/berita" class="nav-item nav-link">Berita</a>
                    <div class="dropdown-wrapper">
                        <a id="lainnya" class="nav-item nav-link dropdown-toggle">Lainnya ▾</a>
                        <ul class="dropdown-menu">
                            <li><a id="nim-checker" href="/nim-checker" class="dropdown-item">NIM CHECKER</a></li>
                            {{-- <li><a id="cakap" href="/CakapxHimatif" class="dropdown-item">CAKAPxHIMATIF</a></li> --}}
                            <li><a id="pemilu" href="/pemilu" class="dropdown-item">PEMILU</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="lg:hidden">
            <button id="mobileMenuToggle"
                class="w-10 h-10 flex items-center justify-center bg-[#00101A] text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="lg:hidden hidden mt-6">
        <div class="bg-[#00101A] rounded-2xl p-4">
            <div class="flex flex-col space-y-3">
                <a id="beranda-mobile"
                    class="nav-item bg-[#FEF9F1] text-[#00101A] px-6 py-3 rounded-full text-center font-medium"
                    href="/">Beranda</a>
                <a id="tentang-mobile"
                    class="nav-item text-white px-6 py-3 rounded-full text-center font-medium hover:bg-[#333333] transition-all duration-300"
                    href="/tentang">Tentang</a>
                <a id="pengurus-mobile"
                    class="nav-item text-white px-6 py-3 rounded-full text-center font-medium hover:bg-[#333333] transition-all duration-300"
                    href="/pengurus">Divisi & Pengurus</a>
                <a id="proker-mobile"
                    class="nav-item text-white px-6 py-3 rounded-full text-center font-medium hover:bg-[#333333] transition-all duration-300"
                    href="/proker">Proker</a>
                <a id="berita-mobile"
                    class="nav-item text-white px-6 py-3 rounded-full text-center font-medium hover:bg-[#333333] transition-all duration-300"
                    href="/berita">Berita</a>

                <!-- Dropdown Mobile -->
                <div>
                    <button id="lainnyaMobileToggle"
                        class="w-full nav-item text-white px-6 py-3 rounded-full text-center font-medium hover:bg-[#333333] transition-all duration-300 flex justify-between items-center">
                        <span>Lainnya</span>
                        <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 transform transition-transform duration-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="lainnyaMobileMenu" class="hidden flex-col mt-3 space-y-3">
                        <div>
                            <a id="nim-checker-mobile" href="/nim-checker"
                                class="block w-full bg-gray-100 text-[#00101A] px-5 py-3 rounded-xl text-center text-sm font-medium hover:bg-gray-200 transition-all duration-300">
                                NIM CHECKER
                            </a>
                        </div>
                        {{-- <div>
                            <a id="cakap-mobile" href="/CakapxHimatif"
                                class="block w-full bg-gray-100 text-[#00101A] px-5 py-3 rounded-xl text-center text-sm font-medium hover:bg-gray-200 transition-all duration-300">
                                CAKAPxHIMATIF
                            </a>
                        </div> --}}
                        <div>
                            <a id="pemilu-mobile" href="/pemilu"
                                class="block w-full bg-gray-100 text-[#00101A] px-5 py-3 rounded-xl text-center text-sm font-medium hover:bg-gray-200 transition-all duration-300">
                                PEMILU
                            </a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* ========== Desktop Navbar Custom Shapes ========== */
    .desktop-nav {
        align-items: center;
    }


    .nav-outer-shape {
        --outer-bg: #00101A;
        background: var(--outer-bg);
        /* Bentuk kotak biasa tanpa sudut melengkung */
        border-radius: 0 0 18px 18px;
        padding: 0 30px 0;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 0;
        position: relative;
    }

    /* Lekukan kiri atas (rounded keluar) */
    .nav-outer-shape::before {
        content: '';
        position: absolute;
        top: 0;
        left: -24px;
        width: 24px;
        height: 24px;
        background: radial-gradient(circle at bottom left, transparent 24px, var(--outer-bg) 24px);
    }

    /* Lekukan kanan atas (rounded keluar) */
    .nav-outer-shape::after {
        content: '';
        position: absolute;
        top: 0;
        right: -24px;
        width: 24px;
        height: 24px;
        background: radial-gradient(circle at bottom right, transparent 24px, var(--outer-bg) 24px);
    }

    /* Pastikan konten di atas background */
    .nav-outer-shape>* {
        position: relative;
        z-index: 1;
    }

    /* Pastikan konten di atas background */
    .nav-outer-shape>* {
        position: relative;
        z-index: 1;
    }

    .nav-inner-pill {
        /* Inner pill tetap, sedikit diperbesar */
        --cream: #FEF9F1;
        background: #00101A;
        border: 4px solid var(--cream);
        /* Border lebih tebal dari 2px jadi 4px */
        border-radius: 9999px;
        display: flex;
        gap: 4px;
        /* padding: 6px 10px; */
        /* dulu 4px 6px */
        position: relative;
    }

    .nav-link {
        color: #FFFFFF;
        font-size: 0.95rem;
        /* diperbesar */
        font-weight: 600;
        /* sedikit lebih tebal */
        padding: 12px 26px;
        /* diperbesar dari 10px 22px */
        line-height: 1.1;
        border-radius: 9999px;
        cursor: pointer;
        transition: background .25s ease, color .25s ease;
        user-select: none;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .nav-link:hover {
        background: #333333;
    }

    .nav-link.active {
        background: #FEF9F1;
        color: #00101A;
    }

    /* Dropdown */
    .dropdown-wrapper {
        position: relative;
    }

    .dropdown-toggle {
        padding-right: 30px;
    }

    .dropdown-wrapper:hover .dropdown-menu {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 10px;
        background: #FFFFFF;
        border-radius: 14px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .15);
        padding: 8px 0;
        list-style: none;
        width: 190px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(6px);
        transition: opacity .25s ease, transform .25s ease;
        z-index: 60;
    }

    .dropdown-item {
        display: block;
        padding: 9px 18px;
        font-size: 0.75rem;
        /* 12px */
        text-decoration: none;
        color: #00101A;
        font-weight: 500;
        transition: background .25s ease, padding-left .25s ease;
        white-space: nowrap;
    }

    .dropdown-item:hover {
        background: #F2F2F2;
        padding-left: 22px;
    }

    /* Small helper classes for quick future shape tuning */
    .nav-outer-shape.variant-rounded {
        border-radius: 50px;
    }

    .nav-outer-shape.variant-cut-left {
        border-top-left-radius: 12px;
        border-bottom-left-radius: 50px;
    }

    @media (max-width:1023px) {

        /* hide custom desktop nav on mobile */
        .desktop-nav {
            display: none;
        }
    }
</style>

<script>
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const lainnyaMobileToggle = document.getElementById('lainnyaMobileToggle');
    const lainnyaMobileMenu = document.getElementById('lainnyaMobileMenu');
    const arrowIcon = document.getElementById('arrowIcon');

    mobileMenuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Toggle dropdown mobile
    lainnyaMobileToggle.addEventListener('click', function() {
        lainnyaMobileMenu.classList.toggle('hidden');
        arrowIcon.classList.toggle('rotate-180');
    });

    // Auto set active based on current URL
    function setActiveFromURL() {
        const currentPath = window.location.pathname;

        // Desktop nav links (custom) use .nav-link and .active
        document.querySelectorAll('.nav-inner-pill .nav-link').forEach(el => el.classList.remove('active'));

        // Mobile items still Tailwind-based
        document.querySelectorAll('#mobileMenu .nav-item').forEach(item => {
            item.classList.remove('bg-[#FEF9F1]', 'text-[#00101A]');
            item.classList.add('text-white');
        });

        let desktopActive = 'beranda';
        let mobileActive = ['beranda-mobile'];
        let openDropdown = false;

        if (currentPath !== '/' && currentPath !== '') {
            if (currentPath.includes('/tentang')) {
                desktopActive = 'tentang';
                mobileActive = ['tentang-mobile'];
            } else if (currentPath.includes('/pengurus')) {
                desktopActive = 'pengurus';
                mobileActive = ['pengurus-mobile'];
            } else if (currentPath.includes('/proker')) {
                desktopActive = 'proker';
                mobileActive = ['proker-mobile'];
            } else if (currentPath.includes('/berita')) {
                desktopActive = 'berita';
                mobileActive = ['berita-mobile'];
            } else if (currentPath.includes('/nim-checker')) {
                desktopActive = 'lainnya';
                mobileActive = ['nim-checker-mobile'];
                openDropdown = true;
            } else if (currentPath.includes('/CakapxHimatif')) {
                desktopActive = 'lainnya';
                mobileActive = ['cakap-mobile'];
                openDropdown = true;
            } else if (currentPath.includes('/pemilu')) {
                desktopActive = 'lainnya';
                mobileActive = ['pemilu-mobile'];
                openDropdown = true;
            }
        }

        const desktopEl = document.getElementById(desktopActive);
        if (desktopEl) desktopEl.classList.add('active');

        mobileActive.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('text-white');
                el.classList.add('bg-[#FEF9F1]', 'text-[#00101A]');
            }
        });

        if (openDropdown) {
            // highlight dropdown toggle on desktop
            const lainnyaToggle = document.getElementById('lainnya');
            if (lainnyaToggle) lainnyaToggle.classList.add('active');
            // expand mobile submenu
            lainnyaMobileMenu.classList.remove('hidden');
            arrowIcon.classList.add('rotate-180');
        }
    }

    document.addEventListener('DOMContentLoaded', setActiveFromURL);
</script>
