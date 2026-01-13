@extends('layouts.app')

@section('title', 'Blog & Artikel - PT. Bintara Mitra Andalan')
@section('meta_description', 'Baca artikel, tips, dan insight terbaru seputar keamanan, kebersihan, dan manajemen outsourcing dari para ahli kami.')

@push('styles')
    <style>
        /* ========== HERO SECTION ========== */
        .blog-hero {
            position: relative;
            padding: 8rem 2rem 5rem;
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            overflow: hidden;
        }

        .blog-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
        }

        .blog-hero-content {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            text-align: center;
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
        }

        .blog-hero h1 {
            font-size: 4rem;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-highlight {
            color: var(--gold-accent);
        }

        .blog-hero-description {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.7;
        }

        /* ========== SEARCH & FILTER ========== */
        .search-filter-section {
            margin-top: -50px;
            position: relative;
            z-index: 10;
            padding: 0 2rem;
        }

        .search-filter-container {
            max-width: 1400px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 1.5rem;
            align-items: center;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 1.2rem 1.5rem 1.2rem 3.5rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 4px rgba(10, 31, 68, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.3rem;
            color: var(--gray-400);
        }

        .filter-dropdown {
            position: relative;
        }

        .filter-dropdown select {
            padding: 1.2rem 3rem 1.2rem 1.5rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--navy-primary);
            background: var(--white);
            cursor: pointer;
            transition: all 0.3s;
            appearance: none;
        }

        .filter-dropdown select:focus {
            outline: none;
            border-color: var(--navy-primary);
        }

        .filter-dropdown::after {
            content: '▼';
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--navy-primary);
            font-size: 0.8rem;
        }

        .search-btn {
            padding: 1.2rem 2.5rem;
            background: var(--navy-primary);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .search-btn:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10, 31, 68, 0.3);
        }

        /* ========== BLOG SECTION ========== */
        .blog-section {
            padding: 5rem 2rem;
        }

        .blog-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 4rem;
        }

        /* ========== BLOG GRID ========== */
        .blog-grid {
            display: grid;
            gap: 3rem;
        }

        .blog-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s;
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 0;
        }

        .blog-card:hover {
            border-color: var(--navy-primary);
            box-shadow: 0 20px 50px rgba(10, 31, 68, 0.15);
            transform: translateY(-5px);
        }

        .blog-card-image {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        }

        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .blog-card:hover .blog-card-image img {
            transform: scale(1.05);
        }

        .blog-category-badge {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            padding: 0.6rem 1.2rem;
            background: var(--gold-accent);
            color: var(--white);
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .blog-card-content {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
        }

        .blog-meta {
            display: flex;
            gap: 2rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            color: var(--gray-500);
        }

        .blog-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .blog-card-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1rem;
            line-height: 1.3;
            transition: color 0.3s;
        }

        .blog-card:hover .blog-card-title {
            color: var(--gold-accent);
        }

        .blog-card-excerpt {
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 2rem;
            flex: 1;
        }

        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 2px solid var(--gray-100);
        }

        .blog-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .author-info h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.2rem;
        }

        .author-info p {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin: 0;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .read-more:hover {
            color: var(--gold-accent);
            gap: 1rem;
        }

        /* ========== SIDEBAR ========== */
        .blog-sidebar {
            position: sticky;
            top: 2rem;
            height: fit-content;
        }

        .sidebar-section {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .category-list {
            display: grid;
            gap: 0.75rem;
        }

        .category-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            background: var(--gray-50);
            transition: all 0.3s;
            cursor: pointer;
        }

        .category-item:hover {
            background: var(--navy-primary);
            color: var(--white);
            transform: translateX(5px);
        }

        .category-name {
            font-weight: 600;
        }

        .category-count {
            background: var(--white);
            color: var(--navy-primary);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .category-item:hover .category-count {
            background: var(--gold-accent);
            color: var(--white);
        }

        /* Popular Posts */
        .popular-post {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 2px solid var(--gray-100);
            transition: all 0.3s;
            cursor: pointer;
        }

        .popular-post:last-child {
            border-bottom: none;
        }

        .popular-post:hover {
            transform: translateX(5px);
        }

        .popular-post-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            flex-shrink: 0;
        }

        .popular-post-content h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .popular-post-content p {
            font-size: 0.8rem;
            color: var(--gray-500);
            margin: 0;
        }

        /* Tags */
        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .tag-item {
            padding: 0.6rem 1.2rem;
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            color: var(--navy-primary);
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            cursor: pointer;
        }

        .tag-item:hover {
            background: var(--navy-primary);
            border-color: var(--navy-primary);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* ========== PAGINATION ========== */
        .pagination-section {
            margin-top: 4rem;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
        }

        .pagination-btn {
            width: 50px;
            height: 50px;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            background: var(--white);
            color: var(--navy-primary);
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-btn:hover,
        .pagination-btn.active {
            background: var(--navy-primary);
            border-color: var(--navy-primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        .pagination-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagination-btn:disabled:hover {
            transform: none;
            background: var(--white);
            color: var(--navy-primary);
        }

        /* ========== CTA SECTION ========== */
        .newsletter-cta {
            margin-top: 5rem;
            padding: 4rem;
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            border-radius: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .newsletter-cta::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, transparent 70%);
        }

        .newsletter-content {
            position: relative;
            z-index: 1;
        }

        .newsletter-cta h3 {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .newsletter-cta p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 1.2rem 1.5rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: var(--white);
            font-size: 1rem;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: var(--gold-accent);
        }

        .newsletter-form button {
            padding: 1.2rem 2.5rem;
            background: var(--gold-accent);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .newsletter-form button:hover {
            background: #d97706;
            transform: translateY(-2px);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .blog-container {
                grid-template-columns: 1fr;
            }

            .blog-sidebar {
                position: static;
            }

            .blog-card {
                grid-template-columns: 1fr;
            }

            .blog-card-image {
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .blog-hero h1 {
                font-size: 2.5rem;
            }

            .blog-hero-description {
                font-size: 1.1rem;
            }

            .search-filter-container {
                grid-template-columns: 1fr;
            }

            .blog-card-title {
                font-size: 1.4rem;
            }

            .blog-card-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .newsletter-cta h3 {
                font-size: 1.8rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-form button {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Blog Hero -->
    <section class="blog-hero">
        <div class="blog-hero-content">
            <div class="hero-badge">
                <span>📚</span>
                <span>Insight & Knowledge Center</span>
            </div>
            <h1>
                Blog & <span class="hero-highlight">Artikel</span>
            </h1>
            <p class="blog-hero-description">
                Temukan tips, insight, dan informasi terbaru seputar keamanan, kebersihan, dan manajemen outsourcing dari
                para ahli kami
            </p>
        </div>
    </section>

    <!-- Search & Filter -->
    <section class="search-filter-section">
        <div class="search-filter-container">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Cari artikel, tips, atau panduan...">
            </div>
            <div class="filter-dropdown">
                <select>
                    <option value="">Semua Kategori</option>
                    <option value="security">Security</option>
                    <option value="cleaning">Cleaning Service</option>
                    <option value="tips">Tips & Panduan</option>
                    <option value="industry">Industry Insight</option>
                    <option value="technology">Technology</option>
                </select>
            </div>
            <button class="search-btn">Cari</button>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="blog-container">
            <!-- Main Content -->
            <div class="blog-main">
                <div class="blog-grid">
                    <!-- Blog Card 1 -->
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <div class="blog-category-badge">SECURITY</div>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect fill='%230A1F44' width='400' height='300'/%3E%3Ctext x='50%25' y='50%25' font-size='60' fill='white' text-anchor='middle' dy='.3em'%3E🛡️%3C/text%3E%3C/svg%3E"
                                alt="Blog Image">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <span>📅</span>
                                    <span>8 Jan 2026</span>
                                </div>
                                <div class="blog-meta-item">
                                    <span>⏱️</span>
                                    <span>5 menit baca</span>
                                </div>
                            </div>
                            <h2 class="blog-card-title">
                                Pentingnya Sertifikasi Gada Pratama untuk Security Guard Profesional
                            </h2>
                            <p class="blog-card-excerpt">
                                Memahami standar kompetensi dan pentingnya sertifikasi resmi dari Polri untuk personel
                                security. Pelajari tahapan pelatihan dan manfaat memiliki personel tersertifikasi untuk
                                keamanan bisnis Anda.
                            </p>
                            <div class="blog-card-footer">
                                <div class="blog-author">
                                    <div class="author-avatar">AH</div>
                                    <div class="author-info">
                                        <h4>Ahmad Hidayat</h4>
                                        <p>Security Expert</p>
                                    </div>
                                </div>
                                <a href="#" class="read-more">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Card 2 -->
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <div class="blog-category-badge">TIPS & PANDUAN</div>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect fill='%231E3A5F' width='400' height='300'/%3E%3Ctext x='50%25' y='50%25' font-size='60' fill='white' text-anchor='middle' dy='.3em'%3E📋%3C/text%3E%3C/svg%3E"
                                alt="Blog Image">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <span>📅</span>
                                    <span>7 Jan 2026</span>
                                </div>
                                <div class="blog-meta-item">
                                    <span>⏱️</span>
                                    <span>7 menit baca</span>
                                </div>
                            </div>
                            <h2 class="blog-card-title">
                                10 Checklist Memilih Vendor Outsourcing Security Terpercaya
                            </h2>
                            <p class="blog-card-excerpt">
                                Panduan lengkap untuk perusahaan dalam memilih vendor outsourcing security yang tepat.
                                Pelajari kriteria penting, legalitas, dan standar yang harus dipenuhi untuk memastikan
                                keamanan optimal.
                            </p>
                            <div class="blog-card-footer">
                                <div class="blog-author">
                                    <div class="author-avatar">SR</div>
                                    <div class="author-info">
                                        <h4>Siti Rahmawati</h4>
                                        <p>Business Consultant</p>
                                    </div>
                                </div>
                                <a href="#" class="read-more">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Card 3 -->
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <div class="blog-category-badge">CLEANING</div>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect fill='%23152238' width='400' height='300'/%3E%3Ctext x='50%25' y='50%25' font-size='60' fill='white' text-anchor='middle' dy='.3em'%3E🧹%3C/text%3E%3C/svg%3E"
                                alt="Blog Image">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <span>📅</span>
                                    <span>6 Jan 2026</span>
                                </div>
                                <div class="blog-meta-item">
                                    <span>⏱️</span>
                                    <span>6 menit baca</span>
                                </div>
                            </div>
                            <h2 class="blog-card-title">
                                Standar Kebersihan Kantor Pasca Pandemi: Protokol Baru yang Wajib Diterapkan
                            </h2>
                            <p class="blog-card-excerpt">
                                Bagaimana standar kebersihan berevolusi pasca pandemi? Simak protokol cleaning service
                                modern dengan teknologi disinfeksi dan prosedur sanitasi yang lebih ketat untuk lingkungan
                                kerja yang sehat.
                            </p>
                            <div class="blog-card-footer">
                                <div class="blog-author">
                                    <div class="author-avatar">BP</div>
                                    <div class="author-info">
                                        <h4>Budi Prasetyo</h4>
                                        <p>Cleaning Supervisor</p>
                                    </div>
                                </div>
                                <a href="#" class="read-more">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Card 4 -->
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <div class="blog-category-badge">TECHNOLOGY</div>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect fill='%230A1F44' width='400' height='300'/%3E%3Ctext x='50%25' y='50%25' font-size='60' fill='white' text-anchor='middle' dy='.3em'%3E📱%3C/text%3E%3C/svg%3E"
                                alt="Blog Image">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <span>📅</span>
                                    <span>5 Jan 2026</span>
                                </div>
                                <div class="blog-meta-item">
                                    <span>⏱️</span>
                                    <span>8 menit baca</span>
                                </div>
                            </div>
                            <h2 class="blog-card-title">
                                Transformasi Digital: Monitoring Security 24/7 dengan Turjawali Patrol Online
                            </h2>
                            <p class="blog-card-excerpt">
                                Teknologi mengubah cara kerja security tradisional. Pelajari bagaimana sistem monitoring
                                digital real-time meningkatkan efektivitas, transparansi, dan akuntabilitas layanan
                                security modern.
                            </p>
                            <div class="blog-card-footer">
                                <div class="blog-author">
                                    <div class="author-avatar">DP</div>
                                    <div class="author-info">
                                        <h4>Deni Pratama</h4>
                                        <p>Technology Lead</p>
                                    </div>
                                </div>
                                <a href="#" class="read-more">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Card 5 -->
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <div class="blog-category-badge">INDUSTRY INSIGHT</div>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect fill='%231E3A5F' width='400' height='300'/%3E%3Ctext x='50%25' y='50%25' font-size='60' fill='white' text-anchor='middle' dy='.3em'%3E📊%3C/text%3E%3C/svg%3E"
                                alt="Blog Image">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <span>📅</span>
                                    <span>4 Jan 2026</span>
                                </div>
                                <div class="blog-meta-item">
                                    <span>⏱️</span>
                                    <span>10 menit baca</span>
                                </div>
                            </div>
                            <h2 class="blog-card-title">
                                Tren Industri Outsourcing 2026: Apa yang Berubah dan Bagaimana Adaptasinya?
                            </h2>
                            <p class="blog-card-excerpt">
                                Analisis mendalam tentang perubahan landscape industri outsourcing di Indonesia. Dari
                                regulasi baru hingga ekspektasi klien yang meningkat, pahami tren dan strategi adaptasi yang
                                efektif.
                            </p>
                            <div class="blog-card-footer">
                                <div class="blog-author">
                                    <div class="author-avatar">RW</div>
                                    <div class="author-info">
                                        <h4>Rina Wulandari</h4>
                                        <p>Industry Analyst</p>
                                    </div>
                                </div>
                                <a href="#" class="read-more">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="pagination-section">
                    <button class="pagination-btn" disabled>←</button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">4</button>
                    <button class="pagination-btn">→</button>
                </div>

                <!-- Newsletter CTA -->
                <div class="newsletter-cta">
                    <div class="newsletter-content">
                        <h3>📧 Subscribe Newsletter Kami</h3>
                        <p>Dapatkan artikel terbaru, tips, dan insight langsung ke email Anda setiap minggu</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Masukkan email Anda..." required>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- Categories -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">
                        <span>📁</span>
                        Kategori
                    </h3>
                    <div class="category-list">
                        <div class="category-item">
                            <span class="category-name">Security</span>
                            <span class="category-count">24</span>
                        </div>
                        <div class="category-item">
                            <span class="category-name">Cleaning Service</span>
                            <span class="category-count">18</span>
                        </div>
                        <div class="category-item">
                            <span class="category-name">Tips & Panduan</span>
                            <span class="category-count">32</span>
                        </div>
                        <div class="category-item">
                            <span class="category-name">Industry Insight</span>
                            <span class="category-count">15</span>
                        </div>
                        <div class="category-item">
                            <span class="category-name">Technology</span>
                            <span class="category-count">12</span>
                        </div>
                        <div class="category-item">
                            <span class="category-name">Case Study</span>
                            <span class="category-count">9</span>
                        </div>
                    </div>
                </div>

                <!-- Popular Posts -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">
                        <span>🔥</span>
                        Artikel Populer
                    </h3>
                    <div>
                        <div class="popular-post">
                            <div class="popular-post-image"></div>
                            <div class="popular-post-content">
                                <h4>5 Kesalahan Umum dalam Memilih Security Service</h4>
                                <p>📅 2 Jan 2026</p>
                            </div>
                        </div>
                        <div class="popular-post">
                            <div class="popular-post-image"></div>
                            <div class="popular-post-content">
                                <h4>Cara Efektif Mengelola Tim Cleaning Service</h4>
                                <p>📅 30 Des 2025</p>
                            </div>
                        </div>
                        <div class="popular-post">
                            <div class="popular-post-image"></div>
                            <div class="popular-post-content">
                                <h4>Pentingnya SOP dalam Operasional Security</h4>
                                <p>📅 28 Des 2025</p>
                            </div>
                        </div>
                        <div class="popular-post">
                            <div class="popular-post-image"></div>
                            <div class="popular-post-content">
                                <h4>ROI Investasi Security: Menghitung Nilai Keamanan</h4>
                                <p>📅 25 Des 2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">
                        <span>🏷️</span>
                        Tags Populer
                    </h3>
                    <div class="tags-list">
                        <span class="tag-item">Security</span>
                        <span class="tag-item">Gada Pratama</span>
                        <span class="tag-item">Cleaning</span>
                        <span class="tag-item">Outsourcing</span>
                        <span class="tag-item">K3</span>
                        <span class="tag-item">SOP</span>
                        <span class="tag-item">ISO</span>
                        <span class="tag-item">Monitoring</span>
                        <span class="tag-item">CCTV</span>
                        <span class="tag-item">Patrol</span>
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', () => {
            // Fade in animation for blog cards
            const observerOptions = {
                threshold: 0.1,
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

            // Observe blog cards
            document.querySelectorAll('.blog-card').forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = `all 0.6s ease ${index * 0.1}s`;
                observer.observe(el);
            });

            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            const searchBtn = document.querySelector('.search-btn');

            searchBtn.addEventListener('click', () => {
                const searchTerm = searchInput.value.trim();
                if (searchTerm) {
                    console.log('Searching for:', searchTerm);
                    // Add your search logic here
                }
            });

            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    searchBtn.click();
                }
            });

            // Category filter
            document.querySelectorAll('.category-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.category-item').forEach(i => {
                        i.style.background = '';
                        i.style.color = '';
                    });
                    this.style.background = 'var(--navy-primary)';
                    this.style.color = 'var(--white)';
                    console.log('Category selected:', this.querySelector('.category-name').textContent);
                });
            });

            // Tag filter
            document.querySelectorAll('.tag-item').forEach(tag => {
                tag.addEventListener('click', function() {
                    console.log('Tag selected:', this.textContent);
                });
            });

            // Pagination
            document.querySelectorAll('.pagination-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (!this.disabled) {
                        document.querySelectorAll('.pagination-btn').forEach(b => {
                            b.classList.remove('active');
                        });
                        if (!this.textContent.match(/[←→]/)) {
                            this.classList.add('active');
                        }
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Newsletter form
            const newsletterForm = document.querySelector('.newsletter-form');
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const email = newsletterForm.querySelector('input[type="email"]').value;
                alert('Terima kasih! Email ' + email + ' berhasil didaftarkan untuk newsletter.');
                newsletterForm.reset();
            });

            // Read more button animation
            document.querySelectorAll('.read-more').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log('Reading article...');
                });
            });
        });
    </script>
@endpush
