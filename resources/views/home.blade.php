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
        @foreach($heroSlides as $index => $slide)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                style="background-image: url('{{ $slide->background_image_url ?? "data:image/svg+xml,%3Csvg..." }}'); background-color: {{ $slide->background_color }};">
                <div class="hero-content">
                    @if($slide->badge_icon || $slide->badge_text)
                        <div class="hero-badge">
                            @if($slide->badge_icon)<span>{{ $slide->badge_icon }}</span>@endif
                            @if($slide->badge_text)<span>{{ $slide->badge_text }}</span>@endif
                        </div>
                    @endif
                    <h1 class="hero-title">
                        {{ $slide->title }}<br>
                        @if($slide->highlight_text)
                            <span class="hero-highlight">{{ $slide->highlight_text }}</span>
                        @endif
                    </h1>
                    <p class="hero-description">{{ $slide->description }}</p>
                    <div class="hero-actions">
                        @if($slide->primary_button_text && $slide->primary_button_link)
                            <a href="{{ $slide->primary_button_link }}" class="btn btn-accent">
                                {{ $slide->primary_button_text }}
                            </a>
                        @endif
                        @if($slide->secondary_button_text && $slide->secondary_button_link)
                            <a href="{{ $slide->secondary_button_link }}" class="btn btn-primary">
                                {{ $slide->secondary_button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="slider-nav">
            @foreach($heroSlides as $index => $slide)
                <div class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
            @endforeach
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            @foreach($stats as $stat)
                <div class="stat-item">
                    <div class="stat-icon">{{ $stat->icon }}</div>
                    <span class="stat-number" data-target="{{ $stat->number }}">0</span>
                    <div class="stat-label">{{ $stat->label }}</div>
                </div>
            @endforeach
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
            @foreach($services as $service)
                <div class="service-card">
                    <div class="service-icon">{{ $service->icon }}</div>
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-description">{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="service-link">Selengkapnya →</a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Clients Section -->
    <section class="clients-section">
        <div class="clients-container">
            <div class="clients-title">Dipercaya Oleh Perusahaan Terkemuka</div>
            <div class="clients-grid">
                @foreach($clients as $client)
                    <div class="client-logo">
                        @if($client->logo_url)
                            <img src="{{ $client->logo_url }}" alt="{{ $client->name }}">
                        @else
                            {{ $client->name }}
                        @endif
                    </div>
                @endforeach
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
                    @foreach($whyFeatures as $feature)
                        <div class="why-feature">
                            <div class="why-feature-icon">{{ $feature->icon }}</div>
                            <div class="why-feature-content">
                                <h4>{{ $feature->title }}</h4>
                                <p>{{ $feature->description }}</p>
                            </div>
                        </div>
                    @endforeach
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