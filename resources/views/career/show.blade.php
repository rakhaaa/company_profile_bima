@extends('layouts.app')

@section('title', 'Security Guard - Semarang | Karir')
@section('meta_description', 'Lowongan Security Guard di Semarang. Gaji Rp 3.5 Jt/bulan dengan benefit lengkap. Lamar sekarang!')

@push('styles')
<style>
    /* ========== JOB DETAIL HEADER ========== */
    .job-detail-header {
        background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
        padding: 8rem 2rem 4rem;
        position: relative;
        overflow: hidden;
    }

    .job-detail-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%);
    }

    .job-header-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
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

    .job-title-section {
        display: flex;
        gap: 2rem;
        align-items: start;
        margin-bottom: 2rem;
    }

    .job-title-icon {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        flex-shrink: 0;
    }

    .job-title-content h1 {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .job-quick-info {
        display: flex;
        gap: 2.5rem;
        flex-wrap: wrap;
        font-size: 1.05rem;
    }

    .job-quick-info span {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .job-tags {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .job-tag {
        padding: 0.5rem 1.25rem;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .job-tag.urgent {
        background: var(--gold-accent);
        border-color: var(--gold-accent);
    }

    /* ========== JOB CONTENT SECTION ========== */
    .job-content-section {
        padding: 4rem 2rem;
        background: var(--white);
    }

    .job-content-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
    }

    .job-main-content {
        background: var(--white);
    }

    .content-card {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
    }

    .content-card h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .content-card h3::before {
        content: '';
        width: 5px;
        height: 30px;
        background: var(--gold-accent);
        border-radius: 3px;
    }

    .content-card p, .content-card li {
        color: var(--gray-600);
        line-height: 1.8;
        margin-bottom: 1rem;
        font-size: 1.05rem;
    }

    .content-card ul, .content-card ol {
        padding-left: 1.5rem;
    }

    .content-card ul {
        list-style: none;
    }

    .content-card ul li {
        position: relative;
        padding-left: 1.5rem;
    }

    .content-card ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--gold-accent);
        font-weight: 900;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .benefit-item {
        display: flex;
        gap: 1rem;
        align-items: start;
        padding: 1.25rem;
        background: var(--gray-50);
        border-radius: 12px;
        border: 2px solid var(--gray-100);
        transition: all 0.3s;
    }

    .benefit-item:hover {
        border-color: var(--navy-primary);
        background: var(--white);
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        background: var(--navy-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--white);
        flex-shrink: 0;
    }

    .benefit-info h4 {
        font-weight: 700;
        color: var(--navy-primary);
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .benefit-info p {
        font-size: 0.9rem;
        margin: 0;
    }

    /* ========== JOB SIDEBAR ========== */
    .job-sidebar {
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

    .sidebar-card h4 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
    }

    .sidebar-info-list {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .sidebar-info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .sidebar-info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sidebar-info-label {
        color: var(--gray-600);
        font-size: 0.9rem;
        font-weight: 600;
    }

    .sidebar-info-value {
        color: var(--navy-primary);
        font-weight: 700;
        font-size: 1rem;
    }

    .salary-highlight {
        background: var(--gray-50);
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 2rem;
        border: 2px solid var(--gray-200);
    }

    .salary-label {
        font-size: 0.9rem;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
    }

    .salary-amount {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--navy-primary);
        display: block;
    }

    .apply-button {
        width: 100%;
        padding: 1.25rem;
        background: var(--gold-accent);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 1rem;
    }

    .apply-button:hover {
        background: var(--orange-accent);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
    }

    .share-buttons {
        display: flex;
        gap: 0.75rem;
    }

    .share-btn {
        flex: 1;
        padding: 0.875rem;
        border: 2px solid var(--gray-200);
        background: var(--white);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 1.2rem;
        text-align: center;
    }

    .share-btn:hover {
        border-color: var(--navy-primary);
        background: var(--gray-50);
    }

    /* ========== APPLICATION FORM ========== */
    .application-section {
        padding: 6rem 2rem;
        background: var(--gray-50);
    }

    .application-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
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

    .application-form {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 24px;
        padding: 3rem;
    }

    .form-section {
        margin-bottom: 3rem;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--gold-accent);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-row.single {
        grid-template-columns: 1fr;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group label {
        font-weight: 700;
        color: var(--navy-primary);
        font-size: 0.95rem;
    }

    .form-group label .required {
        color: var(--danger);
    }

    .form-input {
        padding: 1rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--navy-primary);
        box-shadow: 0 0 0 4px rgba(10, 31, 68, 0.1);
    }

    textarea.form-input {
        min-height: 150px;
        resize: vertical;
    }

    .file-upload-wrapper {
        position: relative;
        border: 3px dashed var(--gray-300);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
    }

    .file-upload-wrapper:hover {
        border-color: var(--navy-primary);
        background: var(--gray-50);
    }

    .file-upload-wrapper.has-file {
        border-color: var(--gold-accent);
        background: rgba(245, 158, 11, 0.05);
    }

    .file-upload-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .file-upload-text {
        color: var(--gray-600);
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }

    .file-upload-info {
        color: var(--gray-500);
        font-size: 0.85rem;
    }

    .file-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-name {
        font-weight: 700;
        color: var(--navy-primary);
        margin-top: 0.5rem;
    }

    .form-note {
        background: rgba(59, 130, 246, 0.1);
        border-left: 4px solid var(--info);
        padding: 1.25rem;
        border-radius: 8px;
        color: var(--gray-700);
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .submit-section {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid var(--gray-200);
    }

    .checkbox-group {
        display: flex;
        gap: 1rem;
        align-items: start;
    }

    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        flex-shrink: 0;
        margin-top: 0.25rem;
    }

    .checkbox-group label {
        color: var(--gray-700);
        line-height: 1.7;
        cursor: pointer;
    }

    .submit-button {
        padding: 1.5rem 3rem;
        background: var(--navy-primary);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .submit-button:hover {
        background: var(--navy-secondary);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(10, 31, 68, 0.3);
    }

    .submit-button:disabled {
        background: var(--gray-300);
        cursor: not-allowed;
        transform: none;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
        .job-content-container {
            grid-template-columns: 1fr;
        }

        .job-sidebar {
            position: static;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .job-title-content h1 {
            font-size: 2rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }

        .application-form {
            padding: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Job Detail Header -->
<section class="job-detail-header">
    <div class="job-header-content">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('career') }}">Karir</a>
            <span>/</span>
            <span>Security Guard - Semarang</span>
        </div>
        
        <div class="job-title-section">
            <div class="job-title-icon">🛡️</div>
            <div class="job-title-content">
                <h1>Security Guard</h1>
                <div class="job-quick-info">
                    <span>📍 Semarang, Jawa Tengah</span>
                    <span>💼 Full Time</span>
                    <span>📅 Diposting 2 hari lalu</span>
                </div>
                <div class="job-tags">
                    <span class="job-tag urgent">URGENT HIRING</span>
                    <span class="job-tag">Security</span>
                    <span class="job-tag">Gada Pratama</span>
                    <span class="job-tag">Entry Level</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Content -->
<section class="job-content-section">
    <div class="job-content-container">
        <!-- Main Content -->
        <div class="job-main-content">
            <!-- Description -->
            <div class="content-card">
                <h3>Deskripsi Pekerjaan</h3>
                <p>
                    Kami membuka kesempatan untuk Anda yang ingin berkarir sebagai Security Guard profesional di Semarang. Posisi ini bertanggung jawab untuk menjaga keamanan dan ketertiban di area yang ditugaskan, melakukan patroli rutin, dan memberikan respon cepat terhadap situasi darurat.
                </p>
                <p>
                    Sebagai Security Guard di PT. Bintara Mitra Andalan, Anda akan bekerja dalam tim yang solid dengan sistem monitoring digital 24/7 dan mendapatkan dukungan penuh dari supervisor serta management team.
                </p>
            </div>

            <!-- Responsibilities -->
            <div class="content-card">
                <h3>Tanggung Jawab</h3>
                <ul>
                    <li>Melakukan patroli rutin di area yang ditugaskan sesuai jadwal</li>
                    <li>Menjaga keamanan dan ketertiban lingkungan kerja</li>
                    <li>Melakukan pemeriksaan terhadap orang, kendaraan, dan barang yang keluar masuk</li>
                    <li>Membuat laporan harian dan insiden secara detail</li>
                    <li>Memberikan respon cepat terhadap situasi darurat</li>
                    <li>Mengoperasikan sistem CCTV dan peralatan keamanan lainnya</li>
                    <li>Memberikan pelayanan informasi kepada tamu dengan sopan dan profesional</li>
                    <li>Menjalankan SOP keamanan yang telah ditetapkan</li>
                </ul>
            </div>

            <!-- Requirements -->
            <div class="content-card">
                <h3>Persyaratan</h3>
                <ul>
                    <li>Pria, usia maksimal 35 tahun</li>
                    <li>Tinggi badan minimal 168 cm dengan berat badan proporsional</li>
                    <li>Pendidikan minimal SMA/SMK sederajat</li>
                    <li>Memiliki atau bersedia mengikuti pelatihan Gada Pratama (biaya ditanggung perusahaan)</li>
                    <li>Memiliki SKCK aktif</li>
                    <li>Sehat jasmani dan rohani (akan dilakukan Medical Check Up)</li>
                    <li>Tidak buta warna dan bebas narkoba</li>
                    <li>Disiplin, jujur, dan bertanggung jawab</li>
                    <li>Mampu bekerja dalam shift (pagi, siang, malam)</li>
                    <li>Bersedia ditempatkan di area Semarang dan sekitarnya</li>
                    <li>Memiliki kemampuan komunikasi yang baik</li>
                    <li>Pengalaman di bidang security menjadi nilai tambah (fresh graduate dipersilakan)</li>
                </ul>
            </div>

            <!-- Benefits -->
            <div class="content-card">
                <h3>Benefit & Fasilitas</h3>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">💰</div>
                        <div class="benefit-info">
                            <h4>Gaji Kompetitif</h4>
                            <p>Rp 3.500.000/bulan</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">🏥</div>
                        <div class="benefit-info">
                            <h4>BPJS Kesehatan & TK</h4>
                            <p>Perlindungan penuh</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">🎓</div>
                        <div class="benefit-info">
                            <h4>Pelatihan Gratis</h4>
                            <p>Sertifikasi Gada Pratama</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">👔</div>
                        <div class="benefit-info">
                            <h4>Seragam Lengkap</h4>
                            <p>Seragam & perlengkapan</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">🎁</div>
                        <div class="benefit-info">
                            <h4>THR & Bonus</h4>
                            <p>Sesuai pencapaian</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">📈</div>
                        <div class="benefit-info">
                            <h4>Jenjang Karir</h4>
                            <p>Promosi ke supervisor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="job-sidebar">
            <div class="sidebar-card">
                <div class="salary-highlight">
                    <div class="salary-label">Gaji Per Bulan</div>
                    <span class="salary-amount">Rp 3.5 Jt</span>
                </div>
                
                <button onclick="document.getElementById('application-form').scrollIntoView({behavior: 'smooth'})" class="apply-button">
                    📝 Lamar Sekarang
                </button>
                
                <div class="share-buttons">
                    <button class="share-btn" title="Share via WhatsApp">💬</button>
                    <button class="share-btn" title="Share via Facebook">f</button>
                    <button class="share-btn" title="Share via Twitter">🐦</button>
                    <button class="share-btn" title="Copy Link">🔗</button>
                </div>
            </div>

            <div class="sidebar-card">
                <h4>Informasi Pekerjaan</h4>
                <div class="sidebar-info-list">
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Kategori</span>
                        <span class="sidebar-info-value">Security</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Lokasi</span>
                        <span class="sidebar-info-value">Semarang</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Tipe Pekerjaan</span>
                        <span class="sidebar-info-value">Full Time</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Pengalaman</span>
                        <span class="sidebar-info-value">Fresh Graduate OK</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Deadline</span>
                        <span class="sidebar-info-value">31 Jan 2026</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-label">Posisi Tersedia</span>
                        <span class="sidebar-info-value">10 Orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="application-section" id="application-form">
    <div class="application-container">
        <div class="section-header">
            <div class="section-badge">FORM LAMARAN</div>
            <h2 class="section-title">Lamar Posisi Ini</h2>
            <p class="section-description">
                Lengkapi form di bawah ini dengan data yang benar dan lengkap
            </p>
        </div>

        <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data" class="application-form">
            @csrf
            <input type="hidden" name="job_id" value="1">

            <div class="form-note">
                <strong>📌 Catatan Penting:</strong> Pastikan semua data yang Anda isi adalah benar dan sesuai dengan dokumen resmi. Data yang tidak valid akan menyebabkan lamaran Anda ditolak.
            </div>

            <!-- Personal Information -->
            <div class="form-section">
                <h3 class="form-section-title">Data Pribadi</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="required">*</span></label>
                        <input type="text" name="full_name" class="form-input" placeholder="Masukkan nama lengkap sesuai KTP" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" class="form-input" placeholder="email@example.com" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nomor Telepon/WhatsApp <span class="required">*</span></label>
                        <input type="tel" name="phone" class="form-input" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="required">*</span></label>
                        <input type="date" name="birth_date" class="form-input" required>
                    </div>
                </div>

                <div class="form-row single">
                    <div class="form-group">
                        <label>Alamat Lengkap <span class="required">*</span></label>
                        <textarea name="address" class="form-input" placeholder="Masukkan alamat lengkap sesuai KTP" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Tinggi Badan (cm) <span class="required">*</span></label>
                        <input type="number" name="height" class="form-input" placeholder="contoh: 170" required>
                    </div>
                    <div class="form-group">
                        <label>Berat Badan (kg) <span class="required">*</span></label>
                        <input type="number" name="weight" class="form-input" placeholder="contoh: 65" required>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="form-section">
                <h3 class="form-section-title">Pendidikan</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Pendidikan Terakhir <span class="required">*</span></label>
                        <select name="education_level" class="form-input" required>
                            <option value="">Pilih pendidikan terakhir</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jurusan/Program Studi</label>
                        <input type="text" name="major" class="form-input" placeholder="contoh: IPA, Teknik, dll">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Institusi <span class="required">*</span></label>
                        <input type="text" name="institution" class="form-input" placeholder="Nama sekolah/universitas" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Lulus <span class="required">*</span></label>
                        <input type="number" name="graduation_year" class="form-input" placeholder="contoh: 2020" required>
                    </div>
                </div>
            </div>

            <!-- Experience -->
            <div class="form-section">
                <h3 class="form-section-title">Pengalaman Kerja</h3>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label>Apakah Anda memiliki pengalaman di bidang security?</label>
                        <select name="has_experience" class="form-input" onchange="toggleExperience(this)">
                            <option value="no">Tidak (Fresh Graduate)</option>
                            <option value="yes">Ya, saya memiliki pengalaman</option>
                        </select>
                    </div>
                </div>

                <div id="experience-fields" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Posisi Terakhir</label>
                            <input type="text" name="last_position" class="form-input" placeholder="contoh: Security Guard">
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="last_company" class="form-input" placeholder="Nama perusahaan terakhir">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Lama Bekerja</label>
                            <input type="text" name="work_duration" class="form-input" placeholder="contoh: 2 tahun">
                        </div>
                        <div class="form-group">
                            <label>Gaji Terakhir</label>
                            <input type="text" name="last_salary" class="form-input" placeholder="contoh: Rp 3.000.000">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Upload -->
            <div class="form-section">
                <h3 class="form-section-title">Dokumen Pendukung</h3>
                
                <!-- CV Upload -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label>Upload CV/Resume <span class="required">*</span></label>
                    <div class="file-upload-wrapper" onclick="document.getElementById('cv-upload').click()">
                        <div class="file-upload-icon">📄</div>
                        <div class="file-upload-text">Klik untuk upload CV</div>
                        <div class="file-upload-info">Format: PDF, maksimal 2MB</div>
                        <div class="file-name" id="cv-name"></div>
                        <input type="file" id="cv-upload" name="cv" class="file-input" accept=".pdf" required onchange="showFileName(this, 'cv-name')">
                    </div>
                </div>

                <!-- Full Body Photo -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label>Upload Foto Seluruh Badan <span class="required">*</span></label>
                    <div class="file-upload-wrapper" onclick="document.getElementById('photo-upload').click()">
                        <div class="file-upload-icon">📷</div>
                        <div class="file-upload-text">Klik untuk upload foto</div>
                        <div class="file-upload-info">Format: JPG/PNG, maksimal 1MB, foto berdiri tegak tampak keseluruhan</div>
                        <div class="file-name" id="photo-name"></div>
                        <input type="file" id="photo-upload" name="full_body_photo" class="file-input" accept="image/jpeg,image/png" required onchange="showFileName(this, 'photo-name')">
                    </div>
                </div>

                <!-- KTP Upload -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label>Upload KTP <span class="required">*</span></label>
                    <div class="file-upload-wrapper" onclick="document.getElementById('ktp-upload').click()">
                        <div class="file-upload-icon">🪪</div>
                        <div class="file-upload-text">Klik untuk upload KTP</div>
                        <div class="file-upload-info">Format: JPG/PNG/PDF, maksimal 1MB</div>
                        <div class="file-name" id="ktp-name"></div>
                        <input type="file" id="ktp-upload" name="ktp" class="file-input" accept="image/jpeg,image/png,application/pdf" required onchange="showFileName(this, 'ktp-name')">
                    </div>
                </div>

                <!-- Ijazah Upload -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label>Upload Ijazah Terakhir <span class="required">*</span></label>
                    <div class="file-upload-wrapper" onclick="document.getElementById('ijazah-upload').click()">
                        <div class="file-upload-icon">🎓</div>
                        <div class="file-upload-text">Klik untuk upload ijazah</div>
                        <div class="file-upload-info">Format: JPG/PNG/PDF, maksimal 2MB</div>
                        <div class="file-name" id="ijazah-name"></div>
                        <input type="file" id="ijazah-upload" name="ijazah" class="file-input" accept="image/jpeg,image/png,application/pdf" required onchange="showFileName(this, 'ijazah-name')">
                    </div>
                </div>

                <!-- Gada Pratama Certificate (Optional for Security) -->
                <div class="form-group">
                    <label>Upload Sertifikat Gada Pratama (Jika Ada)</label>
                    <div class="file-upload-wrapper" onclick="document.getElementById('gada-upload').click()">
                        <div class="file-upload-icon">🎖️</div>
                        <div class="file-upload-text">Klik untuk upload sertifikat</div>
                        <div class="file-upload-info">Format: JPG/PNG/PDF, maksimal 2MB (Opsional, akan difasilitasi jika belum memiliki)</div>
                        <div class="file-name" id="gada-name"></div>
                        <input type="file" id="gada-upload" name="gada_certificate" class="file-input" accept="image/jpeg,image/png,application/pdf" onchange="showFileName(this, 'gada-name')">
                    </div>
                </div>
            </div>

            <!-- Cover Letter -->
            <div class="form-section">
                <h3 class="form-section-title">Surat Lamaran</h3>
                
                <div class="form-group">
                    <label>Ceritakan mengapa Anda tertarik dengan posisi ini <span class="required">*</span></label>
                    <textarea name="cover_letter" class="form-input" placeholder="Jelaskan motivasi Anda melamar posisi ini, keahlian yang relevan, dan apa yang bisa Anda kontribusikan untuk perusahaan..." required style="min-height: 200px;"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Kapan Anda bisa mulai bekerja? <span class="required">*</span></label>
                        <select name="availability" class="form-input" required>
                            <option value="">Pilih ketersediaan</option>
                            <option value="immediately">Segera</option>
                            <option value="1-week">1 Minggu</option>
                            <option value="2-weeks">2 Minggu</option>
                            <option value="1-month">1 Bulan</option>
                            <option value="negotiable">Dapat Dinegosiasikan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ekspektasi Gaji</label>
                        <input type="text" name="salary_expectation" class="form-input" placeholder="contoh: Rp 3.500.000">
                    </div>
                </div>
            </div>

            <!-- Terms & Submit -->
            <div class="submit-section">
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        Saya menyatakan bahwa semua data yang saya berikan adalah benar dan dapat dipertanggungjawabkan. Saya bersedia mengikuti seluruh proses rekrutmen yang ditetapkan oleh PT. Bintara Mitra Andalan dan mematuhi peraturan perusahaan jika diterima.
                    </label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="privacy" name="privacy" required>
                    <label for="privacy">
                        Saya telah membaca dan menyetujui <a href="#" style="color: var(--navy-primary); font-weight: 700;">Kebijakan Privasi</a> perusahaan terkait penggunaan data pribadi saya untuk keperluan proses rekrutmen.
                    </label>
                </div>

                <button type="submit" class="submit-button">
                    📤 Kirim Lamaran
                </button>

                <p style="text-align: center; color: var(--gray-600); font-size: 0.9rem; margin: 0;">
                    Dengan mengirim lamaran ini, data Anda akan diproses oleh tim HR kami. Kami akan menghubungi Anda dalam 3-7 hari kerja.
                </p>
            </div>
        </form>
    </div>
</section>

<!-- Related Jobs -->
<section class="job-content-section" style="background: var(--gray-50);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header">
            <div class="section-badge">LOWONGAN LAINNYA</div>
            <h2 class="section-title">Posisi Terkait</h2>
            <p class="section-description">
                Posisi lain yang mungkin Anda minati
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div class="content-card" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🧹</div>
                <h3 style="margin-bottom: 0.5rem;">Cleaning Service</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Jakarta • Full Time</p>
                <p style="font-size: 1.5rem; font-weight: 900; color: var(--navy-primary); margin-bottom: 1.5rem;">Rp 2.8 Jt</p>
                <a href="#" style="display: inline-block; padding: 0.75rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700;">Lihat Detail</a>
            </div>

            <div class="content-card" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🚗</div>
                <h3 style="margin-bottom: 0.5rem;">Driver Perusahaan</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Surabaya • Full Time</p>
                <p style="font-size: 1.5rem; font-weight: 900; color: var(--navy-primary); margin-bottom: 1.5rem;">Rp 3.2 Jt</p>
                <a href="#" style="display: inline-block; padding: 0.75rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700;">Lihat Detail</a>
            </div>

            <div class="content-card" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">👮</div>
                <h3 style="margin-bottom: 0.5rem;">Security Supervisor</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Jakarta • Full Time</p>
                <p style="font-size: 1.5rem; font-weight: 900; color: var(--navy-primary); margin-bottom: 1.5rem;">Rp 6.5 Jt</p>
                <a href="#" style="display: inline-block; padding: 0.75rem 2rem; background: var(--navy-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 700;">Lihat Detail</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Show file name when selected
    function showFileName(input, targetId) {
        const target = document.getElementById(targetId);
        const wrapper = input.closest('.file-upload-wrapper');
        
        if (input.files && input.files[0]) {
            target.textContent = '✓ ' + input.files[0].name;
            wrapper.classList.add('has-file');
        } else {
            target.textContent = '';
            wrapper.classList.remove('has-file');
        }
    }

    // Toggle experience fields
    function toggleExperience(select) {
        const experienceFields = document.getElementById('experience-fields');
        if (select.value === 'yes') {
            experienceFields.style.display = 'block';
        } else {
            experienceFields.style.display = 'none';
        }
    }

    // File upload click handlers
    document.querySelectorAll('.file-upload-wrapper').forEach(wrapper => {
        wrapper.addEventListener('click', function(e) {
            if (e.target.tagName !== 'INPUT') {
                const input = this.querySelector('input[type="file"]');
                if (input) input.click();
            }
        });
    });

    // Form validation before submit
    document.querySelector('.application-form').addEventListener('submit', function(e) {
        const terms = document.getElementById('terms');
        const privacy = document.getElementById('privacy');
        
        if (!terms.checked || !privacy.checked) {
            e.preventDefault();
            alert('Anda harus menyetujui syarat dan ketentuan serta kebijakan privasi untuk melanjutkan.');
            return false;
        }

        // Check file sizes
        const fileInputs = document.querySelectorAll('input[type="file"][required]');
        let hasError = false;
        
        fileInputs.forEach(input => {
            if (input.files && input.files[0]) {
                const maxSize = input.id === 'cv-upload' || input.id === 'ijazah-upload' ? 2 * 1024 * 1024 : 1 * 1024 * 1024;
                if (input.files[0].size > maxSize) {
                    alert(`File ${input.files[0].name} terlalu besar. Maksimal ${maxSize / (1024 * 1024)}MB`);
                    hasError = true;
                }
            }
        });

        if (hasError) {
            e.preventDefault();
            return false;
        }

        // Show loading state
        const submitBtn = this.querySelector('.submit-button');
        submitBtn.disabled = true;
        submitBtn.textContent = '⏳ Mengirim Lamaran...';
    });

    // Share buttons functionality
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const url = window.location.href;
            const title = document.querySelector('.job-title-content h1').textContent;
            
            if (this.textContent.includes('💬')) {
                // WhatsApp
                window.open(`https://wa.me/?text=${encodeURIComponent(title + ' - ' + url)}`, '_blank');
            } else if (this.textContent.includes('f')) {
                // Facebook
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
            } else if (this.textContent.includes('🐦')) {
                // Twitter
                window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
            } else if (this.textContent.includes('🔗')) {
                // Copy link
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link berhasil disalin!');
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

    document.querySelectorAll('.content-card, .benefit-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
</script>
@endpush