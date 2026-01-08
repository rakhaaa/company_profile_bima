@extends('layouts.app')

@section('title', 'Security Guard Service - PT. Bintara Mitra Andalan')
@section('meta_description', 'Layanan Security Guard profesional dengan personel tersertifikasi Gada Pratama, monitoring 24/7, dan sistem manajemen terintegrasi.')

@push('styles')
<style>
    /* ========== SERVICE HEADER ========== */
    .service-header {
        background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
        padding: 8rem 2rem 5rem;
        position: relative;
        overflow: hidden;
    }

    .service-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%);
    }

    .service-header-content {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        color: var(--white);
    }

    .breadcrumb {
        display: flex;
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

    .service-title-content h1 {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .service-title-content p {
        font-size: 1.3rem;
        opacity: 0.95;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .service-cta-buttons {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .service-hero-image {
        position: relative;
    }

    .service-hero-placeholder {
        width: 100%;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8rem;
    }

    .btn {
        padding: 1rem 2.5rem;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.05rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
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

    /* ========== SERVICE OVERVIEW ========== */
    .service-overview {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .overview-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 4rem;
    }

    .overview-content {
        background: var(--white);
    }

    .content-section {
        margin-bottom: 4rem;
    }

    .content-section h2 {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .content-section h2::before {
        content: '';
        width: 6px;
        height: 40px;
        background: var(--gold-accent);
        border-radius: 3px;
    }

    .content-section p {
        font-size: 1.1rem;
        color: var(--gray-600);
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .feature-item {
        display: flex;
        gap: 1rem;
        align-items: start;
        padding: 1.5rem;
        background: var(--gray-50);
        border-radius: 16px;
        border: 2px solid var(--gray-100);
        transition: all 0.3s;
    }

    .feature-item:hover {
        border-color: var(--navy-primary);
        background: var(--white);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--white);
        flex-shrink: 0;
    }

    .feature-info h4 {
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .feature-info p {
        font-size: 0.95rem;
        margin: 0;
        color: var(--gray-600);
    }

    /* ========== METHODOLOGY PROCESS ========== */
    .methodology-steps {
        display: grid;
        gap: 2rem;
        margin-top: 2rem;
    }

    .method-step {
        display: flex;
        gap: 2rem;
        align-items: start;
        padding: 2rem;
        background: var(--gray-50);
        border-radius: 16px;
        border: 2px solid var(--gray-100);
        transition: all 0.3s;
    }

    .method-step:hover {
        background: var(--white);
        border-color: var(--navy-primary);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .method-number {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 900;
        flex-shrink: 0;
        box-shadow: 0 5px 20px rgba(10, 31, 68, 0.3);
    }

    .method-content h4 {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 0.75rem;
    }

    .method-content p {
        margin: 0;
    }

    /* ========== SIDEBAR ========== */
    .overview-sidebar {
        position: sticky;
        top: 120px;
        align-self: start;
    }

    .sidebar-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
    }

    .sidebar-card h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
    }

    .price-highlight {
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        padding: 2rem;
        border-radius: 16px;
        text-align: center;
        margin-bottom: 2rem;
        color: var(--white);
    }

    .price-label {
        font-size: 0.95rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .price-amount {
        font-size: 2.5rem;
        font-weight: 900;
        display: block;
        margin-bottom: 0.5rem;
    }

    .price-note {
        font-size: 0.85rem;
        opacity: 0.8;
    }

    .quick-contact {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .contact-btn {
        width: 100%;
        padding: 1.25rem;
        background: var(--gold-accent);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.05rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .contact-btn:hover {
        background: var(--orange-accent);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
    }

    .contact-btn.secondary {
        background: var(--navy-primary);
    }

    .contact-btn.secondary:hover {
        background: var(--navy-secondary);
    }

    .sidebar-info {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 1.25rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: var(--gray-50);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .info-content h5 {
        font-size: 0.9rem;
        color: var(--gray-600);
        margin-bottom: 0.25rem;
        font-weight: 600;
    }

    .info-content p {
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy-primary);
        margin: 0;
    }

    /* ========== PRICING PACKAGES ========== */
    .pricing-section {
        padding: 6rem 2rem;
        background: var(--gray-50);
    }

    .pricing-container {
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

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    .pricing-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 24px;
        padding: 3rem;
        transition: all 0.4s;
        position: relative;
    }

    .pricing-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0,0,0,0.15);
        border-color: var(--navy-primary);
    }

    .pricing-card.featured {
        border-color: var(--gold-accent);
        border-width: 3px;
        transform: scale(1.05);
    }

    .pricing-card.featured::before {
        content: 'MOST POPULAR';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--gold-accent);
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 800;
    }

    .pricing-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid var(--gray-100);
    }

    .pricing-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
    }

    .pricing-card.featured .pricing-icon {
        background: linear-gradient(135deg, var(--gold-accent), var(--orange-accent));
    }

    .pricing-name {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 0.5rem;
    }

    .pricing-desc {
        color: var(--gray-600);
        font-size: 0.95rem;
    }

    .pricing-price {
        text-align: center;
        margin-bottom: 2rem;
    }

    .price-value {
        font-size: 3rem;
        font-weight: 900;
        color: var(--navy-primary);
        display: block;
    }

    .price-period {
        color: var(--gray-600);
        font-size: 0.95rem;
    }

    .pricing-features {
        list-style: none;
        margin-bottom: 2.5rem;
    }

    .pricing-features li {
        padding: 0.75rem 0;
        color: var(--gray-700);
        display: flex;
        align-items: start;
        gap: 0.75rem;
        font-size: 0.95rem;
    }

    .pricing-features li::before {
        content: '✓';
        color: var(--gold-accent);
        font-weight: 900;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .pricing-button {
        width: 100%;
        padding: 1.25rem;
        background: var(--navy-primary);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.05rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .pricing-card.featured .pricing-button {
        background: var(--gold-accent);
    }

    .pricing-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* ========== CASE STUDY ========== */
    .case-study-section {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .case-study-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .case-study-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 24px;
        padding: 3rem;
        margin-top: 3rem;
    }

    .case-study-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 3rem;
        margin-top: 2rem;
    }

    .case-item h4 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1rem;
    }

    .case-item p {
        color: var(--gray-600);
        line-height: 1.7;
    }

    .case-item.challenge::before {
        content: '🎯';
        font-size: 2rem;
        display: block;
        margin-bottom: 1rem;
    }

    .case-item.solution::before {
        content: '💡';
        font-size: 2rem;
        display: block;
        margin-bottom: 1rem;
    }

    .case-item.result::before {
        content: '📈';
        font-size: 2rem;
        display: block;
        margin-bottom: 1rem;
    }

    /* ========== FAQ ========== */
    .faq-section {
        padding: 6rem 2rem;
        background: var(--gray-50);
    }

    .faq-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .faq-accordion {
        display: grid;
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .faq-item {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s;
    }

    .faq-item.active {
        border-color: var(--navy-primary);
    }

    .faq-question {
        padding: 1.75rem 2rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 700;
        color: var(--navy-primary);
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .faq-question:hover {
        background: var(--gray-50);
    }

    .faq-icon {
        width: 32px;
        height: 32px;
        background: var(--gray-100);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s;
    }

    .faq-item.active .faq-icon {
        background: var(--navy-primary);
        color: var(--white);
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-answer-content {
        padding: 0 2rem 1.75rem 2rem;
        color: var(--gray-600);
        line-height: 1.8;
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

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
        .service-header-content {
            grid-template-columns: 1fr;
        }

        .overview-container {
            grid-template-columns: 1fr;
        }

        .overview-sidebar {
            position: static;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .pricing-grid {
            grid-template-columns: 1fr;
        }

        .pricing-card.featured {
            transform: scale(1);
        }

        .case-study-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .service-title-content h1 {
            font-size: 2.5rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .content-section h2 {
            font-size: 2rem;
        }

        .method-step {
            flex-direction: column;
            text-align: center;
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
</style>
@endpush

@section('content')
<!-- Service Header -->
<section class="service-header">
    <div class="service-header-content">
        <div class="service-title-content">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('services') }}">Layanan</a>
                <span>/</span>
                <span>Security Guard</span>
            </div>
            <h1>Security Guard Service</h1>
            <p>
                Personel security profesional tersertifikasi Gada Pratama dengan sistem monitoring 24/7 untuk menjaga keamanan aset dan lingkungan bisnis Anda.
            </p>
            <div class="service-cta-buttons">
                <a href="#pricing" class="btn btn-accent">
                    💰 Lihat Paket Harga
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-white">
                    📞 Konsultasi Gratis
                </a>
            </div>
        </div>
        <div class="service-hero-image">
            <div class="service-hero-placeholder">🛡️</div>
        </div>
    </div>
</section>

<!-- Service Overview -->
<section class="service-overview">
    <div class="overview-container">
        <!-- Main Content -->
        <div class="overview-content">
            <!-- Description -->
            <div class="content-section">
                <h2>Tentang Layanan Ini</h2>
                <p>
                    Layanan Security Guard dari PT. Bintara Mitra Andalan menyediakan personel keamanan profesional yang telah tersertifikasi Gada Pratama untuk menjaga keamanan dan ketertiban di lingkungan bisnis Anda. Setiap personel telah melalui 6 tahap seleksi ketat dan pelatihan intensif.
                </p>
                <p>
                    Dengan sistem monitoring digital 24/7 menggunakan aplikasi Turjawali Patrol Online, kami memastikan setiap aktivitas security terdokumentasi dengan baik dan dapat dipantau secara real-time. Laporan digital otomatis memberikan transparansi penuh kepada klien.
                </p>
                <p>
                    Kami melayani berbagai industri mulai dari perkantoran, retail, manufaktur, hingga perumahan dengan penempatan personel yang disesuaikan dengan kebutuhan dan karakteristik masing-masing lokasi.
                </p>
            </div>

            <!-- Key Features -->
            <div class="content-section">
                <h2>Keunggulan Layanan</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">🎓</div>
                        <div class="feature-info">
                            <h4>Sertifikasi Gada Pratama</h4>
                            <p>Semua personel memiliki sertifikat resmi dari Kepolisian RI</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📱</div>
                        <div class="feature-info">
                            <h4>Monitoring 24/7</h4>
                            <p>Sistem patrol online dengan GPS tracking dan laporan digital</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">⚡</div>
                        <div class="feature-info">
                            <h4>Quick Response Team</h4>
                            <p>Tim tanggap darurat siap dalam situasi emergency</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">👔</div>
                        <div class="feature-info">
                            <h4>Seragam & Perlengkapan</h4>
                            <p>Seragam profesional dan peralatan keamanan lengkap</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <div class="feature-info">
                            <h4>Laporan Berkala</h4>
                            <p>Laporan harian, mingguan, dan bulanan secara detail</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">🛡️</div>
                        <div class="feature-info">
                            <h4>Fully Insured</h4>
                            <p>Semua personel dilindungi asuransi BPJS dan kecelakaan kerja</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Methodology -->
            <div class="content-section">
                <h2>Proses Pengelolaan</h2>
                <div class="methodology-steps">
                    <div class="method-step">
                        <div class="method-number">1</div>
                        <div class="method-content">
                            <h4>Seleksi & Rekrutmen</h4>
                            <p>Proses seleksi ketat 6 tahap termasuk tes fisik, kesehatan, psikotes, dan wawancara untuk memastikan hanya kandidat terbaik yang lolos.</p>
                        </div>
                    </div>

                    <div class="method-step">
                        <div class="method-number">2</div>
                        <div class="method-content">
                            <h4>Pelatihan Intensif</h4>
                            <p>Pelatihan PBB, bela diri, komunikasi, product knowledge klien, dan SOP keamanan sebelum penempatan.</p>
                        </div>
                    </div>

                    <div class="method-step">
                        <div class="method-number">3</div>
                        <div class="method-content">
                            <h4>Penempatan & Briefing</h4>
                            <p>Penempatan sesuai kebutuhan dengan pembekalan lengkap mengenai tugas, tanggung jawab, dan SOP lokasi.</p>
                        </div>
                    </div>

                    <div class="method-step">
                        <div class="method-number">4</div>
                        <div class="method-content">
                            <h4>Monitoring & Evaluasi</h4>
                            <p>Pengawasan rutin oleh supervisor dengan sistem patrol online, evaluasi kinerja berkala, dan pembinaan berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="overview-sidebar">
            <div class="sidebar-card">
                <div class="price-highlight">
                    <div class="price-label">Mulai dari</div>
                    <span class="price-amount">Rp 3.5 Jt</span>
                    <div class="price-note">per personel/bulan</div>
                </div>
                
                <div class="quick-contact">
                    <a href="{{ route('contact') }}" class="contact-btn">
                        📋 Ajukan Penawaran
                    </a>
                    <a href="https://wa.me/62xxx" class="contact-btn secondary" target="_blank">
                        💬 Chat WhatsApp
                    </a>
                </div>
            </div>

            <div class="sidebar-card">
                <h3>Informasi Layanan</h3>
                <div class="sidebar-info">
                    <div class="info-item">
                        <div class="info-icon">⏰</div>
                        <div class="info-content">
                            <h5>Jam Operasional</h5>
                            <p>24/7 Available</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h5>Cakupan Area</h5>
                            <p>Nasional</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">👥</div>
                        <div class="info-content">
                            <h5>Personel Tersedia</h5>
                            <p>500+ Security</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">⚡</div>
                        <div class="info-content">
                            <h5>Response Time</h5>
                            <p>< 5 menit</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📜</div>
                        <div class="info-content">
                            <h5>Kontrak Minimum</h5>
                            <p>1 Tahun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Packages -->
<section class="pricing-section" id="pricing">
    <div class="pricing-container">
        <div class="section-header">
            <div class="section-badge">PAKET HARGA</div>
            <h2 class="section-title">Pilih Paket yang Sesuai</h2>
            <p class="section-description">
                Berbagai pilihan paket dengan fitur dan benefit yang dapat disesuaikan
            </p>
        </div>

        <div class="pricing-grid">
            <!-- Basic Package -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-icon">🛡️</div>
                    <h3 class="pricing-name">Basic</h3>
                    <p class="pricing-desc">Untuk usaha kecil dan menengah</p>
                </div>
                <div class="pricing-price">
                    <span class="price-value">Rp 3.5 Jt</span>
                    <span class="price-period">/personel/bulan</span>
                </div>
                <ul class="pricing-features">
                    <li>1 Personel Security 8 jam/hari</li>
                    <li>Sertifikat Gada Pratama</li>
                    <li>Seragam & perlengkapan</li>
                    <li>BPJS Kesehatan & Ketenagakerjaan</li>
                    <li>Laporan harian digital</li>
                    <li>Supervisor visit mingguan</li>
                    <li>Penggantian personel jika berhalangan</li>
                </ul>
                <button class="pricing-button" onclick="window.location.href='{{ route('contact') }}'">
                    Pilih Paket
                </button>
            </div>

            <!-- Standard Package (Featured) -->
            <div class="pricing-card featured">
                <div class="pricing-header">
                    <div class="pricing-icon">⭐</div>
                    <h3 class="pricing-name">Standard</h3>
                    <p class="pricing-desc">Paling populer untuk perusahaan</p>
                </div>
                <div class="pricing-price">
                    <span class="price-value">Rp 3.8 Jt</span>
                    <span class="price-period">/personel/bulan</span>
                </div>
                <ul class="pricing-features">
                    <li>Semua fitur Basic Package</li>
                    <li>Shift 12 jam/hari</li>
                    <li>Sistem patrol online Turjawali</li>
                    <li>GPS tracking real-time</li>
                    <li>Laporan mingguan & bulanan</li>
                    <li>Supervisor visit 2x seminggu</li>
                    <li>Emergency response team 24/7</li>
                    <li>Pelatihan rutin setiap 3 bulan</li>
                </ul>
                <button class="pricing-button" onclick="window.location.href='{{ route('contact') }}'">
                    Pilih Paket
                </button>
            </div>

            <!-- Premium Package -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-icon">👑</div>
                    <h3 class="pricing-name">Premium</h3>
                    <p class="pricing-desc">Untuk kebutuhan maksimal</p>
                </div>
                <div class="pricing-price">
                    <span class="price-value">Rp 4.5 Jt</span>
                    <span class="price-period">/personel/bulan</span>
                </div>
                <ul class="pricing-features">
                    <li>Semua fitur Standard Package</li>
                    <li>Personel pilihan (experienced)</li>
                    <li>Shift 24 jam dengan rotasi</li>
                    <li>CCTV monitoring integration</li>
                    <li>Dedicated supervisor</li>
                    <li>Laporan harian detail + foto</li>
                    <li>Access control system support</li>
                    <li>Koordinasi dengan security consultant</li>
                    <li>Priority customer support</li>
                </ul>
                <button class="pricing-button" onclick="window.location.href='{{ route('contact') }}'">
                    Pilih Paket
                </button>
            </div>
        </div>

        <div style="text-align: center; margin-top: 3rem; color: var(--gray-600);">
            <p style="font-size: 1.1rem;">
                💡 <strong>Butuh paket custom?</strong> Hubungi kami untuk penawaran khusus sesuai kebutuhan Anda.
            </p>
        </div>
    </div>
</section>

<!-- Case Study -->
<section class="case-study-section">
    <div class="case-study-container">
        <div class="section-header">
            <div class="section-badge">CASE STUDY</div>
            <h2 class="section-title">Studi Kasus</h2>
            <p class="section-description">
                Bagaimana kami membantu klien menyelesaikan tantangan keamanan mereka
            </p>
        </div>

        <div class="case-study-card">
            <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--navy-primary); margin-bottom: 1rem;">
                Pengelolaan Security Kompleks Perkantoran 20 Lantai
            </h3>
            <p style="color: var(--gray-600); font-size: 1.05rem; margin-bottom: 2rem;">
                PT. Multi Plaza Tower - Jakarta Selatan
            </p>

            <div class="case-study-grid">
                <div class="case-item challenge">
                    <h4>Challenge</h4>
                    <p>
                        Kompleks perkantoran dengan 20 lantai membutuhkan sistem keamanan terpadu yang dapat menangani high traffic (3000+ pengunjung/hari) dengan efektif namun tetap ramah kepada pengguna gedung.
                    </p>
                </div>

                <div class="case-item solution">
                    <h4>Solution</h4>
                    <p>
                        Deployment 24 personel security dengan pembagian zona, implementasi sistem patrol online terintegrasi CCTV, training khusus customer service, dan koordinasi dengan building management system.
                    </p>
                </div>

                <div class="case-item result">
                    <h4>Results</h4>
                    <p>
                        100% coverage area keamanan, response time < 3 menit, zero incident dalam 12 bulan pertama, kepuasan tenant meningkat 95%, dan efisiensi operasional meningkat 40%.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section">
    <div class="faq-container">
        <div class="section-header">
            <div class="section-badge">FAQ</div>
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-description">
                Jawaban untuk pertanyaan yang sering ditanyakan
            </p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah semua security memiliki sertifikat Gada Pratama?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Ya, semua personel security yang kami tempatkan telah memiliki sertifikat Gada Pratama yang dikeluarkan oleh Kepolisian RI. Sertifikat ini adalah syarat wajib untuk menjadi security profesional sesuai dengan regulasi yang berlaku.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana sistem monitoring 24/7 bekerja?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Kami menggunakan aplikasi Turjawali Patrol Online yang terintegrasi dengan GPS tracking. Setiap aktivitas patrol, checkpoint, dan kejadian insiden tercatat secara digital dan dapat dipantau real-time oleh klien melalui dashboard. Laporan otomatis dikirim setiap hari.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Berapa minimal kontrak untuk layanan security?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Minimal kontrak adalah 1 tahun untuk memastikan kontinuitas dan kualitas layanan. Namun, kami juga menyediakan opsi kontrak jangka pendek untuk kebutuhan event atau proyek khusus dengan terms yang dapat didiskusikan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana jika security yang ditugaskan tidak sesuai?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Kami berkomitmen pada kepuasan klien. Jika ada personel yang tidak sesuai dengan ekspektasi, kami akan segera melakukan penggantian dalam waktu maksimal 3x24 jam tanpa biaya tambahan. Kami juga melakukan evaluasi rutin untuk memastikan kualitas layanan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah ada biaya tambahan selain harga paket?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Harga paket sudah termasuk gaji personel, BPJS, seragam, peralatan, training, dan monitoring. Biaya tambahan hanya berlaku untuk permintaan khusus seperti overtime, penambahan personel mendadak, atau kebutuhan peralatan tambahan di luar standar.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana proses penempatan personel security?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Setelah kontrak ditandatangani, kami melakukan site survey dan risk assessment. Kemudian personel dipilih sesuai kebutuhan dan diberikan briefing khusus mengenai lokasi. Proses penempatan biasanya memakan waktu 7-14 hari kerja sejak kontrak disepakati.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-container">
        <h2>Siap Amankan Bisnis Anda?</h2>
        <p>
            Dapatkan konsultasi gratis dan penawaran terbaik untuk kebutuhan security bisnis Anda. Tim kami siap membantu 24/7.
        </p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-accent">
                📋 Ajukan Penawaran
            </a>
            <a href="https://wa.me/62xxx" class="btn btn-outline-white" target="_blank">
                💬 Chat WhatsApp
            </a>
            <a href="tel:+62xxx" class="btn btn-outline-white">
                📞 Telepon Sekarang
            </a>
        </div>
    </div>
</section>

<!-- Related Services -->
<section class="service-overview" style="background: var(--gray-50);">
    <div style="max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        <div class="section-header">
            <div class="section-badge">LAYANAN LAINNYA</div>
            <h2 class="section-title">Layanan Terkait</h2>
            <p class="section-description">
                Layanan lain yang mungkin Anda butuhkan
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div style="background: white; border: 2px solid var(--gray-200); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.3s;">
                <div style="font-size: 4rem; margin-bottom: 1.5rem;">🧹</div>
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-primary); margin-bottom: 1rem;">Cleaning Service</h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem; line-height: 1.7;">
                    Layanan kebersihan profesional untuk menjaga lingkungan kerja tetap bersih dan nyaman.
                </p>
                <a href="{{ route('services.show', 'cleaning-service') }}" style="display: inline-block; padding: 0.875rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700; transition: all 0.3s;">
                    Lihat Detail
                </a>
            </div>

            <div style="background: white; border: 2px solid var(--gray-200); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.3s;">
                <div style="font-size: 4rem; margin-bottom: 1.5rem;">📹</div>
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-primary); margin-bottom: 1rem;">CCTV & Security System</h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem; line-height: 1.7;">
                    Instalasi dan maintenance sistem CCTV untuk monitoring area yang lebih efektif.
                </p>
                <a href="{{ route('services.show', 'cctv-system') }}" style="display: inline-block; padding: 0.875rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700; transition: all 0.3s;">
                    Lihat Detail
                </a>
            </div>

            <div style="background: white; border: 2px solid var(--gray-200); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.3s;">
                <div style="font-size: 4rem; margin-bottom: 1.5rem;">💼</div>
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-primary); margin-bottom: 1rem;">Security Consulting</h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem; line-height: 1.7;">
                    Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko bisnis Anda.
                </p>
                <a href="{{ route('services.show', 'security-consulting') }}" style="display: inline-block; padding: 0.875rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700; transition: all 0.3s;">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Close all items
                faqItems.forEach(i => {
                    i.classList.remove('active');
                    i.querySelector('.faq-answer').style.maxHeight = null;
                });
                
                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                }
            });
        });

        // Smooth scroll for anchor links
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
        document.querySelectorAll('.feature-item, .method-step, .pricing-card, .faq-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Pricing card hover effects
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (!this.classList.contains('featured')) {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                }
            });

            card.addEventListener('mouseleave', function() {
                if (!this.classList.contains('featured')) {
                    this.style.transform = '';
                }
            });
        });
    });
</script>
@endpush