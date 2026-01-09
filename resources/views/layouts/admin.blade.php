<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin Panel | PT. Bintara Mitra Andalan</title>
    
    <style>
        /* ========== CSS VARIABLES ========== */
        :root {
            --navy-primary: #0A1F44;
            --navy-secondary: #1E3A5F;
            --gold-accent: #F59E0B;
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --sidebar-width: 280px;
            --topbar-height: 70px;
        }

        /* ========== RESET ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
        }

        /* ========== LAYOUT ========== */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            color: var(--white);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: var(--white);
        }

        .sidebar-logo-icon {
            width: 45px;
            height: 45px;
            background: var(--gold-accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .sidebar-logo-text h2 {
            font-size: 1.3rem;
            font-weight: 900;
            margin-bottom: 0.2rem;
        }

        .sidebar-logo-text p {
            font-size: 0.75rem;
            opacity: 0.7;
        }

        /* ========== NAVIGATION ========== */
        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            padding: 0 1.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.5;
            margin-bottom: 0.75rem;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: var(--gold-accent);
            border-radius: 0 4px 4px 0;
            transition: height 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        .nav-link.active::before {
            height: 100%;
        }

        .nav-icon {
            font-size: 1.3rem;
            width: 24px;
            text-align: center;
        }

        .nav-text {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--gold-accent);
            color: var(--white);
            padding: 0.2rem 0.6rem;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
        }

        /* ========== TOPBAR ========== */
        .topbar {
            height: var(--topbar-height);
            background: var(--white);
            border-bottom: 2px solid var(--gray-100);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            background: var(--gray-100);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.3rem;
            transition: all 0.3s;
        }

        .menu-toggle:hover {
            background: var(--gray-200);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .breadcrumb a {
            color: var(--gray-600);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: var(--navy-primary);
        }

        .breadcrumb-separator {
            color: var(--gray-400);
        }

        .breadcrumb-current {
            color: var(--navy-primary);
            font-weight: 700;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* Search Box */
        .search-box {
            position: relative;
        }

        .search-input {
            width: 300px;
            padding: 0.7rem 1rem 0.7rem 2.8rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 3px rgba(10, 31, 68, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1.1rem;
        }

        /* Notifications */
        .notification-btn {
            position: relative;
            width: 45px;
            height: 45px;
            background: var(--gray-100);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.3rem;
            transition: all 0.3s;
        }

        .notification-btn:hover {
            background: var(--gray-200);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: #ef4444;
            color: var(--white);
            border-radius: 50%;
            font-size: 0.7rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* User Menu */
        .user-menu {
            position: relative;
        }

        .user-menu-trigger {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-menu-trigger:hover {
            border-color: var(--navy-primary);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--navy-primary);
            display: block;
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--gray-500);
        }

        .user-menu-icon {
            color: var(--gray-400);
            font-size: 1rem;
        }

        /* User Dropdown */
        .user-dropdown {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            width: 220px;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        .user-dropdown.active {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.9rem 1.2rem;
            color: var(--gray-700);
            text-decoration: none;
            transition: all 0.3s;
            border-bottom: 1px solid var(--gray-100);
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: var(--gray-50);
            color: var(--navy-primary);
        }

        .dropdown-item.danger {
            color: #ef4444;
        }

        .dropdown-item.danger:hover {
            background: #fef2f2;
        }

        /* ========== CONTENT AREA ========== */
        .content-wrapper {
            padding: 0;
        }

        /* ========== FOOTER ========== */
        .admin-footer {
            background: var(--white);
            border-top: 2px solid var(--gray-100);
            padding: 1.5rem 2rem;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-text {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--navy-primary);
        }

        /* ========== BUTTONS ========== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--navy-primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10, 31, 68, 0.3);
        }

        .btn-accent {
            background: var(--gold-accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            :root {
                --sidebar-width: 0;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .search-input {
                width: 200px;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .topbar {
                padding: 0 1rem;
            }

            .search-box {
                display: none;
            }

            .breadcrumb {
                display: none;
            }

            .footer-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-links {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* ========== OVERLAY ========== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                    <div class="sidebar-logo-icon">🛡️</div>
                    <div class="sidebar-logo-text">
                        <h2>BIMA</h2>
                        <p>Admin Panel</p>
                    </div>
                </a>
            </div>

            <nav class="sidebar-nav">
                <!-- Main Menu -->
                <div class="nav-section">
                    <div class="nav-section-title">Menu Utama</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                                <span class="nav-icon">📊</span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.index') }}" class="nav-link {{ Request::routeIs('admin.profile*') ? 'active' : '' }}">
                                <span class="nav-icon">🏢</span>
                                <span class="nav-text">Profil Perusahaan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Content Management -->
                <div class="nav-section">
                    <div class="nav-section-title">Konten Website</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.services.index') }}" class="nav-link {{ Request::routeIs('admin.services*') ? 'active' : '' }}">
                                <span class="nav-icon">🛠️</span>
                                <span class="nav-text">Layanan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}" class="nav-link {{ Request::routeIs('admin.blog*') ? 'active' : '' }}">
                                <span class="nav-icon">📰</span>
                                <span class="nav-text">Blog & Artikel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.clients.index') }}" class="nav-link {{ Request::routeIs('admin.clients*') ? 'active' : '' }}">
                                <span class="nav-icon">🏆</span>
                                <span class="nav-text">Klien & Testimoni</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.portfolio.index') }}" class="nav-link {{ Request::routeIs('admin.portfolio*') ? 'active' : '' }}">
                                <span class="nav-icon">💼</span>
                                <span class="nav-text">Portfolio</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Career & Applications -->
                <div class="nav-section">
                    <div class="nav-section-title">Karir & Rekrutmen</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.career.index') }}" class="nav-link {{ Request::routeIs('admin.career.index') ? 'active' : '' }}">
                                <span class="nav-icon">💼</span>
                                <span class="nav-text">Lowongan Kerja</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.career.index') }}" class="nav-link {{ Request::routeIs('admin.career.index*') ? 'active' : '' }}">
                                <span class="nav-icon">👥</span>
                                <span class="nav-text">Lamaran Masuk</span>
                                <span class="nav-badge">24</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Inbox -->
                <div class="nav-section">
                    <div class="nav-section-title">Komunikasi</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ Request::routeIs('admin.inquiries.index*') ? 'active' : '' }}">
                                <span class="nav-icon">📬</span>
                                <span class="nav-text">RFQ & Penawaran</span>
                                <span class="nav-badge">18</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ Request::routeIs('admin.contacts.index*') ? 'active' : '' }}">
                                <span class="nav-icon">📧</span>
                                <span class="nav-text">Pesan Kontak</span>
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Media & Settings -->
                <div class="nav-section">
                    <div class="nav-section-title">Lainnya</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.media.index') }}" class="nav-link {{ Request::routeIs('admin.media.index*') ? 'active' : '' }}">
                                <span class="nav-icon">🖼️</span>
                                <span class="nav-text">Media Library</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ Request::routeIs('admin.settings.index*') ? 'active' : '' }}">
                                <span class="nav-icon">⚙️</span>
                                <span class="nav-text">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Sidebar Overlay (Mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle">☰</button>
                    <nav class="breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">🏠 Home</a>
                        <span class="breadcrumb-separator">›</span>
                        <span class="breadcrumb-current">@yield('page-title', 'Dashboard')</span>
                    </nav>
                </div>

                <div class="topbar-right">
                    <!-- Search -->
                    <div class="search-box">
                        <span class="search-icon">🔍</span>
                        <input type="text" class="search-input" placeholder="Cari...">
                    </div>

                    <!-- Notifications -->
                    <button class="notification-btn" id="notificationBtn">
                        🔔
                        <span class="notification-badge">3</span>
                    </button>

                    <!-- User Menu -->
                    <div class="user-menu">
                        <div class="user-menu-trigger" id="userMenuTrigger">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}</div>
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <span class="user-role">Administrator</span>
                            </div>
                            <span class="user-menu-icon">▼</span>
                        </div>
                        <div class="user-dropdown" id="userDropdown">
                            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                                <span>👤</span>
                                <span>Profil Saya</span>
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="dropdown-item">
                                <span>⚙️</span>
                                <span>Pengaturan</span>
                            </a>
                            <a href="{{ route('home') }}" class="dropdown-item" target="_blank">
                                <span>🌐</span>
                                <span>Lihat Website</span>
                            </a>
                            <form action="" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item danger" style="width: 100%; background: none; border: none; cursor: pointer; text-align: left;">
                                    <span>🚪</span>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Wrapper -->
            <main class="content-wrapper">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="admin-footer">
                <div class="footer-content">
                    <div class="footer-text">
                        © {{ date('Y') }} PT. Bintara Mitra Andalan. All rights reserved.
                    </div>
                    <div class="footer-links">
                        <a href="#">Dokumentasi</a>
                        <a href="#">Support</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        menuToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
        });

        sidebarOverlay?.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });

        // User Menu Dropdown
        const userMenuTrigger = document.getElementById('userMenuTrigger');
        const userDropdown = document.getElementById('userDropdown');

        userMenuTrigger?.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuTrigger?.contains(e.target)) {
                userDropdown?.classList.remove('active');
            }
        });

        // Notification button
        const notificationBtn = document.getElementById('notificationBtn');
        notificationBtn?.addEventListener('click', () => {
            alert('Notification feature coming soon!');
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        searchInput?.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const searchTerm = e.target.value;
                console.log('Searching for:', searchTerm);
                // Implement search logic here
            }
        });

        // Auto-hide notifications after interactions
        setTimeout(() => {
            const badge = document.querySelector('.notification-badge');
            if (badge && parseInt(badge.textContent) > 0) {
                // Could implement auto-refresh of notification count
            }
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>