@extends('layouts.app')

@section('title', 'Tentang Kami - PT. Bintara Mitra Andalan')
@section('meta_description', 'Mengenal lebih dekat PT. Bintara Mitra Andalan, perusahaan penyedia jasa outsourcing profesional dengan legalitas lengkap dan sertifikasi internasional.')

@push('styles')
    <style>
        /* ========== PAGE HEADER ========== */
        .page-header {
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            padding: 8rem 2rem 5rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,101.3C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: bottom;
        }

        .page-header-content {
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
            margin-bottom: 1.5rem;
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

        .page-title {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .page-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========== INTRO SECTION ========== */
        .intro-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .intro-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }

        .intro-image {
            position: relative;
        }

        .intro-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .intro-content h2 {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .intro-content p {
            font-size: 1.1rem;
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .intro-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2.5rem;
        }

        .intro-stat {
            text-align: center;
            padding: 1.5rem;
            background: var(--gray-50);
            border-radius: 12px;
            border: 2px solid var(--gray-200);
            transition: all 0.3s;
        }

        .intro-stat:hover {
            border-color: var(--navy-primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .intro-stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--navy-primary);
            display: block;
            margin-bottom: 0.5rem;
        }

        .intro-stat-label {
            color: var(--gray-600);
            font-weight: 600;
            font-size: 0.9rem;
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

        /* ========== VISION MISSION ========== */
        .vision-mission-section {
            padding: 6rem 2rem;
            background: var(--gray-50);
        }

        .vision-mission-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
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

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .vm-card {
            background: var(--white);
            padding: 3rem;
            border-radius: 20px;
            border: 2px solid var(--gray-200);
            position: relative;
            overflow: hidden;
            transition: all 0.4s;
        }

        .vm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--navy-primary), var(--gold-accent));
        }

        .vm-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border-color: var(--navy-primary);
        }

        .vm-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            transition: all 0.3s;
        }

        .vm-card:hover .vm-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .vm-card h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1.5rem;
        }

        .vm-card p {
            font-size: 1.1rem;
            color: var(--gray-600);
            line-height: 1.8;
        }

        /* ========== HISTORY TIMELINE ========== */
        .history-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .history-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline {
            position: relative;
            padding: 3rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--gray-200);
            transform: translateX(-50%);
        }

        .timeline-item {
            display: grid;
            grid-template-columns: 1fr 80px 1fr;
            gap: 2rem;
            margin-bottom: 4rem;
            align-items: center;
        }

        .timeline-content {
            background: var(--white);
            padding: 2rem;
            border-radius: 16px;
            border: 2px solid var(--gray-200);
            transition: all 0.3s;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            text-align: right;
        }

        .timeline-item:nth-child(even) .timeline-content {
            grid-column: 3;
        }

        .timeline-content:hover {
            border-color: var(--navy-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        .timeline-year {
            width: 80px;
            height: 80px;
            background: var(--navy-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 900;
            color: var(--white);
            box-shadow: 0 0 0 8px var(--white), 0 0 0 12px var(--gray-200);
            position: relative;
            z-index: 2;
            grid-column: 2;
            transition: all 0.3s;
        }

        .timeline-item:hover .timeline-year {
            background: var(--gold-accent);
            transform: scale(1.1);
        }

        .timeline-content h4 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.75rem;
        }

        .timeline-content p {
            color: var(--gray-600);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* ========== ORG STRUCTURE ========== */
        .org-section {
            padding: 6rem 2rem;
            background: var(--gray-50);
        }

        .org-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .org-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .team-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border: 2px solid var(--gray-100);
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--navy-primary);
        }

        .team-photo {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .team-photo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(245, 158, 11, 0.2), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .team-card:hover .team-photo::before {
            opacity: 1;
        }

        .team-info {
            padding: 2rem;
            text-align: center;
        }

        .team-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .team-position {
            color: var(--gray-600);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .team-social {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
        }

        .team-social a {
            width: 36px;
            height: 36px;
            background: var(--gray-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .team-social a:hover {
            background: var(--navy-primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* ========== CERTIFICATIONS ========== */
        .cert-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .cert-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .cert-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .cert-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .cert-card:hover {
            border-color: var(--navy-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .cert-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--gray-50), var(--gray-100));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            transition: all 0.3s;
        }

        .cert-card:hover .cert-icon {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            transform: scale(1.1);
        }

        .cert-card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .cert-card p {
            font-size: 0.85rem;
            color: var(--gray-600);
        }

        /* ========== VALUES SECTION ========== */
        .values-section {
            padding: 6rem 2rem;
            background: var(--navy-primary);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .values-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
        }

        .values-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .values-section .section-badge {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .values-section .section-title {
            color: var(--white);
        }

        .values-section .section-description {
            color: rgba(255, 255, 255, 0.9);
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s;
        }

        .value-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-8px);
            border-color: var(--gold-accent);
        }

        .value-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .value-card h4 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .value-card p {
            opacity: 0.9;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .intro-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .intro-image {
                order: 2;
            }

            .intro-content {
                order: 1;
            }

            .vm-grid {
                grid-template-columns: 1fr;
            }

            .org-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .cert-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .values-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .timeline::before {
                left: 40px;
            }

            .timeline-item {
                grid-template-columns: 80px 1fr;
                gap: 2rem;
            }

            .timeline-year {
                grid-column: 1;
            }

            .timeline-content {
                grid-column: 2 !important;
                text-align: left !important;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .page-subtitle {
                font-size: 1.1rem;
            }

            .intro-stats {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2rem;
            }

            .org-grid {
                grid-template-columns: 1fr;
            }

            .cert-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item {
                grid-template-columns: 60px 1fr;
            }

            .timeline-year {
                width: 60px;
                height: 60px;
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Tentang Kami</span>
            </div>
            <h1 class="page-title">Tentang Kami</h1>
            <p class="page-subtitle">
                Mengenal lebih dekat PT. Bintara Mitra Andalan, mitra terpercaya untuk solusi outsourcing profesional Anda
            </p>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="intro-section">
        <div class="intro-container">
            <div class="intro-content">
                <div class="section-badge">PROFIL PERUSAHAAN</div>
                <h2>PT. Bintara Mitra Andalan</h2>
                <p>
                    PT. Bintara Mitra Andalan adalah perusahaan penyedia jasa outsourcing profesional yang telah
                    berpengalaman lebih dari 10 tahun dalam industri alih daya tenaga kerja. Kami berkomitmen untuk
                    memberikan layanan terbaik dengan standar internasional.
                </p>
                <p>
                    Dengan legalitas lengkap dan sertifikasi ISO, kami menyediakan personel terlatih untuk berbagai
                    kebutuhan bisnis Anda, mulai dari security guard, cleaning service, hingga driver service dengan sistem
                    monitoring terintegrasi.
                </p>
                <p>
                    Kepercayaan klien adalah prioritas utama kami. Setiap personel yang kami tugaskan telah melalui proses
                    seleksi ketat dan pelatihan intensif untuk memastikan kualitas layanan yang optimal.
                </p>
                <div class="intro-stats">
                    <div class="intro-stat">
                        <span class="intro-stat-number">2015</span>
                        <span class="intro-stat-label">Tahun Berdiri</span>
                    </div>
                    <div class="intro-stat">
                        <span class="intro-stat-number">500+</span>
                        <span class="intro-stat-label">Personel Aktif</span>
                    </div>
                </div>
            </div>
            <div class="intro-image">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 700'%3E%3Crect fill='%230A1F44' width='600' height='700'/%3E%3Ctext x='50%25' y='50%25' font-size='40' fill='white' text-anchor='middle' dy='.3em' font-family='Arial'%3EOffice Building%3C/text%3E%3C/svg%3E"
                    alt="PT. Bintara Mitra Andalan">
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="vision-mission-section">
        <div class="vision-mission-container">
            <div class="section-header">
                <div class="section-badge">VISI & MISI</div>
                <h2 class="section-title">Komitmen Kami</h2>
                <p class="section-description">
                    Tujuan jangka panjang dan nilai-nilai yang mendasari setiap layanan kami
                </p>
            </div>
            <div class="vm-grid">
                <div class="vm-card">
                    <div class="vm-icon">🎯</div>
                    <h3>Visi</h3>
                    <p>
                        Menjadi perusahaan penyedia jasa outsourcing terkemuka di Indonesia yang dikenal dengan
                        profesionalisme, integritas, dan kualitas layanan yang unggul, serta memberikan kontribusi positif
                        bagi perkembangan industri keamanan dan layanan pendukung bisnis nasional.
                    </p>
                </div>
                <div class="vm-card">
                    <div class="vm-icon">🚀</div>
                    <h3>Misi</h3>
                    <p>
                        Menyediakan solusi outsourcing berkualitas tinggi dengan personel terlatih dan tersertifikasi.
                        Menerapkan sistem manajemen modern dan teknologi monitoring digital untuk transparansi dan
                        efisiensi. Membangun kemitraan jangka panjang yang saling menguntungkan dengan klien dan memberikan
                        kesempatan karir yang baik bagi personel.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company History -->
    <section class="history-section">
        <div class="history-container">
            <div class="section-header">
                <div class="section-badge">PERJALANAN KAMI</div>
                <h2 class="section-title">Sejarah Perusahaan</h2>
                <p class="section-description">
                    Milestone penting dalam perjalanan PT. Bintara Mitra Andalan
                </p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Pendirian Perusahaan</h4>
                        <p>PT. Bintara Mitra Andalan resmi didirikan dan mendapatkan legalitas lengkap dari pemerintah untuk
                            beroperasi sebagai penyedia jasa outsourcing.</p>
                    </div>
                    <div class="timeline-year">2015</div>
                    <div></div>
                </div>

                <div class="timeline-item">
                    <div></div>
                    <div class="timeline-year">2017</div>
                    <div class="timeline-content">
                        <h4>Sertifikasi ISO Pertama</h4>
                        <p>Mendapatkan sertifikasi ISO 9001 untuk Sistem Manajemen Mutu, menandai komitmen kami terhadap
                            standar internasional.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Ekspansi Regional</h4>
                        <p>Membuka kantor cabang di Jawa Tengah dan Jawa Timur serta mendapatkan SIO (Surat Izin
                            Operasional) multi-regional dari Kepolisian.</p>
                    </div>
                    <div class="timeline-year">2019</div>
                    <div></div>
                </div>

                <div class="timeline-item">
                    <div></div>
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <h4>Digitalisasi Monitoring</h4>
                        <p>Implementasi sistem monitoring digital dengan aplikasi Turjawali Patrol Online untuk transparansi
                            dan efisiensi operasional.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Pencapaian 200+ Klien</h4>
                        <p>Mencapai milestone 200+ klien aktif di berbagai industri dan mendapatkan sertifikasi tambahan
                            untuk K3 dan Manajemen Lingkungan.</p>
                    </div>
                    <div class="timeline-year">2023</div>
                    <div></div>
                </div>

                <div class="timeline-item">
                    <div></div>
                    <div class="timeline-year">2025</div>
                    <div class="timeline-content">
                        <h4>Inovasi & Pertumbuhan</h4>
                        <p>Terus berinovasi dengan teknologi terkini dan memperluas layanan untuk memenuhi kebutuhan bisnis
                            yang semakin kompleks.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organization Structure -->
    <section class="org-section">
        <div class="org-container">
            <div class="section-header">
                <div class="section-badge">TIM KAMI</div>
                <h2 class="section-title">Struktur Organisasi</h2>
                <p class="section-description">
                    Tim manajemen berpengalaman yang memimpin perusahaan
                </p>
            </div>
            <div class="org-grid">
                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Direktur</h4>
                        <p class="team-position">Direktur Utama</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Manager</h4>
                        <p class="team-position">General Manager</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Manager</h4>
                        <p class="team-position">General Manager</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Manager</h4>
                        <p class="team-position">General Manager</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Manager</h4>
                        <p class="team-position">General Manager</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-photo">👤</div>
                    <div class="team-info">
                        <h4 class="team-name">Nama Manager</h4>
                        <p class="team-position">General Manager</p>
                        <div class="team-social">
                            <a href="#" title="LinkedIn">in</a>
                            <a href="#" title="Email">✉</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection