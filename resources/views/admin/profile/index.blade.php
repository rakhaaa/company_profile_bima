@extends('layouts.admin')

@section('title', 'Profil Perusahaan - Admin Panel')
@section('page-title', 'Profil Perusahaan')

@push('styles')
    <style>
        /* ========== PROFILE CONTAINER ========== */
        .profile-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* ========== TABS ========== */
        .profile-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--gray-200);
            overflow-x: auto;
            padding-bottom: 0;
        }

        .tab-btn {
            padding: 1rem 2rem;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            color: var(--gray-600);
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tab-btn:hover {
            color: var(--navy-primary);
        }

        .tab-btn.active {
            color: var(--navy-primary);
            border-bottom-color: var(--gold-accent);
        }

        /* ========== TAB CONTENT ========== */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========== FORM CARD ========== */
        .form-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .form-card-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--navy-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* ========== FORM ELEMENTS ========== */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-grid.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-weight: 700;
            color: var(--navy-primary);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label.required::after {
            content: '*';
            color: #ef4444;
        }

        .form-input,
        .form-textarea,
        .form-select {
            padding: 0.9rem 1.2rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 3px rgba(10, 31, 68, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-hint {
            font-size: 0.85rem;
            color: var(--gray-500);
        }

        /* Logo Upload */
        .logo-upload {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .logo-preview {
            width: 150px;
            height: 150px;
            border-radius: 12px;
            border: 2px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--gray-50);
        }

        .logo-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* ========== TEAM MEMBERS ========== */
        .team-list {
            display: grid;
            gap: 1rem;
        }

        .team-item {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            gap: 1.5rem;
            padding: 1.5rem;
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            align-items: center;
            transition: all 0.3s;
        }

        .team-item:hover {
            border-color: var(--navy-primary);
            background: var(--white);
        }

        .team-avatar {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 900;
        }

        .team-info h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.3rem;
        }

        .team-info p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .team-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* ========== CERTIFICATIONS ========== */
        .cert-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .cert-item {
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s;
            position: relative;
        }

        .cert-item:hover {
            border-color: var(--navy-primary);
            transform: translateY(-5px);
        }

        .cert-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cert-item h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.3rem;
        }

        .cert-item p {
            font-size: 0.85rem;
            color: var(--gray-600);
        }

        .cert-remove {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 30px;
            height: 30px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s;
        }

        .cert-item:hover .cert-remove {
            opacity: 1;
        }

        .cert-remove:hover {
            background: #dc2626;
            transform: scale(1.1);
        }

        /* ========== SOCIAL MEDIA INPUTS ========== */
        .social-input-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            background: var(--gray-100);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* ========== ACTION BUTTONS ========== */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid var(--gray-100);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--navy-primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10, 31, 68, 0.3);
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--gray-200);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-300);
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        /* ========== ALERT ========== */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 2px solid #10b981;
        }

        .alert-info {
            background: #dbeafe;
            color: #1e40af;
            border: 2px solid #3b82f6;
        }

        /* ========== TIMELINE EDITOR ========== */
        .timeline-editor {
            display: grid;
            gap: 1rem;
        }

        .timeline-entry {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            align-items: start;
        }

        .timeline-entry:hover {
            border-color: var(--navy-primary);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .logo-upload {
                flex-direction: column;
            }

            .team-item {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .team-avatar {
                margin: 0 auto;
            }

            .cert-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .timeline-entry {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="profile-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">🏢 Profil Perusahaan</h1>
            <p class="page-subtitle">Kelola informasi dan konten profil perusahaan untuk halaman "Tentang Kami"</p>
        </div>

        <!-- Success Alert (Hidden by default) -->
        <div class="alert alert-success" style="display: none;" id="successAlert">
            <span>✓</span>
            <span>Data berhasil disimpan!</span>
        </div>

        <!-- Tabs -->
        <div class="profile-tabs">
            <button class="tab-btn active" data-tab="company-info">
                <span>ℹ️</span>
                <span>Informasi Dasar</span>
            </button>
            <button class="tab-btn" data-tab="vision-mission">
                <span>🎯</span>
                <span>Visi & Misi</span>
            </button>
            <button class="tab-btn" data-tab="history">
                <span>📅</span>
                <span>Sejarah</span>
            </button>
            <button class="tab-btn" data-tab="team">
                <span>👥</span>
                <span>Tim Kami</span>
            </button>
            <button class="tab-btn" data-tab="certifications">
                <span>📜</span>
                <span>Sertifikasi</span>
            </button>
            <button class="tab-btn" data-tab="values">
                <span>⭐</span>
                <span>Nilai Perusahaan</span>
            </button>
        </div>

        <!-- Tab Content -->
        <form action="#" method="POST" enctype="multipart/form-data" id="profileForm">

            <!-- Company Info Tab -->
            <div class="tab-content active" id="company-info">
                <!-- Basic Information -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>🏢</span>
                            <span>Informasi Dasar Perusahaan</span>
                        </h2>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required">Nama Perusahaan</label>
                            <input type="text" name="company_name" class="form-input" value="PT. Bintara Mitra Andalan"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="tagline" class="form-input" value="Solusi Alih Daya Terpercaya"
                                placeholder="Slogan perusahaan">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tahun Berdiri</label>
                            <input type="number" name="founded_year" class="form-input" value="2015" min="1900" max="2100">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jumlah Personel Aktif</label>
                            <input type="number" name="total_personnel" class="form-input" value="500" min="0">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Logo Perusahaan</label>
                            <div class="logo-upload">
                                <div class="logo-preview">
                                    <span id="logoPlaceholder" style="color: var(--gray-400); font-size: 3rem;">🏢</span>
                                </div>
                                <div>
                                    <input type="file" id="logoInput" name="logo" class="file-input" accept="image/*"
                                        style="display: none;">
                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('logoInput').click()">
                                        📤 Upload Logo
                                    </button>
                                    <p class="form-hint">Format: PNG, JPG, SVG (Max: 2MB, Recommended: 500x500px)</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Deskripsi Perusahaan</label>
                            <textarea name="short_description" class="form-textarea"
                                rows="5">PT. Bintara Mitra Andalan adalah perusahaan penyedia jasa outsourcing profesional yang telah berpengalaman lebih dari 10 tahun dalam industri alih daya tenaga kerja.</textarea>
                            <span class="form-hint">Deskripsi ini akan ditampilkan di bagian intro halaman Tentang
                                Kami</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>📞</span>
                            <span>Kontak Informasi</span>
                        </h2>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required">Nomor Telepon</label>
                            <input type="tel" name="phone" class="form-input" value="+62 21 1234 5678" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Email</label>
                            <input type="email" name="email" class="form-input" value="info@bima.co.id" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">WhatsApp</label>
                            <input type="tel" name="whatsapp" class="form-input" value="+62 812 3456 7890"
                                placeholder="+62 xxx xxxx xxxx">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" class="form-input" value="https://bima.co.id"
                                placeholder="https://example.com">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label required">Alamat</label>
                            <textarea name="address" class="form-textarea"
                                required>Jl. Contoh No. 123, Jakarta Selatan 12345</textarea>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>🌐</span>
                            <span>Media Sosial</span>
                        </h2>
                    </div>

                    <div class="form-grid single">
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <div class="social-input-group">
                                <div class="social-icon">📘</div>
                                <input type="url" name="social_facebook" class="form-input" value=""
                                    placeholder="https://facebook.com/yourpage">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <div class="social-input-group">
                                <div class="social-icon">📷</div>
                                <input type="url" name="social_instagram" class="form-input" value=""
                                    placeholder="https://instagram.com/yourpage">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">LinkedIn</label>
                            <div class="social-input-group">
                                <div class="social-icon">💼</div>
                                <input type="url" name="social_linkedin" class="form-input" value=""
                                    placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Twitter</label>
                            <div class="social-input-group">
                                <div class="social-icon">🐦</div>
                                <input type="url" name="social_twitter" class="form-input" value=""
                                    placeholder="https://twitter.com/yourpage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision Mission Tab -->
            <div class="tab-content" id="vision-mission">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>🎯</span>
                            <span>Visi & Misi Perusahaan</span>
                        </h2>
                    </div>

                    <div class="alert alert-info">
                        <span>💡</span>
                        <span>Visi dan Misi akan ditampilkan di halaman Tentang Kami dengan layout card yang menarik</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Visi Perusahaan</label>
                        <textarea name="vision" class="form-textarea" rows="6"
                            required>Menjadi perusahaan penyedia jasa outsourcing terkemuka di Indonesia yang dikenal dengan profesionalisme, integritas, dan kualitas layanan yang unggul, serta memberikan kontribusi positif bagi perkembangan industri keamanan dan layanan pendukung bisnis nasional.</textarea>
                        <span class="form-hint">Jelaskan tujuan jangka panjang perusahaan</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Misi Perusahaan</label>
                        <textarea name="mission" class="form-textarea" rows="8"
                            required>Menyediakan solusi outsourcing berkualitas tinggi dengan personel terlatih dan tersertifikasi. Menerapkan sistem manajemen modern dan teknologi monitoring digital untuk transparansi dan efisiensi. Membangun kemitraan jangka panjang yang saling menguntungkan dengan klien dan memberikan kesempatan karir yang baik bagi personel.</textarea>
                        <span class="form-hint">Jelaskan langkah-langkah untuk mencapai visi (bisa dalam bentuk
                            poin-poin)</span>
                    </div>
                </div>
            </div>

            <!-- History Tab -->
            <div class="tab-content" id="history">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>📅</span>
                            <span>Timeline Sejarah Perusahaan</span>
                        </h2>
                        <button type="button" class="btn btn-primary" onclick="addTimelineEntry()">
                            ➕ Tambah Milestone
                        </button>
                    </div>

                    <div class="timeline-editor" id="timelineEditor">
                        <div class="timeline-entry">
                            <div>
                                <label class="form-label">Tahun</label>
                                <input type="number" name="timeline_year[]" class="form-input" value="2015" min="1900"
                                    max="2100">
                            </div>
                            <div>
                                <label class="form-label">Judul Milestone</label>
                                <input type="text" name="timeline_title[]" class="form-input" value="Pendirian Perusahaan">
                                <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                                <textarea name="timeline_description[]" class="form-textarea"
                                    rows="3">PT. Bintara Mitra Andalan resmi didirikan dan mendapatkan legalitas lengkap dari pemerintah untuk beroperasi sebagai penyedia jasa outsourcing.</textarea>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="removeTimelineEntry(this)">🗑️</button>
                            </div>
                        </div>

                        <div class="timeline-entry">
                            <div>
                                <label class="form-label">Tahun</label>
                                <input type="number" name="timeline_year[]" class="form-input" value="2017" min="1900"
                                    max="2100">
                            </div>
                            <div>
                                <label class="form-label">Judul Milestone</label>
                                <input type="text" name="timeline_title[]" class="form-input"
                                    value="Sertifikasi ISO Pertama">
                                <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                                <textarea name="timeline_description[]" class="form-textarea"
                                    rows="3">Mendapatkan sertifikasi ISO 9001 untuk Sistem Manajemen Mutu, menandai komitmen kami terhadap standar internasional.</textarea>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="removeTimelineEntry(this)">🗑️</button>
                            </div>
                        </div>

                        <div class="timeline-entry">
                            <div>
                                <label class="form-label">Tahun</label>
                                <input type="number" name="timeline_year[]" class="form-input" value="2025" min="1900"
                                    max="2100">
                            </div>
                            <div>
                                <label class="form-label">Judul Milestone</label>
                                <input type="text" name="timeline_title[]" class="form-input" value="Inovasi & Pertumbuhan">
                                <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                                <textarea name="timeline_description[]" class="form-textarea"
                                    rows="3">Terus berinovasi dengan teknologi terkini dan memperluas layanan untuk memenuhi kebutuhan bisnis yang semakin kompleks.</textarea>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="removeTimelineEntry(this)">🗑️</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Tab -->
            <div class="tab-content" id="team">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>👥</span>
                            <span>Tim Management</span>
                        </h2>
                        <button type="button" class="btn btn-primary" onclick="openTeamModal()">
                            ➕ Tambah Anggota Tim
                        </button>
                    </div>

                    <div class="team-list">
                        <div class="team-item">
                            <div class="team-avatar">ND</div>
                            <div class="team-info">
                                <h4>Nama Direktur</h4>
                                <p>Direktur Utama</p>
                            </div>
                            <div class="team-actions">
                                <button type="button" class="btn btn-secondary btn-sm">✏️ Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">🗑️</button>
                            </div>
                        </div>

                        <div class="team-item">
                            <div class="team-avatar">NM</div>
                            <div class="team-info">
                                <h4>Nama Manager</h4>
                                <p>Operations Manager</p>
                            </div>
                            <div class="team-actions">
                                <button type="button" class="btn btn-secondary btn-sm">✏️ Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">🗑️</button>
                            </div>
                        </div>

                        <div class="team-item">
                            <div class="team-avatar">NM</div>
                            <div class="team-info">
                                <h4>Nama Manager</h4>
                                <p>HR Manager</p>
                            </div>
                            <div class="team-actions">
                                <button type="button" class="btn btn-secondary btn-sm">✏️ Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">🗑️</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certifications Tab -->
            <div class="tab-content" id="certifications">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>📜</span>
                            <span>Legalitas & Sertifikasi</span>
                        </h2>
                        <button type="button" class="btn btn-primary" onclick="addCertification()">
                            ➕ Tambah Sertifikat
                        </button>
                    </div>

                    <div class="alert alert-info">
                        <span>💡</span>
                        <span>Sertifikasi akan ditampilkan dalam grid 4 kolom di halaman Tentang Kami</span>
                    </div>

                    <div class="cert-grid" id="certGrid">
                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">📜</div>
                            <h4>Akta Pendirian</h4>
                            <p>SK Kemenkumham</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">🏢</div>
                            <h4>NIB</h4>
                            <p>Berbasis Resiko</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">🎖️</div>
                            <h4>KTA ABUJAPI</h4>
                            <p>Anggota Resmi</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">✅</div>
                            <h4>ISO 9001</h4>
                            <p>Manajemen Mutu</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">⚡</div>
                            <h4>ISO 45001</h4>
                            <p>Manajemen K3</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">🌱</div>
                            <h4>ISO 14001</h4>
                            <p>Manajemen Lingkungan</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">🚔</div>
                            <h4>SIO Polda Jateng</h4>
                            <p>Surat Izin Operasional</p>
                        </div>

                        <div class="cert-item">
                            <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                            <div class="cert-icon">🚔</div>
                            <h4>SIO Polda Jatim</h4>
                            <p>Surat Izin Operasional</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Tab -->
            <div class="tab-content" id="values">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="form-card-title">
                            <span>⭐</span>
                            <span>Nilai-Nilai Perusahaan</span>
                        </h2>
                        <button type="button" class="btn btn-primary" onclick="addValue()">
                            ➕ Tambah Nilai
                        </button>
                    </div>

                    <div class="alert alert-info">
                        <span>💡</span>
                        <span>Nilai perusahaan akan ditampilkan dalam grid 3 kolom dengan background navy</span>
                    </div>

                    <div class="form-grid" id="valuesGrid">
                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="🎯" placeholder="🎯">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Integritas"
                                placeholder="Contoh: Integritas">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Berkomitmen untuk selalu jujur, transparan, dan bertanggung jawab dalam setiap aspek bisnis kami.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="⭐" placeholder="⭐">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Profesionalisme"
                                placeholder="Contoh: Profesionalisme">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Memberikan layanan berkualitas tinggi dengan standar profesional dan keunggulan operasional.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="🤝" placeholder="🤝">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Kemitraan"
                                placeholder="Contoh: Kemitraan">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Membangun hubungan jangka panjang yang saling menguntungkan dengan klien dan stakeholder.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="💡" placeholder="💡">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Inovasi"
                                placeholder="Contoh: Inovasi">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Terus berinovasi dan beradaptasi dengan teknologi terkini untuk meningkatkan kualitas layanan.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="🌟" placeholder="🌟">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Komitmen"
                                placeholder="Contoh: Komitmen">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Berkomitmen penuh terhadap kepuasan klien dan kesejahteraan personel kami.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon (Emoji)</label>
                            <input type="text" name="value_icon[]" class="form-input" value="🛡️" placeholder="🛡️">
                            <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                            <input type="text" name="value_title[]" class="form-input" value="Keamanan"
                                placeholder="Contoh: Keamanan">
                            <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                            <textarea name="value_description[]" class="form-textarea"
                                rows="3">Mengutamakan keselamatan dan keamanan dalam setiap operasional dan layanan yang kami berikan.</textarea>
                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;"
                                onclick="removeValue(this)">🗑️ Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='#'">
                    ← Batal
                </button>
                <button type="submit" class="btn btn-success">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Tab Switching
        document.addEventListener('DOMContentLoaded', () => {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetTab = btn.getAttribute('data-tab');

                    // Remove active class from all
                    tabBtns.forEach(b => b.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked
                    btn.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });

            // Logo Preview
            const logoInput = document.getElementById('logoInput');
            const logoPlaceholder = document.getElementById('logoPlaceholder');

            logoInput?.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        logoPlaceholder.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: contain;">`;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Form Submit
            document.getElementById('profileForm').addEventListener('submit', function (e) {
                e.preventDefault();

                // Show success alert
                const alert = document.getElementById('successAlert');
                alert.style.display = 'flex';

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });

                // Hide alert after 3 seconds
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            });
        });

        // Add Timeline Entry
        function addTimelineEntry() {
            const timeline = document.getElementById('timelineEditor');
            const newEntry = document.createElement('div');
            newEntry.className = 'timeline-entry';
            newEntry.innerHTML = `
                    <div>
                        <label class="form-label">Tahun</label>
                        <input type="number" name="timeline_year[]" class="form-input" value="${new Date().getFullYear()}" min="1900" max="2100">
                    </div>
                    <div>
                        <label class="form-label">Judul Milestone</label>
                        <input type="text" name="timeline_title[]" class="form-input" placeholder="Contoh: Pencapaian Besar">
                        <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                        <textarea name="timeline_description[]" class="form-textarea" rows="3" placeholder="Deskripsi milestone..."></textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeTimelineEntry(this)">🗑️</button>
                    </div>
                `;
            timeline.appendChild(newEntry);

            // Animate
            newEntry.style.opacity = '0';
            newEntry.style.transform = 'translateY(20px)';
            setTimeout(() => {
                newEntry.style.transition = 'all 0.3s';
                newEntry.style.opacity = '1';
                newEntry.style.transform = 'translateY(0)';
            }, 10);
        }

        // Remove Timeline Entry
        function removeTimelineEntry(btn) {
            const entry = btn.closest('.timeline-entry');
            if (confirm('Hapus milestone ini?')) {
                entry.style.opacity = '0';
                entry.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    entry.remove();
                }, 300);
            }
        }

        // Add Certification
        function addCertification() {
            const icon = prompt('Masukkan emoji icon (contoh: 📜, 🏆, ✅):');
            const title = prompt('Nama Sertifikat:');
            const desc = prompt('Deskripsi singkat:');

            if (icon && title) {
                const certGrid = document.getElementById('certGrid');
                const newCert = document.createElement('div');
                newCert.className = 'cert-item';
                newCert.innerHTML = `
                        <button type="button" class="cert-remove" onclick="removeCert(this)">×</button>
                        <div class="cert-icon">${icon}</div>
                        <h4>${title}</h4>
                        <p>${desc || '-'}</p>
                    `;
                certGrid.appendChild(newCert);

                // Animate
                newCert.style.opacity = '0';
                newCert.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    newCert.style.transition = 'all 0.3s';
                    newCert.style.opacity = '1';
                    newCert.style.transform = 'scale(1)';
                }, 10);
            }
        }

        // Remove Certification
        function removeCert(btn) {
            const cert = btn.closest('.cert-item');
            if (confirm('Hapus sertifikat ini?')) {
                cert.style.opacity = '0';
                cert.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    cert.remove();
                }, 300);
            }
        }

        // Add Value
        function addValue() {
            const valuesGrid = document.getElementById('valuesGrid');
            const newValue = document.createElement('div');
            newValue.className = 'form-group';
            newValue.innerHTML = `
                    <label class="form-label">Icon (Emoji)</label>
                    <input type="text" name="value_icon[]" class="form-input" placeholder="🎯">
                    <label class="form-label" style="margin-top: 1rem;">Judul Nilai</label>
                    <input type="text" name="value_title[]" class="form-input" placeholder="Contoh: Integritas">
                    <label class="form-label" style="margin-top: 1rem;">Deskripsi</label>
                    <textarea name="value_description[]" class="form-textarea" rows="3" placeholder="Deskripsi nilai..."></textarea>
                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0.5rem; width: 100%;" onclick="removeValue(this)">🗑️ Hapus</button>
                `;
            valuesGrid.appendChild(newValue);

            // Animate
            newValue.style.opacity = '0';
            newValue.style.transform = 'translateY(20px)';
            setTimeout(() => {
                newValue.style.transition = 'all 0.3s';
                newValue.style.opacity = '1';
                newValue.style.transform = 'translateY(0)';
            }, 10);
        }

        // Remove Value
        function removeValue(btn) {
            const value = btn.closest('.form-group');
            if (confirm('Hapus nilai ini?')) {
                value.style.opacity = '0';
                value.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    value.remove();
                }, 300);
            }
        }

        // Open Team Modal (placeholder)
        function openTeamModal() {
            alert('Fitur tambah anggota tim akan membuka modal form.\n\nForm akan berisi:\n- Nama\n- Posisi\n- Upload Foto\n- Email\n- LinkedIn URL');
        }
    </script>
@endpush