@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
<style>
    /* ========== DASHBOARD STYLES ========== */
    .dashboard-container {
        padding: 2rem;
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

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--white);
        border: 2px solid var(--gray-100);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: var(--navy-primary);
    }

    .stat-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--navy-primary);
        line-height: 1;
    }

    .stat-label {
        color: var(--gray-600);
        font-size: 0.95rem;
        margin-top: 0.5rem;
        font-weight: 600;
    }

    .stat-change {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-top: 0.5rem;
    }

    .stat-change.positive {
        background: #d1fae5;
        color: #065f46;
    }

    .stat-change.negative {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Content Grid */
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    /* Card */
    .card {
        background: var(--white);
        border: 2px solid var(--gray-100);
        border-radius: 16px;
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem;
        border-bottom: 2px solid var(--gray-100);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--navy-primary);
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Recent Items List */
    .recent-list {
        list-style: none;
    }

    .recent-item {
        padding: 1rem;
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background 0.3s;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-item:hover {
        background: var(--gray-50);
    }

    .recent-item-content h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--navy-primary);
        margin-bottom: 0.3rem;
    }

    .recent-item-content p {
        font-size: 0.85rem;
        color: var(--gray-600);
    }

    .recent-item-meta {
        text-align: right;
    }

    .recent-item-time {
        font-size: 0.8rem;
        color: var(--gray-500);
    }

    .status-badge {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-top: 0.3rem;
    }

    .status-badge.new {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-badge.pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-badge.read {
        background: #e0e7ff;
        color: #3730a3;
    }

    .status-badge.replied {
        background: #d1fae5;
        color: #065f46;
    }

    /* Quick Stats */
    .quick-stats {
        display: grid;
        gap: 1rem;
    }

    .quick-stat-item {
        padding: 1rem;
        background: var(--gray-50);
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quick-stat-label {
        font-size: 0.9rem;
        color: var(--gray-600);
        font-weight: 600;
    }

    .quick-stat-value {
        font-size: 1.5rem;
        font-weight: 900;
        color: var(--navy-primary);
    }

    /* Chart Container */
    .chart-container {
        height: 300px;
        position: relative;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--gray-500);
    }

    .empty-state-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">👋 Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="page-subtitle">Berikut adalah ringkasan aktivitas website Anda</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon">🛠️</div>
            </div>
            <div class="stat-number">{{ $stats['total_services'] }}</div>
            <div class="stat-label">Total Layanan</div>
            <div class="stat-change positive">↑ {{ $stats['active_services'] }} Aktif</div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon">🏆</div>
            </div>
            <div class="stat-number">{{ $stats['total_clients'] }}</div>
            <div class="stat-label">Total Klien</div>
            <div class="stat-change positive">↑ Terpercaya</div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon">📧</div>
            </div>
            <div class="stat-number">{{ $contactStats['new'] }}</div>
            <div class="stat-label">Pesan Baru</div>
            <div class="stat-change {{ $contactStats['new'] > 0 ? 'positive' : '' }}">
                {{ $contactStats['total'] }} Total
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon">👥</div>
            </div>
            <div class="stat-number">{{ $careerStats['pending'] }}</div>
            <div class="stat-label">Lamaran Baru</div>
            <div class="stat-change {{ $careerStats['pending'] > 0 ? 'positive' : '' }}">
                {{ $careerStats['total'] }} Total
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Recent Contacts -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">📬 Pesan Kontak Terbaru</h2>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                @if($recentContacts->count() > 0)
                    <ul class="recent-list">
                        @foreach($recentContacts as $contact)
                        <li class="recent-item">
                            <div class="recent-item-content">
                                <h4>{{ $contact->name }}</h4>
                                <p>{{ $contact->subject }}</p>
                            </div>
                            <div class="recent-item-meta">
                                <div class="recent-item-time">{{ $contact->created_at->diffForHumans() }}</div>
                                <span class="status-badge {{ $contact->status }}">{{ ucfirst($contact->status) }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">📭</div>
                        <p>Belum ada pesan kontak</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">📊 Statistik Cepat</h2>
            </div>
            <div class="card-body">
                <div class="quick-stats">
                    <div class="quick-stat-item">
                        <span class="quick-stat-label">Kontak Baru</span>
                        <span class="quick-stat-value">{{ $contactStats['new'] }}</span>
                    </div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-label">Perlu Dibalas</span>
                        <span class="quick-stat-value">{{ $contactStats['read'] }}</span>
                    </div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-label">Sudah Dibalas</span>
                        <span class="quick-stat-value">{{ $contactStats['replied'] }}</span>
                    </div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-label">Interview</span>
                        <span class="quick-stat-value">{{ $careerStats['interview'] }}</span>
                    </div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-label">Diterima</span>
                        <span class="quick-stat-value">{{ $careerStats['accepted'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">👥 Lamaran Kerja Terbaru</h2>
            <a href="{{ route('admin.career.index') }}" class="btn btn-primary">Lihat Semua</a>
        </div>
        <div class="card-body">
            @if($recentApplications->count() > 0)
                <ul class="recent-list">
                    @foreach($recentApplications as $application)
                    <li class="recent-item">
                        <div class="recent-item-content">
                            <h4>{{ $application->name }}</h4>
                            <p>{{ $application->position_applied }} • {{ $application->email }}</p>
                        </div>
                        <div class="recent-item-meta">
                            <div class="recent-item-time">{{ $application->created_at->diffForHumans() }}</div>
                            <span class="status-badge {{ $application->status }}">{{ ucfirst($application->status) }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📋</div>
                    <p>Belum ada lamaran kerja</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection