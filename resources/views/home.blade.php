@extends('layouts.app')

@section('title', 'Beranda - PT. Bintara Mitra Andalan')
@section('meta_description', 'Solusi alih daya profesional untuk kebutuhan security, cleaning, dan driver perusahaan Anda dengan personel tersertifikasi dan sistem monitoring 24/7.')

@push('styles')
    <style>
        /* ========== HERO SLIDER ========== */
        .hero-slider {
            position: relative;
            height: 90vh;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(10, 31, 68, 0.9) 0%, rgba(30, 58, 95, 0.8) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: var(--white);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            width: fit-content;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            max-width: 900px;
        }

        .hero-highlight {
            color: var(--gold-accent);
            position: relative;
        }

        .hero-description {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 3rem;
            max-width: 700px;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .hero-actions .btn {
            padding: 1.1rem 2.5rem;
            font-size: 1.05rem;
            border-radius: 10px;
        }

        .slider-nav {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 3;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-dot.active {
            background: var(--gold-accent);
            width: 40px;
            border-radius: 6px;
        }

        /* ========== STATS SECTION ========== */
        .stats-section {
            margin-top: -80px;
            position: relative;
            z-index: 10;
            padding: 0 2rem;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 20px;
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
            height: 60px;
            background: var(--gray-200);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--gray-600);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========== SERVICES SECTION ========== */
        .services-section {
            padding: 6rem 2rem;
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

        .services-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .service-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--navy-primary), var(--gold-accent));
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .service-card:hover {
            transform: translateY(-8px);
            border-color: var(--navy-primary);
            box-shadow: 0 20px 50px rgba(10, 31, 68, 0.15);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1rem;
        }

        .service-description {
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s;
        }

        .service-link:hover {
            gap: 1rem;
            color: var(--gold-accent);
        }

        /* ========== CLIENTS SECTION ========== */
        .clients-section {
            padding: 5rem 2rem;
            background: var(--gray-50);
        }

        .clients-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .clients-title {
            text-align: center;
            font-size: 1rem;
            font-weight: 700;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 3rem;
        }

        .clients-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            align-items: center;
        }

        .client-logo {
            height: 80px;
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            transition: all 0.3s;
            font-weight: 700;
            color: var(--gray-400);
            font-size: 0.9rem;
        }

        .client-logo:hover {
            border-color: var(--navy-primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* ========== WHY CHOOSE US ========== */
        .why-section {
            padding: 6rem 2rem;
        }

        .why-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }

        .why-image {
            position: relative;
        }

        .why-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .why-badge {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background: var(--gold-accent);
            color: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(245, 158, 11, 0.4);
            text-align: center;
        }

        .why-badge-number {
            font-size: 3.5rem;
            font-weight: 900;
            display: block;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .why-badge-text {
            font-size: 1rem;
            font-weight: 700;
        }

        .why-content h2 {
            font-size: 3rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .why-description {
            font-size: 1.1rem;
            color: var(--gray-600);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .why-features {
            display: grid;
            gap: 1.5rem;
        }

        .why-feature {
            display: flex;
            gap: 1.25rem;
            align-items: flex-start;
        }

        .why-feature-icon {
            width: 60px;
            height: 60px;
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            flex-shrink: 0;
            transition: all 0.3s;
        }

        .why-feature:hover .why-feature-icon {
            background: var(--navy-primary);
            border-color: var(--navy-primary);
            transform: scale(1.05);
        }

        .why-feature-content h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .why-feature-content p {
            color: var(--gray-600);
            line-height: 1.6;
        }

        /* ========== DUAL CTA SECTION ========== */
        .dual-cta-section {
            padding: 6rem 2rem;
            background: var(--navy-primary);
            position: relative;
            overflow: hidden;
        }

        .dual-cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, transparent 70%);
        }

        .dual-cta-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .dual-cta-header {
            text-align: center;
            color: var(--white);
            margin-bottom: 4rem;
        }

        .dual-cta-header h2 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .dual-cta-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        .dual-cta-boxes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .cta-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            transition: all 0.4s;
        }

        .cta-box:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-10px);
            border-color: var(--gold-accent);
        }

        .cta-icon {
            width: 100px;
            height: 100px;
            background: var(--gold-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 2rem;
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);
        }

        .cta-box h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .cta-box p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .cta-box .btn {
            width: 100%;
            justify-content: center;
            padding: 1.2rem 2rem;
            font-size: 1.1rem;
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

            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .clients-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }

            .hero-actions {
                flex-direction: column;
                width: 100%;
            }

            .hero-actions .btn {
                width: 100%;
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

            .services-grid {
                grid-template-columns: 1fr;
            }

            .clients-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .why-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .why-image {
                order: 2;
            }

            .why-content {
                order: 1;
            }

            .why-badge {
                bottom: 20px;
                right: 20px;
            }

            .dual-cta-boxes {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Slider -->
    <section class="hero-slider">
        <div class="hero-slide active"
            style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 1920 1080%27%3E%3Crect fill=%27%230A1F44%27 width=%271920%27 height=%271080%27/%3E%3C/svg%3E');">
            <div class="hero-content">
                <div class="hero-badge">
                    <span>🏆</span>
                    <span>ISO Certified & Trusted by 200+ Companies</span>
                </div>
                <h1 class="hero-title">
                    Solusi Alih Daya<br>
                    <span class="hero-highlight">Terpercaya & Terlatih</span>
                </h1>
                <p class="hero-description">
                    Menyediakan personel profesional dengan sertifikasi lengkap untuk kebutuhan security, cleaning, dan
                    driver perusahaan Anda.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('contact') }}" class="btn btn-accent">
                        📋 Ajukan Penawaran
                    </a>
                    <a href="{{ route('career') }}" class="btn btn-primary">
                        💼 Cari Lowongan Kerja
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-slide"
            style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 1920 1080%27%3E%3Crect fill=%27%231E3A5F%27 width=%271920%27 height=%271080%27/%3E%3C/svg%3E');">
            <div class="hero-content">
                <div class="hero-badge">
                    <span>🛡️</span>
                    <span>24/7 Monitoring & Professional Team</span>
                </div>
                <h1 class="hero-title">
                    Personel Tersertifikasi<br>
                    <span class="hero-highlight">Gada Pratama</span>
                </h1>
                <p class="hero-description">
                    Semua personel security kami telah melalui 6 tahap seleksi ketat dan memiliki sertifikasi Gada Pratama
                    dari Kepolisian.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('services') }}" class="btn btn-accent">
                        🔍 Lihat Layanan
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-primary">
                        📖 Tentang Kami
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-slide"
            style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 1920 1080%27%3E%3Crect fill=%27%23152238%27 width=%271920%27 height=%271080%27/%3E%3C/svg%3E');">
            <div class="hero-content">
                <div class="hero-badge">
                    <span>📊</span>
                    <span>Multi-Regional Coverage & Support</span>
                </div>
                <h1 class="hero-title">
                    Monitoring Digital<br>
                    <span class="hero-highlight">Real-Time 24/7</span>
                </h1>
                <p class="hero-description">
                    Sistem monitoring berbasis aplikasi dengan laporan digital real-time untuk transparansi dan efisiensi
                    operasional.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('contact') }}" class="btn btn-accent">
                        📞 Konsultasi Gratis
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">
                        🏆 Lihat Portfolio
                    </a>
                </div>
            </div>
        </div>

        <div class="slider-nav">
            <div class="slider-dot active" data-slide="0"></div>
            <div class="slider-dot" data-slide="1"></div>
            <div class="slider-dot" data-slide="2"></div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-icon">👮</div>
                <span class="stat-number" data-target="500">0</span>
                <div class="stat-label">Personel Terlatih</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">🤝</div>
                <span class="stat-number" data-target="200">0</span>
                <div class="stat-label">Klien Aktif</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">📅</div>
                <span class="stat-number" data-target="8">0</span>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">🏆</div>
                <span class="stat-number" data-target="15">0</span>
                <div class="stat-label">Sertifikasi</div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="section-header">
            <div class="section-badge">LAYANAN KAMI</div>
            <h2 class="section-title">Solusi Alih Daya Profesional</h2>
            <p class="section-description">
                Menyediakan berbagai layanan outsourcing dengan personel terlatih dan sistem manajemen terintegrasi
            </p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🛡️</div>
                <h3 class="service-title">Security Guard</h3>
                <p class="service-description">
                    Personel security bersertifikat Gada Pratama dengan pelatihan 6 tahap seleksi untuk menjaga keamanan
                    aset dan lingkungan bisnis Anda.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🧹</div>
                <h3 class="service-title">Cleaning Service</h3>
                <p class="service-description">
                    Layanan kebersihan profesional dengan peralatan modern dan metode yang efektif untuk menjaga lingkungan
                    kerja tetap bersih dan nyaman.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🚗</div>
                <h3 class="service-title">Driver Service</h3>
                <p class="service-description">
                    Driver profesional dengan SIM yang valid dan pengalaman mengemudi untuk mendukung mobilitas operasional
                    perusahaan Anda.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🗺️</div>
                <h3 class="service-title">Patrol & Monitoring</h3>
                <p class="service-description">
                    Sistem patroli dengan monitoring digital 24/7 dan laporan real-time untuk pengawasan yang lebih efektif
                    dan terukur.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">📹</div>
                <h3 class="service-title">CCTV & Security System</h3>
                <p class="service-description">
                    Instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi untuk perlindungan maksimal.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">💼</div>
                <h3 class="service-title">Security Consulting</h3>
                <p class="service-description">
                    Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko dan kebutuhan spesifik bisnis Anda.
                </p>
                <a href="#" class="service-link">Selengkapnya →</a>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="clients-section">
        <div class="clients-container">
            <div class="clients-title">Dipercaya Oleh Perusahaan Terkemuka</div>
            <div class="clients-grid">
                <div class="client-logo">CLIENT 1</div>
                <div class="client-logo">CLIENT 2</div>
                <div class="client-logo">CLIENT 3</div>
                <div class="client-logo">CLIENT 4</div>
                <div class="client-logo">CLIENT 5</div>
                <div class="client-logo">CLIENT 6</div>
                <div class="client-logo">CLIENT 7</div>
                <div class="client-logo">CLIENT 8</div>
                <div class="client-logo">CLIENT 9</div>
                <div class="client-logo">CLIENT 10</div>
                <div class="client-logo">CLIENT 11</div>
                <div class="client-logo">CLIENT 12</div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-section">
        <div class="why-container">
            <div class="why-image">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 700'%3E%3Crect fill='%230A1F44' width='600' height='700'/%3E%3Ctext x='50%25' y='50%25' font-size='40' fill='white' text-anchor='middle' dy='.3em' font-family='Arial'%3EProfessional Team%3C/text%3E%3C/svg%3E"
                    alt="Why Choose Us">
                <div class="why-badge">
                    <span class="why-badge-number">8+</span>
                    <span class="why-badge-text">Years of Excellence</span>
                </div>
            </div>
            <div class="why-content">
                <div class="section-badge">MENGAPA KAMI</div>
                <h2>Keunggulan yang Membedakan Kami</h2>
                <p class="why-description">
                    Dengan pengalaman lebih dari 8 tahun, kami berkomitmen memberikan layanan terbaik dengan standar
                    internasional dan personel berkualitas.
                </p>
                <div class="why-features">
                    <div class="why-feature">
                        <div class="why-feature-icon">📜</div>
                        <div class="why-feature-content">
                            <h4>Legalitas Lengkap</h4>
                            <p>Memiliki seluruh izin operasional dari Kepolisian (SIO), sertifikasi ISO 9001, K3, dan
                                Lingkungan serta terdaftar di ABUJAPI.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">🎓</div>
                        <div class="why-feature-content">
                            <h4>Personel Tersertifikasi</h4>
                            <p>Semua personel security memiliki sertifikat Gada Pratama dan telah melalui 6 tahap seleksi
                                ketat dengan pelatihan intensif.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">📱</div>
                        <div class="why-feature-content">
                            <h4>Monitoring 24/7</h4>
                            <p>Sistem monitoring digital dengan aplikasi Turjawali Patrol Online dan MCC untuk transparansi
                                dan laporan real-time.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">⚡</div>
                        <div class="why-feature-content">
                            <h4>Quick Response Team</h4>
                            <p>Tim tanggap darurat yang siap 24/7 untuk menangani situasi emergency dengan cepat dan
                                profesional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dual CTA Section -->
    <section class="dual-cta-section">
        <div class="dual-cta-container">
            <div class="dual-cta-header">
                <h2>Siap Bermitra dengan Kami?</h2>
                <p>Pilih opsi yang sesuai dengan kebutuhan Anda</p>
            </div>
            <div class="dual-cta-boxes">
                <div class="cta-box">
                    <div class="cta-icon">🏢</div>
                    <h3>Untuk Perusahaan</h3>
                    <p>Dapatkan penawaran khusus untuk kebutuhan outsourcing security, cleaning, dan driver perusahaan Anda
                        dengan konsultasi gratis.</p>
                    <a href="{{ route('contact') }}" class="btn btn-accent">
                        📋 Ajukan Penawaran Sekarang
                    </a>
                </div>
                <div class="cta-box">
                    <div class="cta-icon">💼</div>
                    <h3>Untuk Pencari Kerja</h3>
                    <p>Bergabunglah dengan tim profesional kami. Kami membuka kesempatan karir untuk posisi security,
                        cleaning service, dan driver.</p>
                    <a href="{{ route('career') }}" class="btn btn-primary">
                        🔍 Lihat Lowongan Kerja
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[index].classList.add('active');
            dots[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Dot click handlers
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Stats Counter Animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current) + '+';
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target + '+';
                }
            };

            updateCounter();
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Animate stats
                    if (entry.target.classList.contains('stat-number')) {
                        animateCounter(entry.target);
                    }

                    // Fade in animation
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';

                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements
        document.addEventListener('DOMContentLoaded', () => {
            // Observe stat numbers
            document.querySelectorAll('.stat-number').forEach(el => {
                observer.observe(el);
            });

            // Observe other elements for fade in
            document.querySelectorAll('.service-card, .why-feature, .cta-box, .client-logo').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });
        });
    </script>
@endpush