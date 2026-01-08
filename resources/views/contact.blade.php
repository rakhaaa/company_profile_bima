@extends('layouts.app')

@section('title', 'Hubungi Kami - PT. Bintara Mitra Andalan')
@section('meta_description', 'Hubungi PT. Bintara Mitra Andalan untuk konsultasi keamanan dan ajukan penawaran. Kami siap melayani Anda 24/7.')

@push('styles')
    <style>
        /* ========== PAGE HEADER ========== */
        .contact-header {
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            padding: 8rem 2rem 5rem;
            position: relative;
            overflow: hidden;
        }

        .contact-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%);
        }

        .contact-header-content {
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

        .contact-header h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .contact-header p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========== CONTACT METHODS ========== */
        .contact-methods {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .contact-container {
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

        .methods-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .method-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .method-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            border-color: var(--navy-primary);
        }

        .method-icon {
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

        .method-card:hover .method-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .method-card h3 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1rem;
        }

        .method-card p {
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 0.75rem;
        }

        .method-link {
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            transition: color 0.3s;
        }

        .method-link:hover {
            color: var(--gold-accent);
        }

        /* ========== BRANCH OFFICES ========== */
        .branch-offices {
            background: var(--gray-50);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 4rem;
        }

        .branch-offices h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 2rem;
            text-align: center;
        }

        .branches-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .branch-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.3s;
        }

        .branch-card:hover {
            border-color: var(--navy-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .branch-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .branch-icon {
            width: 50px;
            height: 50px;
            background: var(--navy-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
        }

        .branch-header h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--navy-primary);
        }

        .branch-info {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .branch-detail {
            display: flex;
            gap: 0.75rem;
            font-size: 0.95rem;
            color: var(--gray-600);
        }

        .branch-detail strong {
            min-width: 60px;
            color: var(--navy-primary);
        }

        /* ========== RFQ FORM ========== */
        .rfq-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .rfq-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .rfq-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
        }

        .rfq-info {
            background: var(--gray-50);
            border-radius: 20px;
            padding: 3rem;
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .rfq-info h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1.5rem;
        }

        .rfq-info p {
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .rfq-benefits {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .benefit-item {
            display: flex;
            align-items: start;
            gap: 1rem;
        }

        .benefit-icon {
            width: 40px;
            height: 40px;
            background: var(--navy-primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .benefit-text {
            flex: 1;
        }

        .benefit-text strong {
            display: block;
            color: var(--navy-primary);
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .benefit-text span {
            color: var(--gray-600);
            font-size: 0.95rem;
        }

        /* ========== FORM STYLES ========== */
        .rfq-form {
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

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .checkbox-item:hover {
            border-color: var(--navy-primary);
            background: var(--white);
        }

        .checkbox-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checkbox-item input[type="checkbox"]:checked+label {
            color: var(--navy-primary);
            font-weight: 700;
        }

        .checkbox-item label {
            cursor: pointer;
            color: var(--gray-700);
            font-weight: 600;
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

        .privacy-checkbox {
            display: flex;
            gap: 1rem;
            align-items: start;
        }

        .privacy-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        .privacy-checkbox label {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
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

        /* ========== GOOGLE MAPS ========== */
        .map-section {
            padding: 6rem 2rem;
            background: var(--gray-50);
        }

        .map-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .map-wrapper {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .map-placeholder {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
            color: var(--gray-600);
        }

        .map-placeholder-icon {
            font-size: 5rem;
        }

        .map-placeholder-text {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .map-link {
            padding: 1rem 2rem;
            background: var(--navy-primary);
            color: var(--white);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .map-link:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
        }

        /* ========== SOCIAL MEDIA ========== */
        .social-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .social-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .social-contacts {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 3rem;
            flex-wrap: wrap;
        }

        .social-link-contact {
            width: 100px;
            height: 100px;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s;
            color: var(--gray-700);
        }

        .social-link-contact:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--navy-primary);
        }

        .social-link-contact.facebook:hover {
            background: #1877F2;
            color: white;
            border-color: #1877F2;
        }

        .social-link-contact.instagram:hover {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
            color: white;
            border-color: #DD2A7B;
        }

        .social-link-contact.linkedin:hover {
            background: #0A66C2;
            color: white;
            border-color: #0A66C2;
        }

        .social-link-contact.youtube:hover {
            background: #FF0000;
            color: white;
            border-color: #FF0000;
        }

        .social-icon {
            font-size: 2.5rem;
        }

        .social-name {
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .methods-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .branches-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .rfq-grid {
                grid-template-columns: 1fr;
            }

            .rfq-info {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .contact-header h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .methods-grid {
                grid-template-columns: 1fr;
            }

            .branches-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }

            .rfq-form {
                padding: 2rem;
            }

            .social-contacts {
                gap: 1rem;
            }

            .social-link-contact {
                width: 80px;
                height: 80px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Contact Header -->
    <section class="contact-header">
        <div class="contact-header-content">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Hubungi Kami</span>
            </div>
            <h1>Hubungi Kami</h1>
            <p>
                Kami siap membantu Anda 24/7. Konsultasikan kebutuhan keamanan bisnis Anda dengan tim profesional kami.
            </p>
        </div>
    </section>

    <!-- Contact Methods -->
    <section class="contact-methods">
        <div class="contact-container">
            <div class="section-header">
                <div class="section-badge">INFORMASI KONTAK</div>
                <h2 class="section-title">Cara Menghubungi Kami</h2>
                <p class="section-description">
                    Pilih metode komunikasi yang paling nyaman untuk Anda
                </p>
            </div>

            <div class="methods-grid">
                <div class="method-card" onclick="window.location.href='#map'">
                    <div class="method-icon">📍</div>
                    <h3>Kantor Pusat</h3>
                    <p>Semarang, Indonesia</p>
                    <a href="#map" class="method-link">Lihat Peta →</a>
                </div>

                <div class="method-card" onclick="window.location.href='tel:+6287823217787'">
                    <div class="method-icon">📞</div>
                    <h3>Telepon</h3>
                    <p>+62 878 2321 7787<br>Senin - Jumat : 09.00-17.00</p>
                    <a href="tel:+62xxx" class="method-link">Hubungi Sekarang →</a>
                </div>

                <div class="method-card" onclick="window.location.href='mailto:info@bintaramitraandalan.com'">
                    <div class="method-icon">✉️</div>
                    <h3>Email</h3>
                    <p>info@bintaramitraandalan.com<br>Respon dalam 24 jam</p>
                    <a href="mailto:info@bintaramitraandalan.com" class="method-link">Kirim Email →</a>
                </div>

                <div class="method-card" onclick="window.open('https://wa.me/6287823217787', '_blank')">
                    <div class="method-icon">💬</div>
                    <h3>WhatsApp</h3>
                    <p>+62 878 2321 7787<br>Chat langsung dengan kami</p>
                    <a href="https://wa.me/6287823217787" target="_blank" class="method-link">Chat Sekarang →</a>
                </div>
            </div>

            <!-- Branch Offices -->
            <div class="branch-offices">
                <h3>Kantor Cabang</h3>
                <div class="branches-grid">
                    <div class="branch-card">
                        <div class="branch-header">
                            <div class="branch-icon">🏢</div>
                            <h4>Kantor Semarang</h4>
                        </div>
                        <div class="branch-info">
                            <div class="branch-detail">
                                <strong>Alamat:</strong>
                                <span>Jl. Pemuda No. 123, Semarang</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Telepon:</strong>
                                <span>+62 xxx xxxx xxxx</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Email:</strong>
                                <span>semarang@bimaguard.com</span>
                            </div>
                        </div>
                    </div>

                    <div class="branch-card">
                        <div class="branch-header">
                            <div class="branch-icon">🏢</div>
                            <h4>Kantor Surabaya</h4>
                        </div>
                        <div class="branch-info">
                            <div class="branch-detail">
                                <strong>Alamat:</strong>
                                <span>Jl. Basuki Rahmat No. 456, Surabaya</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Telepon:</strong>
                                <span>+62 xxx xxxx xxxx</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Email:</strong>
                                <span>surabaya@bimaguard.com</span>
                            </div>
                        </div>
                    </div>

                    <div class="branch-card">
                        <div class="branch-header">
                            <div class="branch-icon">🏢</div>
                            <h4>Kantor Bandung</h4>
                        </div>
                        <div class="branch-info">
                            <div class="branch-detail">
                                <strong>Alamat:</strong>
                                <span>Jl. Asia Afrika No. 789, Bandung</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Telepon:</strong>
                                <span>+62 xxx xxxx xxxx</span>
                            </div>
                            <div class="branch-detail">
                                <strong>Email:</strong>
                                <span>bandung@bimaguard.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RFQ Form -->
    <section class="rfq-section">
        <div class="rfq-container">
            <div class="section-header">
                <div class="section-badge">REQUEST FOR QUOTATION</div>
                <h2 class="section-title">Ajukan Penawaran</h2>
                <p class="section-description">
                    Isi form di bawah ini dan tim kami akan menghubungi Anda dalam 24 jam
                </p>
            </div>

            <div class="rfq-grid">
                <!-- RFQ Info Sidebar -->
                <div class="rfq-info">
                    <h3>Mengapa Memilih Kami?</h3>
                    <p>
                        Dengan pengalaman lebih dari 10 tahun, kami telah melayani 200+ perusahaan di berbagai industri
                        dengan standar profesional yang sama.
                    </p>
                    <div class="rfq-benefits">
                        <div class="benefit-item">
                            <div class="benefit-icon">✓</div>
                            <div class="benefit-text">
                                <strong>Konsultasi Gratis</strong>
                                <span>Tim ahli kami siap memberikan konsultasi tanpa biaya</span>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">✓</div>
                            <div class="benefit-text">
                                <strong>Penawaran Custom</strong>
                                <span>Solusi disesuaikan dengan kebutuhan spesifik Anda</span>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">✓</div>
                            <div class="benefit-text">
                                <strong>Response Cepat</strong>
                                <span>Kami merespon dalam waktu maksimal 24 jam</span>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">✓</div>
                            <div class="benefit-text">
                                <strong>Harga Kompetitif</strong>
                                <span>Penawaran terbaik dengan kualitas terjamin</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RFQ Form -->
                <form action="{{ route('contact.submit') }}" method="POST" class="rfq-form">
                    @csrf

                    <div class="form-note">
                        <strong>📌 Informasi:</strong> Semua data yang Anda berikan akan dijaga kerahasiaannya dan hanya
                        digunakan untuk keperluan penawaran layanan.
                    </div>

                    <!-- Company Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Informasi Perusahaan</h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Perusahaan <span class="required">*</span></label>
                                <input type="text" name="company_name" class="form-input"
                                    placeholder="PT. Contoh Perusahaan" required>
                            </div>
                            <div class="form-group">
                                <label>Industri/Bidang Usaha <span class="required">*</span></label>
                                <select name="industry" class="form-input" required>
                                    <option value="">Pilih industri</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="retail">Retail & Mall</option>
                                    <option value="banking">Banking & Finance</option>
                                    <option value="education">Education</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="hospitality">Hospitality</option>
                                    <option value="government">Government</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Kontak Person <span class="required">*</span></label>
                                <input type="text" name="contact_person" class="form-input" placeholder="Nama lengkap Anda"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="position" class="form-input" placeholder="contoh: General Manager">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="email" class="form-input" placeholder="email@perusahaan.com"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon/WhatsApp <span class="required">*</span></label>
                                <input type="tel" name="phone" class="form-input" placeholder="08xxxxxxxxxx" required>
                            </div>
                        </div>
                    </div>

                    <!-- Service Required -->
                    <div class="form-section">
                        <h3 class="form-section-title">Layanan yang Dibutuhkan</h3>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label>Pilih Layanan <span class="required">*</span></label>
                            <div class="checkbox-group">
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-security" name="services[]" value="security">
                                    <label for="service-security">Security Guard</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-cleaning" name="services[]" value="cleaning">
                                    <label for="service-cleaning">Cleaning Service</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-driver" name="services[]" value="driver">
                                    <label for="service-driver">Driver Service</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-patrol" name="services[]" value="patrol">
                                    <label for="service-patrol">Patrol & Monitoring</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-cctv" name="services[]" value="cctv">
                                    <label for="service-cctv">CCTV System</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="service-consulting" name="services[]" value="consulting">
                                    <label for="service-consulting">Security Consulting</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Jumlah Personel Dibutuhkan</label>
                                <input type="number" name="personnel_count" class="form-input" placeholder="contoh: 10"
                                    min="1">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Penempatan <span class="required">*</span></label>
                                <input type="text" name="location" class="form-input" placeholder="Kota/Kabupaten" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Perkiraan Waktu Mulai</label>
                                <input type="date" name="start_date" class="form-input">
                            </div>
                            <div class="form-group">
                                <label>Durasi Kontrak</label>
                                <select name="contract_duration" class="form-input">
                                    <option value="">Pilih durasi</option>
                                    <option value="3-months">3 Bulan</option>
                                    <option value="6-months">6 Bulan</option>
                                    <option value="1-year">1 Tahun</option>
                                    <option value="2-years">2 Tahun</option>
                                    <option value="flexible">Fleksibel</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Informasi Tambahan</h3>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label>Deskripsi Proyek/Kebutuhan <span class="required">*</span></label>
                            <textarea name="project_description" class="form-input"
                                placeholder="Jelaskan secara detail kebutuhan keamanan Anda, area yang perlu dijaga, jam operasional, dan informasi penting lainnya..."
                                required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Estimasi Budget (Opsional)</label>
                                <select name="budget_range" class="form-input">
                                    <option value="">Pilih range budget</option>
                                    <option value="under-10m">
                                        < Rp 10 Juta/bulan</option>
                                    <option value="10-25m">Rp 10 - 25 Juta/bulan</option>
                                    <option value="25-50m">Rp 25 - 50 Juta/bulan</option>
                                    <option value="50-100m">Rp 50 - 100 Juta/bulan</option>
                                    <option value="above-100m">> Rp 100 Juta/bulan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Metode Kontak Preferensi</label>
                                <select name="preferred_contact" class="form-input">
                                    <option value="phone">Telepon</option>
                                    <option value="whatsapp">WhatsApp</option>
                                    <option value="email">Email</option>
                                    <option value="meeting">Meeting Langsung</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <div class="submit-section">
                        <div class="privacy-checkbox">
                            <input type="checkbox" id="privacy" name="privacy" required>
                            <label for="privacy">
                                Saya telah membaca dan menyetujui <a href="#"
                                    style="color: var(--navy-primary); font-weight: 700;">Kebijakan Privasi</a> dan bersedia
                                dihubungi oleh tim PT. Bintara Mitra Andalan terkait penawaran layanan ini.
                            </label>
                        </div>

                        <button type="submit" class="submit-button">
                            <span>📤</span>
                            <span>Kirim Permintaan Penawaran</span>
                        </button>

                        <p style="text-align: center; color: var(--gray-600); font-size: 0.95rem; margin: 0;">
                            Tim kami akan menghubungi Anda dalam waktu maksimal 24 jam kerja untuk memberikan penawaran
                            terbaik.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <section class="map-section" id="map">
        <div class="map-container">
            <div class="section-header">
                <div class="section-badge">LOKASI KAMI</div>
                <h2 class="section-title">Temukan Kami di Peta</h2>
                <p class="section-description">
                    Kunjungi kantor kami atau hubungi untuk membuat janji temu
                </p>
            </div>

            <div class="map-wrapper">
                <!-- Replace this with actual Google Maps embed -->
                <div class="map-placeholder">
                    <div class="map-placeholder-icon">🗺️</div>
                    <div class="map-placeholder-text">Google Maps Integration</div>
                    <p style="color: var(--gray-600); margin-bottom: 1.5rem;">
                        Kantor Pusat: PT BINTARA MITRA ANDALAN, Jl. Kesatrian No.K9, Jatingaleh, Kec. Candisari, Kota
                        Semarang, Jawa Tengah 50254
                    </p>
                    <a href="https://maps.app.goo.gl/ASGgv8U6QGG1M3jH9" target="_blank" class="map-link">
                        📍 Buka di Google Maps
                    </a>
                </div>

                <!-- Actual Google Maps Embed (uncomment when ready) -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8485903762517!2d110.425134!3d-7.027076999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708bd435689af1%3A0x4b9b2e89b19fb0e7!2sPT%20BINTARA%20MITRA%20ANDALAN!5e0!3m2!1sen!2sid!4v1767839753867!5m2!1sen!2sid"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Social Media -->
    <section class="social-section">
        <div class="social-container">
            <div class="section-header">
                <div class="section-badge">IKUTI KAMI</div>
                <h2 class="section-title">Terhubung di Media Sosial</h2>
                <p class="section-description">
                    Ikuti perkembangan terbaru dan dapatkan tips keamanan dari kami
                </p>
            </div>

            <div class="social-contacts">
                <a href="https://facebook.com/bimaguard" target="_blank" class="social-link-contact facebook">
                    <div class="social-icon">f</div>
                    <div class="social-name">Facebook</div>
                </a>

                <a href="https://instagram.com/bimaguard" target="_blank" class="social-link-contact instagram">
                    <div class="social-icon">📷</div>
                    <div class="social-name">Instagram</div>
                </a>

                <a href="https://linkedin.com/company/bimaguard" target="_blank" class="social-link-contact linkedin">
                    <div class="social-icon">in</div>
                    <div class="social-name">LinkedIn</div>
                </a>

                <a href="https://youtube.com/@bimaguard" target="_blank" class="social-link-contact youtube">
                    <div class="social-icon">▶</div>
                    <div class="social-name">YouTube</div>
                </a>

                <a href="https://twitter.com/bimaguard" target="_blank" class="social-link-contact">
                    <div class="social-icon">🐦</div>
                    <div class="social-name">Twitter</div>
                </a>

                <a href="https://wa.me/62xxx" target="_blank" class="social-link-contact"
                    style="background: #25D366; color: white; border-color: #25D366;">
                    <div class="social-icon">💬</div>
                    <div class="social-name">WhatsApp</div>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section
        style="padding: 6rem 2rem; background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%); position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: -50%; right: -10%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, transparent 70%);">
        </div>
        <div style="max-width: 900px; margin: 0 auto; text-align: center; position: relative; z-index: 1; color: white;">
            <h2 style="font-size: 3rem; font-weight: 900; margin-bottom: 1.5rem;">Butuh Bantuan Segera?</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9;">
                Tim support kami siap membantu Anda 24/7. Hubungi kami melalui telepon atau WhatsApp untuk respon cepat.
            </p>
            <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="tel:+62xxx"
                    style="padding: 1.25rem 2.5rem; background: var(--gold-accent); color: white; border: none; border-radius: 12px; font-weight: 700; font-size: 1.05rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.75rem; transition: all 0.3s;">
                    📞 Telepon Sekarang
                </a>
                <a href="https://wa.me/62xxx" target="_blank"
                    style="padding: 1.25rem 2.5rem; background: transparent; color: white; border: 2px solid white; border-radius: 12px; font-weight: 700; font-size: 1.05rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.75rem; transition: all 0.3s;">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Form validation
            const form = document.querySelector('.rfq-form');
            const submitButton = document.querySelector('.submit-button');

            // Check if at least one service is selected
            form.addEventListener('submit', function (e) {
                const serviceCheckboxes = document.querySelectorAll('input[name="services[]"]');
                const isAnyChecked = Array.from(serviceCheckboxes).some(cb => cb.checked);

                if (!isAnyChecked) {
                    e.preventDefault();
                    alert('Silakan pilih minimal satu layanan yang dibutuhkan.');
                    return false;
                }

                const privacy = document.getElementById('privacy');
                if (!privacy.checked) {
                    e.preventDefault();
                    alert('Anda harus menyetujui kebijakan privasi untuk melanjutkan.');
                    return false;
                }

                // Show loading state
                submitButton.disabled = true;
                submitButton.innerHTML = '<span>⏳</span><span>Mengirim...</span>';
            });

            // Smooth scroll for internal links
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
            document.querySelectorAll('.method-card, .branch-card, .benefit-item, .social-link-contact').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });

            // Method card click handlers
            document.querySelectorAll('.method-card').forEach(card => {
                card.style.cursor = 'pointer';
            });

            // Auto-fill today's date for start date
            const startDateInput = document.querySelector('input[name="start_date"]');
            if (startDateInput) {
                const today = new Date();
                const nextWeek = new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000);
                const formattedDate = nextWeek.toISOString().split('T')[0];
                startDateInput.min = formattedDate;
            }

            // Service checkbox visual feedback
            document.querySelectorAll('.checkbox-item input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const item = this.closest('.checkbox-item');
                    if (this.checked) {
                        item.style.borderColor = 'var(--navy-primary)';
                        item.style.background = 'var(--white)';
                    } else {
                        item.style.borderColor = 'var(--gray-200)';
                        item.style.background = 'var(--gray-50)';
                    }
                });
            });
        });
    </script>
@endpush