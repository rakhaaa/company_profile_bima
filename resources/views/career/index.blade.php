@extends('layouts.app')

@section('title', 'Karir - PT. Bintara Mitra Andalan')
@section('meta_description', 'Bergabunglah dengan tim profesional PT. Bintara Mitra Andalan. Temukan lowongan kerja untuk posisi Security Guard, Cleaning Service, Driver, dan lainnya.')

@push('styles')
<style>
    /* ========== CAREER HERO ========== */
    .career-hero {
        background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
        padding: 10rem 2rem 6rem;
        position: relative;
        overflow: hidden;
    }

    .career-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    }

    .career-hero-content {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 4rem;
        align-items: center;
        color: var(--white);
    }

    .hero-text h1 {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-text .highlight {
        color: var(--gold-accent);
    }

    .hero-text p {
        font-size: 1.3rem;
        opacity: 0.95;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-top: 3rem;
    }

    .hero-stat {
        text-align: center;
    }

    .hero-stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        display: block;
        color: var(--gold-accent);
    }

    .hero-stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .hero-image {
        position: relative;
    }

    .hero-image-placeholder {
        width: 100%;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
    }

    /* ========== WHY WORK WITH US ========== */
    .why-work-section {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .why-work-container {
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

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    .benefit-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        transition: all 0.3s;
    }

    .benefit-card:hover {
        transform: translateY(-8px);
        border-color: var(--navy-primary);
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    }

    .benefit-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        transition: all 0.3s;
    }

    .benefit-card:hover .benefit-icon {
        transform: scale(1.1) rotate(-5deg);
    }

    .benefit-card h3 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1rem;
    }

    .benefit-card p {
        color: var(--gray-600);
        line-height: 1.7;
    }

    /* ========== JOB LISTINGS ========== */
    .jobs-section {
        padding: 6rem 2rem;
        background: var(--gray-50);
    }

    .jobs-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .jobs-filters {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
    }

    .filter-row {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 1.5rem;
        align-items: end;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .filter-group label {
        font-weight: 600;
        color: var(--navy-primary);
        font-size: 0.9rem;
    }

    .filter-input {
        padding: 0.875rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s;
        font-family: inherit;
    }

    .filter-input:focus {
        outline: none;
        border-color: var(--navy-primary);
        box-shadow: 0 0 0 3px rgba(10, 31, 68, 0.1);
    }

    .filter-button {
        padding: 0.875rem 2rem;
        background: var(--navy-primary);
        color: var(--white);
        border: none;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
    }

    .filter-button:hover {
        background: var(--navy-secondary);
        transform: translateY(-2px);
    }

    .jobs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .jobs-count {
        font-size: 1.1rem;
        color: var(--gray-600);
        font-weight: 600;
    }

    .jobs-sort {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .jobs-sort label {
        font-weight: 600;
        color: var(--navy-primary);
        font-size: 0.9rem;
    }

    .jobs-sort select {
        padding: 0.75rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .jobs-sort select:focus {
        outline: none;
        border-color: var(--navy-primary);
    }

    .jobs-grid {
        display: grid;
        gap: 2rem;
    }

    .job-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2.5rem;
        transition: all 0.3s;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 2rem;
        align-items: start;
    }

    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        border-color: var(--navy-primary);
    }

    .job-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .job-header {
        display: flex;
        align-items: start;
        gap: 1.5rem;
    }

    .job-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .job-info h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 0.5rem;
    }

    .job-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .job-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-600);
        font-size: 0.9rem;
    }

    .job-meta-item strong {
        color: var(--navy-primary);
    }

    .job-tags {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .job-tag {
        padding: 0.4rem 1rem;
        background: var(--gray-100);
        color: var(--navy-primary);
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .job-tag.featured {
        background: var(--gold-accent);
        color: var(--white);
    }

    .job-requirements {
        font-size: 0.95rem;
        color: var(--gray-600);
        line-height: 1.7;
    }

    .job-requirements strong {
        color: var(--navy-primary);
    }

    .job-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: flex-end;
    }

    .job-salary {
        text-align: right;
    }

    .job-salary-label {
        font-size: 0.85rem;
        color: var(--gray-600);
        display: block;
        margin-bottom: 0.25rem;
    }

    .job-salary-amount {
        font-size: 1.5rem;
        font-weight: 900;
        color: var(--navy-primary);
        display: block;
    }

    .btn {
        padding: 0.875rem 2rem;
        border: none;
        border-radius: 10px;
        font-weight: 700;
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

    .btn-outline {
        background: transparent;
        color: var(--navy-primary);
        border: 2px solid var(--navy-primary);
    }

    .btn-outline:hover {
        background: var(--navy-primary);
        color: var(--white);
    }

    .job-posted {
        font-size: 0.85rem;
        color: var(--gray-500);
    }

    /* ========== RECRUITMENT PROCESS ========== */
    .recruitment-section {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .recruitment-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .process-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2.5rem;
        transition: all 0.3s;
        position: relative;
    }

    .process-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--navy-primary), var(--gold-accent));
        border-radius: 20px 20px 0 0;
    }

    .process-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
        border-color: var(--navy-primary);
    }

    .process-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
    }

    .process-card h4 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1rem;
    }

    .process-card ul {
        list-style: none;
        padding: 0;
    }

    .process-card ul li {
        padding: 0.5rem 0;
        padding-left: 1.5rem;
        color: var(--gray-600);
        position: relative;
        font-size: 0.95rem;
    }

    .process-card ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--gold-accent);
        font-weight: 900;
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

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
        .career-hero-content {
            grid-template-columns: 1fr;
        }

        .hero-image {
            order: -1;
        }

        .benefits-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .filter-row {
            grid-template-columns: 1fr 1fr;
        }

        .process-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-text h1 {
            font-size: 2.5rem;
        }

        .hero-stats {
            grid-template-columns: 1fr;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
        }

        .filter-row {
            grid-template-columns: 1fr;
        }

        .job-card {
            grid-template-columns: 1fr;
        }

        .job-actions {
            align-items: flex-start;
        }

        .job-salary {
            text-align: left;
        }

        .process-grid {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Career Hero -->
<section class="career-hero">
    <div class="career-hero-content">
        <div class="hero-text">
            <h1>Bergabunglah dengan<br><span class="highlight">Tim Profesional</span></h1>
            <p>
                Kembangkan karir Anda bersama PT. Bintara Mitra Andalan. Kami membuka kesempatan untuk Anda yang ingin menjadi bagian dari tim security, cleaning service, dan driver profesional.
            </p>
            <a href="#jobs" class="btn btn-accent">
                🔍 Lihat Lowongan
            </a>
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-number">500+</span>
                    <span class="hero-stat-label">Personel Aktif</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-number">10+</span>
                    <span class="hero-stat-label">Tahun Berpengalaman</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-number">15+</span>
                    <span class="hero-stat-label">Benefit & Fasilitas</span>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-image-placeholder">👥</div>
        </div>
    </div>
</section>

<!-- Why Work With Us -->
<section class="why-work-section">
    <div class="why-work-container">
        <div class="section-header">
            <div class="section-badge">KEUNTUNGAN BEKERJA DENGAN KAMI</div>
            <h2 class="section-title">Mengapa Bergabung?</h2>
            <p class="section-description">
                Berbagai benefit dan kesempatan pengembangan karir menanti Anda
            </p>
        </div>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">💰</div>
                <h3>Gaji Kompetitif</h3>
                <p>Sistem penggajian yang jelas dan kompetitif sesuai standar industri dengan pembayaran tepat waktu setiap bulan.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🎓</div>
                <h3>Pelatihan Security</h3>
                <p>Pelatihan intensif dan sertifikasi Gada Pratama untuk meningkatkan kompetensi profesional Anda.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">📈</div>
                <h3>Jenjang Karir</h3>
                <p>Kesempatan promosi dan pengembangan karir yang jelas dari level staff hingga supervisor dan manager.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🏥</div>
                <h3>BPJS Kesehatan & TK</h3>
                <p>Perlindungan kesehatan dan ketenagakerjaan sesuai regulasi pemerintah untuk keamanan Anda dan keluarga.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🎁</div>
                <h3>THR & Bonus</h3>
                <p>Tunjangan Hari Raya dan bonus kinerja diberikan secara berkala sesuai pencapaian dan dedikasi Anda.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">👔</div>
                <h3>Seragam & Perlengkapan</h3>
                <p>Seragam lengkap dan perlengkapan kerja disediakan perusahaan untuk menunjang profesionalitas Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Job Listings -->
<section class="jobs-section" id="jobs">
    <div class="jobs-container">
        <div class="section-header">
            <div class="section-badge">LOWONGAN TERSEDIA</div>
            <h2 class="section-title">Posisi yang Dibuka</h2>
            <p class="section-description">
                Temukan posisi yang sesuai dengan keahlian dan minat Anda
            </p>
        </div>

        <!-- Filters -->
        <div class="jobs-filters">
            <form action="{{ route('career') }}" method="GET">
                <div class="filter-row">
                    <div class="filter-group">
                        <label>Cari Pekerjaan</label>
                        <input type="text" name="search" class="filter-input" placeholder="Cari berdasarkan posisi atau kata kunci..." value="{{ request('search') }}">
                    </div>
                    <div class="filter-group">
                        <label>Kategori</label>
                        <select name="category" class="filter-input">
                            <option value="">Semua Kategori</option>
                            <option value="security" {{ request('category') == 'security' ? 'selected' : '' }}>Security</option>
                            <option value="cleaning" {{ request('category') == 'cleaning' ? 'selected' : '' }}>Cleaning</option>
                            <option value="driver" {{ request('category') == 'driver' ? 'selected' : '' }}>Driver</option>
                            <option value="supervisor" {{ request('category') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Lokasi</label>
                        <select name="location" class="filter-input">
                            <option value="">Semua Lokasi</option>
                            <option value="jakarta" {{ request('location') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                            <option value="semarang" {{ request('location') == 'semarang' ? 'selected' : '' }}>Semarang</option>
                            <option value="surabaya" {{ request('location') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                            <option value="bandung" {{ request('location') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Tipe</label>
                        <select name="type" class="filter-input">
                            <option value="">Semua Tipe</option>
                            <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                            <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                        </select>
                    </div>
                </div>
                <div style="margin-top: 1.5rem; display: flex; gap: 1rem;">
                    <button type="submit" class="filter-button">🔍 Cari Lowongan</button>
                    <a href="{{ route('career') }}" class="btn btn-outline">Reset Filter</a>
                </div>
            </form>
        </div>

        <!-- Jobs Header -->
        <div class="jobs-header">
            <div class="jobs-count">
                Menampilkan <strong>12 lowongan</strong> tersedia
            </div>
            <div class="jobs-sort">
                <label>Urutkan:</label>
                <select>
                    <option>Terbaru</option>
                    <option>Gaji Tertinggi</option>
                    <option>Lokasi</option>
                    <option>Kategori</option>
                </select>
            </div>
        </div>

        <!-- Jobs Grid -->
        <div class="jobs-grid">
            <!-- Job Card 1 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">🛡️</div>
                        <div class="job-info">
                            <h3>Security Guard</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Semarang</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 2 hari lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag featured">URGENT</span>
                        <span class="job-tag">Security</span>
                        <span class="job-tag">Gada Pratama</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria, usia 20-35 tahun, tinggi min. 168cm, memiliki atau bersedia mengikuti pelatihan Gada Pratama.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 3.5 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'security-guard-semarang') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">🧹</div>
                        <div class="job-info">
                            <h3>Cleaning Service</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Jakarta</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 5 hari lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag">Cleaning</span>
                        <span class="job-tag">Mall/Office</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria/Wanita, usia 20-40 tahun, jujur, disiplin, dan siap bekerja shift.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 2.8 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'cleaning-service-jakarta') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>

            <!-- Job Card 3 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">🚗</div>
                        <div class="job-info">
                            <h3>Driver/Sopir Perusahaan</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Surabaya</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 1 minggu lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag">Driver</span>
                        <span class="job-tag">SIM A</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria, usia 25-45 tahun, memiliki SIM A, menguasai rute Surabaya dan sekitarnya.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 3.2 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'driver-surabaya') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>

            <!-- Job Card 4 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">👮</div>
                        <div class="job-info">
                            <h3>Security Supervisor</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Jakarta</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 3 hari lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag featured">URGENT</span>
                        <span class="job-tag">Supervisor</span>
                        <span class="job-tag">Management</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria, min. S1/D3, pengalaman min. 3 tahun sebagai supervisor security, Gada Utama.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 6.5 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'security-supervisor-jakarta') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>

            <!-- Job Card 5 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">🛡️</div>
                        <div class="job-info">
                            <h3>Security Guard - Shift Malam</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Bandung</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 4 hari lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag">Security</span>
                        <span class="job-tag">Night Shift</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria, usia 20-35 tahun, bersedia kerja shift malam, memiliki Gada Pratama.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 3.8 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'security-guard-bandung') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>

            <!-- Job Card 6 -->
            <div class="job-card">
                <div class="job-content">
                    <div class="job-header">
                        <div class="job-icon">🧹</div>
                        <div class="job-info">
                            <h3>Cleaning Supervisor</h3>
                            <div class="job-meta">
                                <span class="job-meta-item">📍 <strong>Semarang</strong></span>
                                <span class="job-meta-item">💼 <strong>Full Time</strong></span>
                                <span class="job-meta-item">📅 Diposting 1 minggu lalu</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="job-tag">Supervisor</span>
                        <span class="job-tag">Cleaning</span>
                    </div>
                    <div class="job-requirements">
                        <strong>Persyaratan:</strong> Pria/Wanita, min. SMA/SMK, pengalaman min. 2 tahun di bidang cleaning service.
                    </div>
                </div>
                <div class="job-actions">
                    <div class="job-salary">
                        <span class="job-salary-label">Gaji/Bulan</span>
                        <span class="job-salary-amount">Rp 4.5 Jt</span>
                    </div>
                    <a href="{{ route('career.show', 'cleaning-supervisor-semarang') }}" class="btn btn-primary">
                        Detail & Lamar
                    </a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div style="margin-top: 3rem; display: flex; justify-content: center; gap: 1rem;">
            <button class="btn btn-outline">← Previous</button>
            <button class="btn btn-primary">1</button>
            <button class="btn btn-outline">2</button>
            <button class="btn btn-outline">3</button>
            <button class="btn btn-outline">Next →</button>
        </div>
    </div>
</section>

<!-- Recruitment Process -->
<section class="recruitment-section">
    <div class="recruitment-container">
        <div class="section-header">
            <div class="section-badge">PROSES REKRUTMEN</div>
            <h2 class="section-title">6 Tahap Seleksi</h2>
            <p class="section-description">
                Proses seleksi yang ketat untuk menghasilkan personel berkualitas
            </p>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="process-number">1</div>
                <h4>Seleksi Administrasi</h4>
                <ul>
                    <li>Kelengkapan berkas/CV</li>
                    <li>Ijazah Gada Pratama (untuk security)</li>
                    <li>SKCK aktif</li>
                    <li>Pas foto 4x6 (2 lembar)</li>
                    <li>KTP & Ijazah terakhir</li>
                </ul>
            </div>

            <div class="process-card">
                <div class="process-number">2</div>
                <h4>Tes Postur & Parade</h4>
                <ul>
                    <li>Tinggi min. 168cm (Pria) / 160cm (Wanita)</li>
                    <li>Berat badan proporsional</li>
                    <li>Bentuk badan simetris</li>
                    <li>Tes skill PBB</li>
                    <li>Tes bela diri</li>
                </ul>
            </div>

            <div class="process-card">
                <div class="process-number">3</div>
                <h4>Tes Kesehatan</h4>
                <ul>
                    <li>Medical Check Up lengkap</li>
                    <li>Bebas narkoba</li>
                    <li>Tidak buta warna</li>
                    <li>Bebas penyakit menular</li>
                    <li>Bebas Hepatitis B</li>
                </ul>
            </div>

            <div class="process-card">
                <div class="process-number">4</div>
                <h4>Tes Fisik (Samapta)</h4>
                <ul>
                    <li>Lari 10 menit</li>
                    <li>Push up 40x (nilai 100)</li>
                    <li>Sit up 40x (nilai 100)</li>
                    <li>Shuttle run 18 detik</li>
                    <li>Lari jarak 10 meter 3x putaran</li>
                </ul>
            </div>

            <div class="process-card">
                <div class="process-number">5</div>
                <h4>Psikotes</h4>
                <ul>
                    <li>Tes kepribadian</li>
                    <li>Tes kecerdasan</li>
                    <li>Tes logika</li>
                    <li>Standar minimal nilai 65</li>
                    <li>Evaluasi mental & emosional</li>
                </ul>
            </div>

            <div class="process-card">
                <div class="process-number">6</div>
                <h4>Wawancara & Komitmen</h4>
                <ul>
                    <li>Interview mendalam</li>
                    <li>Penandatanganan kontrak</li>
                    <li>Surat kesanggupan</li>
                    <li>Komitmen sesuai PP/PKWT</li>
                    <li>Pembekalan tugas</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="faq-container">
        <div class="section-header">
            <div class="section-badge">FAQ PELAMAR</div>
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-description">
                Jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>
        <div class="faq-accordion">
            <div class="faq-item">
                <div class="faq-question">
                    <span>Berapa lama proses rekrutmen berlangsung?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Proses rekrutmen biasanya memakan waktu 2-4 minggu tergantung posisi yang dilamar. Setelah menyelesaikan semua tahap seleksi, kandidat yang lolos akan dihubungi dalam waktu maksimal 1 minggu untuk proses onboarding dan pembekalan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah ada biaya pendaftaran?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Tidak ada biaya pendaftaran sama sekali. Biaya pelatihan sertifikasi Gada Pratama untuk posisi security akan ditanggung oleh perusahaan terlebih dahulu dan akan dipotong dari gaji bulanan setelah penempatan kerja.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Dokumen apa saja yang diperlukan untuk melamar?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Dokumen yang wajib disiapkan: (1) CV terbaru, (2) KTP, (3) Ijazah terakhir, (4) SKCK aktif, (5) Pas foto 4x6 (2 lembar), (6) Foto seluruh badan, (7) Sertifikat Gada Pratama (khusus security, jika sudah memiliki). Semua dokumen dapat diupload dalam format PDF atau JPG.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah bisa melamar tanpa pengalaman?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Ya, kami menerima fresh graduate dan kandidat tanpa pengalaman untuk posisi entry level. Kami akan memberikan pelatihan intensif untuk memastikan Anda siap menjalankan tugas dengan profesional. Yang terpenting adalah komitmen, kejujuran, dan kesediaan untuk belajar.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Kapan saya bisa mulai bekerja setelah diterima?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Setelah dinyatakan lolos seleksi, kandidat akan mengikuti pembekalan dan training selama 1-2 minggu. Setelah itu, Anda akan langsung ditempatkan sesuai dengan posisi yang dilamar. Untuk posisi urgent, proses bisa lebih cepat.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana sistem kerja dan jadwal shift?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Sistem kerja bervariasi tergantung posisi dan penempatan. Untuk security umumnya shift 8-12 jam dengan sistem rotasi (pagi, siang, malam). Cleaning service biasanya bekerja di pagi/siang hari. Driver mengikuti jam kerja kantor klien. Jadwal lengkap akan dijelaskan saat pembekalan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana jika saya belum memiliki sertifikat Gada Pratama?</span>
                    <div class="faq-icon">↓</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Tidak masalah. Jika Anda lolos seleksi untuk posisi security namun belum memiliki Gada Pratama, perusahaan akan memfasilitasi pelatihan dan sertifikasi Gada Pratama yang akan ditanggung oleh perusahaan terlebih dahulu dan akan dipotong dari gaji bulanan setelah penempatan kerja.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="why-work-section" style="background: var(--gray-50); padding: 5rem 2rem;">
    <div style="max-width: 900px; margin: 0 auto; text-align: center;">
        <h2 class="section-title">Siap Bergabung?</h2>
        <p class="section-description" style="margin-bottom: 2.5rem;">
            Jangan lewatkan kesempatan untuk mengembangkan karir bersama kami. Temukan posisi yang tepat dan lamar sekarang!
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
            <a href="#jobs" class="btn btn-accent">
                🔍 Lihat Semua Lowongan
            </a>
            <a href="https://wa.me/62xxx" class="btn btn-primary" target="_blank">
                💬 Tanya via WhatsApp
            </a>
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
        document.querySelectorAll('.benefit-card, .job-card, .process-card, .faq-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Smooth scroll to jobs section
        document.querySelectorAll('a[href="#jobs"]').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector('#jobs');
                if (target) {
                    const offsetTop = target.offsetTop - 90;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
@endpush