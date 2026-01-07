<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PT Bintara Mitra Andalan - Professional Outsourcing Services')</title>
    <meta name="description"
        content="@yield('meta_description', 'Solusi alih daya profesional untuk kebutuhan security, cleaning, dan driver perusahaan Anda.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --navy-primary: #0A1F44;
            --navy-secondary: #1E3A5F;
            --gold-accent: #F59E0B;
            --orange-accent: #EA580C;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --white: #FFFFFF;
            --success: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
            --info: #3B82F6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--gray-900);
            background: var(--white);
            overflow-x: hidden;
        }

        /* ========== TOPBAR ========== */
        .topbar {
            background: var(--navy-primary);
            color: var(--white);
            padding: 0.75rem 0;
            font-size: 0.875rem;
        }

        .topbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-left {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .topbar-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.9;
        }

        .topbar-right {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .social-link {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover {
            background: var(--gold-accent);
            transform: translateY(-2px);
        }

        /* ========== NAVBAR ========== */
        .navbar {
            background: var(--white);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--navy-primary);
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .logo-name {
            font-size: 1.25rem;
            color: var(--navy-primary);
        }

        .logo-tagline {
            font-size: 0.7rem;
            color: var(--gray-600);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--gold-accent);
            transition: width 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--navy-primary);
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .lang-switch {
            display: flex;
            gap: 0.25rem;
            background: var(--gray-100);
            padding: 0.25rem;
            border-radius: 8px;
        }

        .lang-btn {
            padding: 0.4rem 0.8rem;
            border: none;
            background: transparent;
            color: var(--gray-600);
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .lang-btn.active {
            background: var(--white);
            color: var(--navy-primary);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 0.75rem 1.75rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--navy-primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(10, 31, 68, 0.3);
        }

        .btn-accent {
            background: var(--gold-accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background: var(--orange-accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 0.5rem;
        }

        .menu-toggle span {
            width: 28px;
            height: 3px;
            background: var(--navy-primary);
            border-radius: 3px;
            transition: all 0.3s;
        }

        /* ========== MAIN CONTENT ========== */
        main {
            min-height: 60vh;
        }

        /* ========== FOOTER ========== */
        .footer {
            background: var(--navy-primary);
            color: var(--white);
            padding: 4rem 0 2rem;
            margin-top: 5rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-col h3 {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            color: var(--gold-accent);
            font-weight: 700;
        }

        .footer-col p,
        .footer-col a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-col a:hover {
            color: var(--gold-accent);
            padding-left: 5px;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .footer-social .social-link {
            display: flex;
            align-items: center;
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--gold-accent);
        }

        /* ========== FLOATING ELEMENTS ========== */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
            z-index: 999;
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
        }

        .back-to-top {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--navy-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
            z-index: 999;
            cursor: pointer;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(10, 31, 68, 0.3);
        }

        .back-to-top.show {
            opacity: 1;
            pointer-events: all;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            background: var(--navy-secondary);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .topbar {
                display: none;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 90px;
                right: -100%;
                flex-direction: column;
                background: var(--white);
                width: 80%;
                max-width: 400px;
                height: calc(100vh - 90px);
                padding: 2rem;
                box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
                transition: right 0.4s;
                align-items: flex-start;
                gap: 1.5rem;
                overflow-y: auto;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-actions {
                flex-direction: column;
                width: 100%;
                gap: 1rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-links {
                flex-direction: column;
                gap: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                padding: 1rem 1rem;
            }

            .logo {
                font-size: 1.2rem;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .footer {
                padding: 3rem 0 1.5rem;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-container">
            <div class="topbar-left">
                <div class="topbar-item">
                    <span>📞</span>
                    <span>+62 878 2321 7787</span>
                </div>
                <div class="topbar-item">
                    <span>✉️</span>
                    <span>info@bintaramitraandalan.com</span>
                </div>
                <div class="topbar-item">
                    <span>⏰</span>
                    <span>Sen - Sab: 09.00 - 17.00 WIB</span>
                </div>
            </div>
            <div class="topbar-right">
                <a href="#" class="social-link">f</a>
                <a href="#" class="social-link">in</a>
                <a href="#" class="social-link">ig</a>
                <a href="#" class="social-link">tw</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">🛡️</div>
                <div class="logo-text">
                    <span class="logo-name">BIMA GUARD</span>
                    <span class="logo-tagline">Professional Services</span>
                </div>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                </li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                </li>
                <li><a href="{{ route('services') }}"
                        class="{{ request()->routeIs('services*') ? 'active' : '' }}">Layanan</a></li>
                <li><a href="{{ route('portfolio') }}"
                        class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                <li><a href="{{ route('career') }}"
                        class="{{ request()->routeIs('career*') ? 'active' : '' }}">Karir</a></li>
                <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a>
                </li>
                <li><a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>

                <div class="nav-actions">
                    <div class="lang-switch">
                        <button class="lang-btn active" onclick="switchLang('id')">ID</button>
                        <button class="lang-btn" onclick="switchLang('en')">EN</button>
                    </div>
                    <a href="{{ route('contact') }}" class="btn btn-primary"
                        style="color: var(--gray-50); padding: 10px;">Ajukan Penawaran</a>
                </div>
            </ul>

            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-col">
                    <div class="footer-logo">BIMA GUARD</div>
                    <p>PT Bintara Mitra Andalan adalah perusahaan penyedia jasa outsourcing profesional dengan standar
                        ISO dan personel tersertifikasi.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link">f</a>
                        <a href="#" class="social-link">in</a>
                        <a href="#" class="social-link">ig</a>
                        <a href="#" class="social-link">tw</a>
                        <a href="#" class="social-link">yt</a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Perusahaan</h3>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('services') }}">Layanan</a>
                    <a href="{{ route('portfolio') }}">Portfolio</a>
                    <a href="{{ route('career') }}">Karir</a>
                    <a href="{{ route('blog') }}">Blog</a>
                </div>

                <div class="footer-col">
                    <h3>Layanan</h3>
                    <a href="#">Security Guard</a>
                    <a href="#">Cleaning Service</a>
                    <a href="#">Driver Service</a>
                    <a href="#">Patrol & Monitoring</a>
                    <a href="#">CCTV System</a>
                </div>

                <div class="footer-col">
                    <h3>Support</h3>
                    <a href="{{ route('contact') }}">Hubungi Kami</a>
                    <a href="#">FAQ</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>

                <div class="footer-col">
                    <h3>Kantor Pusat</h3>
                    <p>📍 Semarang, Indonesia</p>
                    <p>📞 +62 878 2321 7787</p>
                    <p>✉️ info@bintaramitraandalan.com</p>
                    <p>⏰ Senin - Jumat: 09:00 - 17:00</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= Date('Y') ?> PT Bintara Mitra Andalan. All Rights Reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Elements -->
    <a href="https://wa.me/6287823217787" class="whatsapp-float" target="_blank">💬</a>
    <div class="back-to-top" id="backToTop">↑</div>

    <!-- Scripts -->
    <script>
        // Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');

            const spans = menuToggle.querySelectorAll('span');
            if (navMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translateY(10px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translateY(-10px)';
            } else {
                spans[0].style.transform = '';
                spans[1].style.opacity = '';
                spans[2].style.transform = '';
            }
        });

        // Close menu on link click
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    navMenu.classList.remove('active');
                    const spans = menuToggle.querySelectorAll('span');
                    spans.forEach(span => span.style.transform = '');
                    spans[1].style.opacity = '';
                }
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                navbar.classList.add('scrolled');
                backToTop.classList.add('show');
            } else {
                navbar.classList.remove('scrolled');
                backToTop.classList.remove('show');
            }

            lastScroll = currentScroll;
        });

        // Back to top
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 90;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Language Switcher
        function switchLang(lang) {
            const buttons = document.querySelectorAll('.lang-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Implement actual language switching
            console.log('Switched to:', lang);
        }
    </script>

    @stack('scripts')
</body>

</html>