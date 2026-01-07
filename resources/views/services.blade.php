@extends('layouts.app')

@section('title', 'Layanan Kami - PT. Bintara Mitra Andalan')
@section('meta_description', 'Berbagai layanan outsourcing profesional: Security Guard, Cleaning Service, Driver Service, Patrol & Monitoring, CCTV System, dan Security Consulting.')

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

        /* ========== SERVICES GRID ========== */
        .services-section {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
        }

        .service-card-large {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            min-height: 350px;
        }

        .service-card-large:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            border-color: var(--navy-primary);
        }

        .service-image {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .service-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(245, 158, 11, 0.2), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .service-card-large:hover .service-image::before {
            opacity: 1;
        }

        .service-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-header {
            margin-bottom: 1.5rem;
        }

        .service-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: var(--gray-100);
            color: var(--navy-primary);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .service-title {
            font-size: 2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .service-description {
            font-size: 1.05rem;
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .service-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .service-features li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .service-features li::before {
            content: '✓';
            width: 24px;
            height: 24px;
            background: var(--gold-accent);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .service-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 2px solid var(--gray-100);
        }

        .service-link {
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s;
        }

        .service-link:hover {
            gap: 1rem;
            color: var(--gold-accent);
        }

        .service-price {
            font-size: 0.9rem;
            color: var(--gray-600);
            font-weight: 600;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            padding: 5rem 2rem;
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
            max-width: 1000px;
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

        /* ========== METHODOLOGY SECTION ========== */
        .methodology-section {
            padding: 6rem 2rem;
            background: var(--gray-50);
        }

        .methodology-container {
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

        .methodology-steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            position: relative;
        }

        .methodology-steps::before {
            content: '';
            position: absolute;
            top: 50px;
            left: 10%;
            right: 10%;
            height: 3px;
            background: var(--gray-200);
            z-index: 0;
        }

        .method-step {
            background: var(--white);
            padding: 2.5rem 2rem;
            border-radius: 20px;
            text-align: center;
            border: 2px solid var(--gray-200);
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }

        .method-step:hover {
            transform: translateY(-10px);
            border-color: var(--navy-primary);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
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
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 30px rgba(10, 31, 68, 0.3);
        }

        .method-step h4 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 1rem;
        }

        .method-step p {
            color: var(--gray-600);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .methodology-steps {
                grid-template-columns: repeat(2, 1fr);
            }

            .methodology-steps::before {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .service-card-large {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .service-image {
                min-height: 250px;
            }

            .service-content {
                padding: 2rem;
            }

            .methodology-steps {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
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
                <span>Layanan</span>
            </div>
            <h1 class="page-title">Layanan Kami</h1>
            <p class="page-subtitle">
                Solusi outsourcing profesional untuk berbagai kebutuhan bisnis Anda
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-section">
        <div class="services-container">
            <div class="services-grid">
                <!-- Service 1: Security Guard -->
                <div class="service-card-large">
                    <div class="service-image">🛡️</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Security</span>
                            <h3 class="service-title">Security Guard Service</h3>
                            <p class="service-description">
                                Personel security bersertifikat Gada Pratama dengan pelatihan 6 tahap seleksi untuk menjaga
                                keamanan aset dan lingkungan bisnis Anda.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>Personel Tersertifikasi Gada Pratama</li>
                            <li>6 Tahap Seleksi Ketat</li>
                            <li>Monitoring 24/7 dengan Aplikasi</li>
                            <li>Laporan Digital Real-time</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'security-guard') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Mulai dari Rp 3.5 Jt/bulan</span>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Cleaning Service -->
                <div class="service-card-large">
                    <div class="service-image">🧹</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Cleaning</span>
                            <h3 class="service-title">Cleaning Service</h3>
                            <p class="service-description">
                                Layanan kebersihan profesional dengan peralatan modern dan metode yang efektif untuk menjaga
                                lingkungan kerja tetap bersih dan nyaman.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>Peralatan Modern & Lengkap</li>
                            <li>Produk Ramah Lingkungan</li>
                            <li>Jadwal Fleksibel</li>
                            <li>Supervisor Berpengalaman</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'cleaning-service') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Mulai dari Rp 2.8 Jt/bulan</span>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Driver Service -->
                <div class="service-card-large">
                    <div class="service-image">🚗</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Transportation</span>
                            <h3 class="service-title">Driver Service</h3>
                            <p class="service-description">
                                Driver profesional dengan SIM yang valid dan pengalaman mengemudi untuk mendukung mobilitas
                                operasional perusahaan Anda.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>SIM Valid & Berpengalaman</li>
                            <li>Pengetahuan Rute Lengkap</li>
                            <li>Kendaraan Terawat</li>
                            <li>Fleksibel & Disiplin</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'driver-service') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Mulai dari Rp 3.2 Jt/bulan</span>
                        </div>
                    </div>
                </div>

                <!-- Service 4: Patrol & Monitoring -->
                <div class="service-card-large">
                    <div class="service-image">🗺️</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Monitoring</span>
                            <h3 class="service-title">Patrol & Monitoring</h3>
                            <p class="service-description">
                                Sistem patroli dengan monitoring digital 24/7 dan laporan real-time untuk pengawasan yang
                                lebih efektif dan terukur.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>Aplikasi Turjawali Patrol</li>
                            <li>GPS Tracking Real-time</li>
                            <li>Laporan Digital Otomatis</li>
                            <li>Mobile Command Center</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'patrol-monitoring') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Hubungi kami</span>
                        </div>
                    </div>
                </div>

                <!-- Service 5: CCTV System -->
                <div class="service-card-large">
                    <div class="service-image">📹</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Technology</span>
                            <h3 class="service-title">CCTV & Security System</h3>
                            <p class="service-description">
                                Instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi untuk perlindungan
                                maksimal dan monitoring efektif.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>CCTV HD & IP Camera</li>
                            <li>Remote Viewing 24/7</li>
                            <li>Recording & Backup</li>
                            <li>Maintenance Berkala</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'cctv-system') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Custom package</span>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Security Consulting -->
                <div class="service-card-large">
                    <div class="service-image">💼</div>
                    <div class="service-content">
                        <div class="service-header">
                            <span class="service-category">Consulting</span>
                            <h3 class="service-title">Security Consulting</h3>
                            <p class="service-description">
                                Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko dan kebutuhan spesifik
                                bisnis Anda.
                            </p>
                        </div>
                        <ul class="service-features">
                            <li>Risk Assessment</li>
                            <li>Security Planning</li>
                            <li>SOP Development</li>
                            <li>Training & Audit</li>
                        </ul>
                        <div class="service-footer">
                            <a href="{{ route('services.show', 'security-consulting') }}" class="service-link">
                                Selengkapnya →
                            </a>
                            <span class="service-price">Project based</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Methodology Section -->
    <section class="methodology-section">
        <div class="methodology-container">
            <div class="section-header">
                <div class="section-badge">METODOLOGI KAMI</div>
                <h2 class="section-title">Proses Pengelolaan SDM</h2>
                <p class="section-description">
                    Sistem manajemen terintegrasi untuk memastikan kualitas layanan terbaik
                </p>
            </div>
            <div class="methodology-steps">
                <div class="method-step">
                    <div class="method-number">1</div>
                    <h4>Recruitment</h4>
                    <p>Seleksi ketat 6 tahap untuk mendapatkan kandidat terbaik dengan kualifikasi sesuai standar.</p>
                </div>
                <div class="method-step">
                    <div class="method-number">2</div>
                    <h4>Training</h4>
                    <p>Pelatihan intensif mencakup technical skill, soft skill, dan product knowledge client.</p>
                </div>
                <div class="method-step">
                    <div class="method-number">3</div>
                    <h4>Placement</h4>
                    <p>Penempatan personel sesuai kebutuhan dengan pembekalan SOP dan KAK yang jelas.</p>
                </div>
                <div class="method-step">
                    <div class="method-number">4</div>
                    <h4>Monitoring</h4>
                    <p>Pengawasan berkelanjutan dengan sistem digital dan pembinaan rutin untuk kualitas konsisten.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-container">
            <h2>Butuh Konsultasi Layanan?</h2>
            <p>Tim kami siap membantu Anda menemukan solusi outsourcing yang tepat untuk bisnis Anda</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-accent">
                    📋 Ajukan Penawaran
                </a>
                <a href="https://wa.me/62xxx" class="btn btn-primary" target="_blank">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer
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
            document.querySelectorAll('.service-card-large, .method-step').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });
        });
    </script>
@endpush