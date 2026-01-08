@extends('layouts.app')

@section('title', 'Portfolio & Klien Kami - PT. Bintara Mitra Andalan')
@section('meta_description', 'Dipercaya oleh 200+ perusahaan terkemuka di berbagai industri. Lihat portfolio dan testimoni klien PT. Bintara Mitra Andalan.')

@push('styles')
    <style>
        /* ========== PAGE HEADER ========== */
        .portfolio-header {
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            padding: 8rem 2rem 5rem;
            position: relative;
            overflow: hidden;
        }

        .portfolio-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%);
        }

        .portfolio-header-content {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            text-align: center;
            color: var(--white);
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .breadcrumb a {
            color: var(--white);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: var(--gold-accent);
        }

        .portfolio-header h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .portfolio-header p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========== CLIENT STATISTICS ========== */
        .client-stats {
            padding: 0 2rem;
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
        }

        .stat-item {
            text-align: center;
            position: relative;
        }

        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -1.5rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 80px;
            background: var(--gray-200);
        }

        .stat-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--navy-primary);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--gray-600);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========== CLIENT GRID SECTION ========== */
        .client-grid-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .client-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-badge {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            background: var(--gray-100);
            color: var(--navy-primary);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.2rem;
            color: var(--gray-600);
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========== INDUSTRY FILTER ========== */
        .industry-filter {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 4rem;
        }

        .filter-btn {
            padding: 0.875rem 2rem;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 50px;
            color: var(--gray-700);
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-btn:hover {
            border-color: var(--navy-primary);
            color: var(--navy-primary);
            background: var(--gray-50);
        }

        .filter-btn.active {
            background: var(--navy-primary);
            color: var(--white);
            border-color: var(--navy-primary);
        }

        /* ========== CLIENT CARDS ========== */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .client-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .client-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            border-color: var(--navy-primary);
        }

        .client-logo-wrapper {
            width: 100%;
            height: 120px;
            background: var(--gray-50);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            border: 2px solid var(--gray-100);
            transition: all 0.3s;
        }

        .client-card:hover .client-logo-wrapper {
            background: var(--white);
            border-color: var(--navy-primary);
        }

        .client-logo {
            font-size: 2rem;
            color: var(--gray-400);
            font-weight: 700;
            mix-blend-mode: multiply;
        }

        .client-logo img {
            max-width: 100%;
            max-height: 80px;
            object-fit: contain;
            background: transparent;
            
        }

        .client-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .client-industry {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: var(--gray-100);
            color: var(--navy-primary);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .client-info {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .client-year {
            font-size: 0.85rem;
            color: var(--gold-accent);
            font-weight: 700;
        }

        /* ========== TESTIMONIALS ========== */
        .testimonials-section {
            padding: 6rem 2rem;
            background: var(--gray-50);
        }

        .testimonials-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.3s;
            position: relative;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--navy-primary), var(--gold-accent));
            border-radius: 20px 20px 0 0;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            border-color: var(--navy-primary);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .testimonial-client-info h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.25rem;
        }

        .testimonial-client-info p {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin: 0;
        }

        .testimonial-rating {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            color: var(--gold-accent);
        }

        .testimonial-quote {
            font-size: 3rem;
            color: var(--navy-primary);
            opacity: 0.15;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .testimonial-text {
            font-size: 1.05rem;
            color: var(--gray-700);
            line-height: 1.8;
            font-style: italic;
        }

        /* ========== CASE STUDIES ========== */
        .case-studies-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .case-studies-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .case-study-item {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 24px;
            overflow: hidden;
            margin-bottom: 3rem;
            transition: all 0.3s;
        }

        .case-study-item:hover {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            border-color: var(--navy-primary);
        }

        .case-study-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 3rem;
        }

        .case-study-image {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            border-radius: 16px;
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            color: white;
        }

        .case-study-details h3 {
            font-size: 2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 1rem;
        }

        .case-study-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .case-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-600);
        }

        .case-meta-item strong {
            color: var(--navy-primary);
        }

        .case-study-sections {
            display: grid;
            gap: 2rem;
        }

        .case-section {
            padding: 1.5rem;
            background: var(--gray-50);
            border-radius: 12px;
            border-left: 4px solid var(--gold-accent);
        }

        .case-section h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .case-section p {
            color: var(--gray-700);
            line-height: 1.8;
            margin: 0;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, transparent 70%);
        }

        .cta-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
            color: var(--white);
        }

        .cta-container h2 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
        }

        .cta-container p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1.25rem 2.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-accent {
            background: var(--gold-accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background: var(--orange-accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
        }

        .btn-outline-white {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .btn-outline-white:hover {
            background: var(--white);
            color: var(--navy-primary);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .stat-item:nth-child(2)::after {
                display: none;
            }

            .clients-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .case-study-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .portfolio-header h1 {
                font-size: 2.5rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
                padding: 2rem;
            }

            .stat-item::after {
                display: none;
            }

            .section-title {
                font-size: 2rem;
            }

            .clients-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .industry-filter {
                gap: 0.75rem;
            }

            .filter-btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.85rem;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .clients-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Portfolio Header -->
    <section class="portfolio-header">
        <div class="portfolio-header-content">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Portfolio & Klien</span>
            </div>
            <h1>Portfolio & Klien Kami</h1>
            <p>
                Dipercaya oleh 200+ perusahaan terkemuka di berbagai industri untuk mengelola keamanan dan layanan pendukung
                bisnis mereka
            </p>
        </div>
    </section>

    <!-- Client Statistics -->
    <section class="client-stats">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-icon">🤝</div>
                <span class="stat-number" data-target="200">0</span>
                <div class="stat-label">Total Klien</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">🏭</div>
                <span class="stat-number" data-target="7">0</span>
                <div class="stat-label">Industri Dilayani</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">✅</div>
                <span class="stat-number" data-target="350">0</span>
                <div class="stat-label">Proyek Selesai</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">⭐</div>
                <span class="stat-number" data-target="98">0</span>
                <div class="stat-label">Kepuasan (%)</div>
            </div>
        </div>
    </section>

    <!-- Client Grid Section -->
    <section class="client-grid-section">
        <div class="client-container">
            <div class="section-header">
                <div class="section-badge">KLIEN KAMI</div>
                <h2 class="section-title">Dipercaya di Berbagai Industri</h2>
                <p class="section-description">
                    Melayani perusahaan dari berbagai sektor dengan standar profesional yang sama
                </p>
            </div>

            <!-- Industry Filter -->
            <div class="industry-filter">
                <button class="filter-btn active" data-filter="all">Semua Industri</button>
                <button class="filter-btn" data-filter="manufacturing">Manufacturing</button>
                <button class="filter-btn" data-filter="retail">Retail & Mall</button>
                <button class="filter-btn" data-filter="banking">Banking & Finance</button>
                <button class="filter-btn" data-filter="education">Education</button>
                <button class="filter-btn" data-filter="healthcare">Healthcare</button>
                <button class="filter-btn" data-filter="hospitality">Hospitality</button>
                <button class="filter-btn" data-filter="government">Government</button>
            </div>

            <!-- Clients Grid -->
            <div class="clients-grid">
                <!-- Manufacturing Clients -->
                <div class="client-card" data-industry="manufacturing">
                    <div class="client-logo-wrapper">
                        <div class="client-logo"><img src="{{ asset('assets/logo/kik.png') }}" alt=""></div>
                    </div>
                    <h3 class="client-name">PT. KIK</h3>
                    <span class="client-industry">Manufacturing</span>
                    <p class="client-info">Security Guard</p>
                    <p class="client-year">Sejak 2025</p>
                </div>

                <div class="client-card" data-industry="manufacturing">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">⚙️</div>
                    </div>
                    <h3 class="client-name">PT. Multi Manufaktur</h3>
                    <span class="client-industry">Manufacturing</span>
                    <p class="client-info">Security & Patrol Service</p>
                    <p class="client-year">Sejak 2019</p>
                </div>

                <!-- Retail & Mall Clients -->
                <div class="client-card" data-industry="retail">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏬</div>
                    </div>
                    <h3 class="client-name">Central Mall Semarang</h3>
                    <span class="client-industry">Retail & Mall</span>
                    <p class="client-info">Security Guard 24/7</p>
                    <p class="client-year">Sejak 2017</p>
                </div>

                <div class="client-card" data-industry="retail">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🛒</div>
                    </div>
                    <h3 class="client-name">Hypermart Indonesia</h3>
                    <span class="client-industry">Retail & Mall</span>
                    <p class="client-info">Security & Cleaning</p>
                    <p class="client-year">Sejak 2020</p>
                </div>

                <!-- Banking & Finance -->
                <div class="client-card" data-industry="banking">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏦</div>
                    </div>
                    <h3 class="client-name">Bank Mandiri</h3>
                    <span class="client-industry">Banking & Finance</span>
                    <p class="client-info">Security Guard</p>
                    <p class="client-year">Sejak 2016</p>
                </div>

                <div class="client-card" data-industry="banking">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">💳</div>
                    </div>
                    <h3 class="client-name">BCA KCU Semarang</h3>
                    <span class="client-industry">Banking & Finance</span>
                    <p class="client-info">Security & Monitoring</p>
                    <p class="client-year">Sejak 2018</p>
                </div>

                <!-- Education -->
                <div class="client-card" data-industry="education">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🎓</div>
                    </div>
                    <h3 class="client-name">Universitas Diponegoro</h3>
                    <span class="client-industry">Education</span>
                    <p class="client-info">Security Guard Campus</p>
                    <p class="client-year">Sejak 2017</p>
                </div>

                <div class="client-card" data-industry="education">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">📚</div>
                    </div>
                    <h3 class="client-name">SMA Negeri 1 Semarang</h3>
                    <span class="industry">Education</span>
                    <p class="client-info">Security & Cleaning</p>
                    <p class="client-year">Sejak 2019</p>
                </div>

                <!-- Healthcare -->
                <div class="client-card" data-industry="healthcare">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏥</div>
                    </div>
                    <h3 class="client-name">RS. Kariadi Semarang</h3>
                    <span class="client-industry">Healthcare</span>
                    <p class="client-info">Security 24/7 & Cleaning</p>
                    <p class="client-year">Sejak 2018</p>
                </div>

                <div class="client-card" data-industry="healthcare">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">⚕️</div>
                    </div>
                    <h3 class="client-name">RS. Hermina Semarang</h3>
                    <span class="client-industry">Healthcare</span>
                    <p class="client-info">Security & Support Staff</p>
                    <p class="client-year">Sejak 2020</p>
                </div>

                <!-- Hospitality -->
                <div class="client-card" data-industry="hospitality">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏨</div>
                    </div>
                    <h3 class="client-name">Grand Hotel Semarang</h3>
                    <span class="client-industry">Hospitality</span>
                    <p class="client-info">Security & Cleaning</p>
                    <p class="client-year">Sejak 2016</p>
                </div>

                <div class="client-card" data-industry="hospitality">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🍽️</div>
                    </div>
                    <h3 class="client-name">Santika Hotel Group</h3>
                    <span class="client-industry">Hospitality</span>
                    <p class="client-info">Security Guard</p>
                    <p class="client-year">Sejak 2019</p>
                </div>

                <!-- Government -->
                <div class="client-card" data-industry="government">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏛️</div>
                    </div>
                    <h3 class="client-name">Pemkot Semarang</h3>
                    <span class="client-industry">Government</span>
                    <p class="client-info">Security & Cleaning</p>
                    <p class="client-year">Sejak 2017</p>
                </div>

                <div class="client-card" data-industry="government">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🏢</div>
                    </div>
                    <h3 class="client-name">Kantor Prov. Jateng</h3>
                    <span class="client-industry">Government</span>
                    <p class="client-info">Security Guard</p>
                    <p class="client-year">Sejak 2018</p>
                </div>

                <!-- More clients -->
                <div class="client-card" data-industry="manufacturing">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🔧</div>
                    </div>
                    <h3 class="client-name">PT. Teknik Jaya</h3>
                    <span class="client-industry">Manufacturing</span>
                    <p class="client-info">Security & Driver</p>
                    <p class="client-year">Sejak 2021</p>
                </div>

                <div class="client-card" data-industry="retail">
                    <div class="client-logo-wrapper">
                        <div class="client-logo">🛍️</div>
                    </div>
                    <h3 class="client-name">Plaza Indonesia</h3>
                    <span class="client-industry">Retail & Mall</span>
                    <p class="client-info">Full Security Service</p>
                    <p class="client-year">Sejak 2015</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <p style="color: var(--gray-600); font-size: 1.1rem;">
                    Dan masih banyak klien lainnya yang mempercayakan keamanan bisnis mereka kepada kami
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="testimonials-container">
            <div class="section-header">
                <div class="section-badge">TESTIMONI KLIEN</div>
                <h2 class="section-title">Apa Kata Mereka</h2>
                <p class="section-description">
                    Kepuasan klien adalah prioritas utama kami
                </p>
            </div>

            <div class="testimonials-grid">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">PT</div>
                        <div class="testimonial-client-info">
                            <h4>Budi Santoso</h4>
                            <p>General Manager</p>
                            <p>PT. Industri Sejahtera</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Pelayanan PT. Bintara Mitra Andalan sangat profesional. Tim security yang ditugaskan sangat
                        terlatih, disiplin, dan responsif. Sistem monitoring digital mereka juga memudahkan kami untuk
                        tracking aktivitas keamanan secara real-time.
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">CM</div>
                        <div class="testimonial-client-info">
                            <h4>Siti Rahayu</h4>
                            <p>Facility Manager</p>
                            <p>Central Mall Semarang</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Kami sangat puas dengan layanan BIMA Guard. Personel security mereka tidak hanya menjaga keamanan
                        tetapi juga sangat ramah kepada pengunjung mall. Response time terhadap insiden juga sangat cepat
                        dan profesional.
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">BM</div>
                        <div class="testimonial-client-info">
                            <h4>Ahmad Hidayat</h4>
                            <p>Branch Manager</p>
                            <p>Bank Mandiri KCP Semarang</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Untuk industri perbankan, keamanan adalah hal yang sangat krusial. BIMA Guard memahami betul
                        kebutuhan kami dan menyediakan personel dengan standar tinggi. Kami merasa aman dan tenang dengan
                        layanan mereka.
                    </p>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">UD</div>
                        <div class="testimonial-client-info">
                            <h4>Dr. Ratna Wulan</h4>
                            <p>Wakil Rektor II</p>
                            <p>Universitas Diponegoro</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Kampus kami yang luas memerlukan sistem keamanan yang terkoordinasi dengan baik. BIMA Guard berhasil
                        mengelola lebih dari 30 personel security dengan sangat baik. Laporan rutin mereka sangat detail dan
                        membantu kami dalam evaluasi keamanan kampus.
                    </p>
                </div>

                <!-- Testimonial 5 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">RS</div>
                        <div class="testimonial-client-info">
                            <h4>dr. Andi Wijaya</h4>
                            <p>Direktur Operasional</p>
                            <p>RS. Kariadi Semarang</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Di rumah sakit, security harus dapat menangani berbagai situasi dengan bijak. Tim BIMA Guard sangat
                        terlatih dalam menangani pasien dan keluarga dengan empati sambil tetap menjaga keamanan. Sangat
                        recommended!
                    </p>
                </div>

                <!-- Testimonial 6 -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">GH</div>
                        <div class="testimonial-client-info">
                            <h4>Linda Kusuma</h4>
                            <p>General Manager</p>
                            <p>Grand Hotel Semarang</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        Sebagai hotel bintang 5, kami membutuhkan security yang tidak hanya kompeten tapi juga berpenampilan
                        profesional. BIMA Guard memenuhi semua ekspektasi kami. Tamu-tamu kami merasa aman dan nyaman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies -->
    <section class="case-studies-section">
        <div class="case-studies-container">
            <div class="section-header">
                <div class="section-badge">STUDI KASUS</div>
                <h2 class="section-title">Success Stories</h2>
                <p class="section-description">
                    Bagaimana kami membantu klien menyelesaikan tantangan keamanan mereka
                </p>
            </div>

            <!-- Case Study 1 -->
            <div class="case-study-item">
                <div class="case-study-content">
                    <div class="case-study-image">🏬</div>
                    <div class="case-study-details">
                        <h3>Transformasi Sistem Keamanan Mall 5 Lantai</h3>
                        <div class="case-study-meta">
                            <span class="case-meta-item">📍 <strong>Central Mall Semarang</strong></span>
                            <span class="case-meta-item">🏭 <strong>Retail & Mall</strong></span>
                            <span class="case-meta-item">⏱️ <strong>2017 - Sekarang</strong></span>
                        </div>

                        <div class="case-study-sections">
                            <div class="case-section">
                                <h4>🎯 Challenge</h4>
                                <p>
                                    Mall dengan 5 lantai dan 200+ tenant menghadapi tantangan tingginya angka pencurian dan
                                    kurangnya koordinasi security antar lantai. Traffic pengunjung mencapai 10,000+ orang
                                    per hari pada weekend.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>💡 Solution</h4>
                                <p>
                                    Deployment 45 personel security dengan pembagian zona strategis, implementasi sistem
                                    patrol online terintegrasi dengan CCTV 150+ kamera, training khusus customer service,
                                    dan koordinasi dengan police station terdekat.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>📈 Results</h4>
                                <p>
                                    Penurunan insiden pencurian hingga 85%, response time < 2 menit ke seluruh area mall,
                                        kepuasan tenant meningkat 92%, dan zero incident keamanan serius dalam 3 tahun
                                        terakhir. Koordinasi antar shift meningkat 95%. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Case Study 2 -->
            <div class="case-study-item">
                <div class="case-study-content">
                    <div class="case-study-details">
                        <h3>Sistem Keamanan Terintegrasi Pabrik 24/7</h3>
                        <div class="case-study-meta">
                            <span class="case-meta-item">📍 <strong>PT. Industri Sejahtera</strong></span>
                            <span class="case-meta-item">🏭 <strong>Manufacturing</strong></span>
                            <span class="case-meta-item">⏱️ <strong>2018 - Sekarang</strong></span>
                        </div>

                        <div class="case-study-sections">
                            <div class="case-section">
                                <h4>🎯 Challenge</h4>
                                <p>
                                    Pabrik dengan operasional 24/7 memerlukan sistem keamanan yang dapat beradaptasi dengan
                                    shift produksi, menangani keluar-masuk truck material, dan menjaga keamanan aset
                                    produksi bernilai miliaran rupiah.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>💡 Solution</h4>
                                <p>
                                    Deployment 36 personel security dengan sistem shift 3 rotasi, access control system
                                    untuk karyawan dan kendaraan, patrol area produksi setiap 30 menit, dan monitoring
                                    warehouse 24/7 dengan laporan digital real-time.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>📈 Results</h4>
                                <p>
                                    Zero kehilangan aset dalam 6 tahun partnership, efisiensi proses keluar-masuk material
                                    meningkat 40%, dokumentasi insiden lengkap dengan foto dan video, dan audit keamanan
                                    dari klien selalu mendapat nilai A.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-image">🏭</div>
                </div>
            </div>

            <!-- Case Study 3 -->
            <div class="case-study-item">
                <div class="case-study-content">
                    <div class="case-study-image">🏥</div>
                    <div class="case-study-details">
                        <h3>Manajemen Keamanan Rumah Sakit Kelas A</h3>
                        <div class="case-study-meta">
                            <span class="case-meta-item">📍 <strong>RS. Kariadi Semarang</strong></span>
                            <span class="case-meta-item">🏥 <strong>Healthcare</strong></span>
                            <span class="case-meta-item">⏱️ <strong>2018 - Sekarang</strong></span>
                        </div>

                        <div class="case-study-sections">
                            <div class="case-section">
                                <h4>🎯 Challenge</h4>
                                <p>
                                    Rumah sakit dengan 600+ bed capacity membutuhkan security yang dapat menangani situasi
                                    emergency, crowd control saat visite, dan tetap memberikan pelayanan ramah kepada pasien
                                    dan keluarga dalam kondisi emosional tinggi.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>💡 Solution</h4>
                                <p>
                                    Deployment 52 personel security dengan training khusus hospital security, koordinasi
                                    dengan tim medis dan security internal RS, sistem komunikasi radio terintegrasi, dan
                                    pembagian zona: ER, ICU, ruang rawat, dan area publik.
                                </p>
                            </div>

                            <div class="case-section">
                                <h4>📈 Results</h4>
                                <p>
                                    Penanganan lebih dari 500 situasi emergency per tahun dengan response time rata-rata 1.5
                                    menit, tingkat kepuasan pasien terhadap aspek keamanan 96%, zero insiden keamanan major
                                    dalam 6 tahun, dan apresiasi dari Kemenkes RI.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-container">
            <h2>Jadilah Bagian dari Klien Kami</h2>
            <p>
                Bergabunglah dengan 200+ perusahaan yang telah mempercayakan keamanan bisnis mereka kepada kami. Dapatkan
                konsultasi gratis dan penawaran terbaik.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-accent">
                    📋 Ajukan Penawaran
                </a>
                <a href="{{ route('services') }}" class="btn btn-outline-white">
                    🔍 Lihat Layanan
                </a>
                <a href="https://wa.me/62xxx" class="btn btn-outline-white" target="_blank">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Counter animation
            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        element.textContent = Math.floor(current) + (target === 98 ? '%' : '+');
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target + (target === 98 ? '%' : '+');
                    }
                };

                updateCounter();
            }

            // Observe stats for counter animation
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('.stat-number');
                        counters.forEach(counter => animateCounter(counter));
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const statsSection = document.querySelector('.stats-container');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }

            // Industry Filter
            const filterButtons = document.querySelectorAll('.filter-btn');
            const clientCards = document.querySelectorAll('.client-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    // Filter cards
                    clientCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-industry') === filter) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 10);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe elements
            document.querySelectorAll('.client-card, .testimonial-card, .case-study-item').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });

            // Client card click effect
            document.querySelectorAll('.client-card').forEach(card => {
                card.addEventListener('click', () => {
                    // You can add modal or detail view here
                    console.log('Client card clicked:', card.querySelector('.client-name').textContent);
                });
            });
        });
    </script>
@endpush