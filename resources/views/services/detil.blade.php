@extends('layouts.app')

@section('title', $service->title . ' - PT. Bintara Mitra Andalan')
@section('meta_description', $service->description)

@push('styles')
<style>
    .service-detail-header {
        background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
        padding: 8rem 2rem 5rem;
        color: var(--white);
    }

    .service-detail-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .service-icon-large {
        font-size: 5rem;
        margin-bottom: 2rem;
    }

    .service-detail-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
        padding: 4rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .detail-card {
        background: var(--white);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .detail-card h3 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--navy-primary);
        margin-bottom: 1.5rem;
    }

    .feature-list {
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        display: flex;
        align-items: start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .feature-list li::before {
        content: '✓';
        width: 30px;
        height: 30px;
        background: var(--gold-accent);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        flex-shrink: 0;
    }

    .sidebar-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        position: sticky;
        top: 100px;
    }

    .price-tag {
        background: var(--gold-accent);
        color: var(--white);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 2rem;
    }

    .price-tag h4 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }

    .price-tag .price {
        font-size: 2rem;
        font-weight: 900;
    }

    @media (max-width: 768px) {
        .service-detail-grid {
            grid-template-columns: 1fr;
        }

        .sidebar-card {
            position: static;
        }
    }
</style>
@endpush

@section('content')
<!-- Service Header -->
<section class="service-detail-header">
    <div class="service-detail-content text-center">
        <div class="breadcrumb" style="justify-content: center;">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('services') }}">Layanan</a>
            <span>/</span>
            <span>{{ $service->title }}</span>
        </div>
        <div class="service-icon-large">{{ $service->icon }}</div>
        <span class="service-category" style="background: rgba(255,255,255,0.2); color: white;">{{ $service->category }}</span>
        <h1 class="page-title">{{ $service->title }}</h1>
        <p class="page-subtitle">{{ $service->description }}</p>
    </div>
</section>

<!-- Service Detail Content -->
<section class="service-detail-grid">
    <div>
        <!-- Full Description -->
        <div class="detail-card mb-4">
            <h3>Tentang Layanan</h3>
            <p style="color: var(--gray-600); line-height: 1.8; font-size: 1.05rem;">
                {{ $service->full_description }}
            </p>
        </div>

        <!-- Benefits -->
        @if($service->benefits && count($service->benefits) > 0)
        <div class="detail-card mb-4">
            <h3>Keunggulan Layanan</h3>
            <ul class="feature-list">
                @foreach($service->benefits as $benefit)
                <li>
                    <span>{{ $benefit }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Requirements -->
        @if($service->requirements && count($service->requirements) > 0)
        <div class="detail-card mb-4">
            <h3>Yang Perlu Anda Siapkan</h3>
            <ul class="feature-list">
                @foreach($service->requirements as $requirement)
                <li>
                    <span>{{ $requirement }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Process -->
        @if($service->process_description)
        <div class="detail-card">
            <h3>Proses Layanan</h3>
            <p style="color: var(--gray-600); line-height: 1.8;">
                {{ $service->process_description }}
            </p>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div>
        <div class="sidebar-card">
            @if($service->price_label)
            <div class="price-tag">
                <h4>Harga</h4>
                <div class="price">{{ $service->price_label }}</div>
            </div>
            @endif

            <h4 style="margin-bottom: 1.5rem; color: var(--navy-primary);">Fitur Utama</h4>
            @if($service->features && count($service->features) > 0)
            <ul style="list-style: none; padding: 0; margin-bottom: 2rem;">
                @foreach($service->features as $feature)
                <li style="padding: 0.75rem 0; color: var(--gray-700); display: flex; align-items: center; gap: 0.75rem;">
                    <span style="color: var(--gold-accent);">✓</span>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
            @endif

            <a href="{{ route('contact') }}" class="btn btn-accent" style="width: 100%; justify-content: center;">
                📋 Ajukan Penawaran
            </a>
            <a href="https://wa.me/62xxx" class="btn btn-primary mt-2" style="width: 100%; justify-content: center;" target="_blank">
                💬 Chat WhatsApp
            </a>
        </div>
    </div>
</section>

<!-- Related Services -->
@if($relatedServices->count() > 0)
<section style="padding: 4rem 2rem; background: var(--gray-50);">
    <div style="max-width: 1400px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 900; color: var(--navy-primary); margin-bottom: 3rem;">
            Layanan Lainnya
        </h2>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            @foreach($relatedServices as $related)
            <div class="service-card" style="background: white; border: 2px solid var(--gray-200); border-radius: 20px; padding: 2rem; text-align: center; transition: all 0.3s;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">{{ $related->icon }}</div>
                <h4 style="font-size: 1.3rem; font-weight: 700; color: var(--navy-primary); margin-bottom: 1rem;">
                    {{ $related->title }}
                </h4>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem; line-height: 1.6;">
                    {{ Str::limit($related->description, 100) }}
                </p>
                <a href="{{ route('services.show', $related->slug) }}" class="btn btn-primary">
                    Lihat Detail
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection