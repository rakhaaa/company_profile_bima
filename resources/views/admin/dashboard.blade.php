@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@push('styles')
    <style>
        /* ========== DASHBOARD LAYOUT ========== */
        .dashboard-container {
            padding: 2rem;
            background: var(--gray-50);
            min-height: 100vh;
        }

        .dashboard-header {
            margin-bottom: 2.5rem;
        }

        .dashboard-title {
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .dashboard-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* ========== STATS GRID ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            padding: 1.8rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--navy-primary), var(--gold-accent));
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            border-color: var(--navy-primary);
            box-shadow: 0 10px 30px rgba(10, 31, 68, 0.1);
            transform: translateY(-5px);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.3rem 0.6rem;
            background: var(--gray-50);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .stat-trend.up {
            color: #10b981;
        }

        .stat-trend.down {
            color: #ef4444;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 600;
        }

        /* ========== MAIN CONTENT GRID ========== */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        /* ========== CARD STYLES ========== */
        .dashboard-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            padding: 1.8rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-action {
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .card-action:hover {
            color: var(--gold-accent);
        }

        /* ========== APPLICATION TABLE ========== */
        .applications-table {
            width: 100%;
        }

        .application-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-100);
            align-items: center;
            transition: background 0.3s;
        }

        .application-row:last-child {
            border-bottom: none;
        }

        .application-row:hover {
            background: var(--gray-50);
        }

        .applicant-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .applicant-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .applicant-details h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.2rem;
        }

        .applicant-details p {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin: 0;
        }

        .application-date {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 700;
            text-align: center;
            width: fit-content;
        }

        .status-badge.new {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-badge.reviewed {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.shortlisted {
            background: #d1fae5;
            color: #065f46;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            background: var(--navy-primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: var(--navy-secondary);
            transform: translateY(-2px);
        }

        /* ========== INQUIRY LIST ========== */
        .inquiry-list {
            display: grid;
            gap: 1rem;
        }

        .inquiry-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: var(--gray-50);
            border-radius: 12px;
            border: 2px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
        }

        .inquiry-item:hover {
            background: var(--white);
            border-color: var(--navy-primary);
        }

        .inquiry-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .inquiry-content {
            flex: 1;
        }

        .inquiry-content h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.3rem;
        }

        .inquiry-content p {
            font-size: 0.85rem;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .inquiry-meta {
            display: flex;
            gap: 1.5rem;
            font-size: 0.8rem;
            color: var(--gray-500);
        }

        .inquiry-badge {
            padding: 0.3rem 0.6rem;
            background: var(--gold-accent);
            color: var(--white);
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* ========== ANALYTICS CHART ========== */
        .analytics-section {
            margin-top: 2.5rem;
        }

        .chart-container {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            padding: 1.8rem;
        }

        .chart-placeholder {
            height: 300px;
            background: var(--gray-50);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* ========== QUICK ACTIONS ========== */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem;
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .quick-action-btn:hover {
            border-color: var(--navy-primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(10, 31, 68, 0.1);
        }

        .quick-action-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--navy-primary), var(--gold-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .quick-action-text h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 0.2rem;
        }

        .quick-action-text p {
            font-size: 0.85rem;
            color: var(--gray-600);
            margin: 0;
        }

        /* ========== RESPONSIVE ========== */
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

            .application-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">👋 Selamat Datang, Admin!</h1>
            <p class="dashboard-subtitle">Berikut adalah ringkasan aktivitas website Anda hari ini</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">📋</div>
                    <div class="stat-trend up">
                        <span>↑</span>
                        <span>12%</span>
                    </div>
                </div>
                <div class="stat-number">24</div>
                <div class="stat-label">Total Lamaran Baru</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">📨</div>
                    <div class="stat-trend up">
                        <span>↑</span>
                        <span>8%</span>
                    </div>
                </div>
                <div class="stat-number">18</div>
                <div class="stat-label">RFQ Pending</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon orange">📰</div>
                    <div class="stat-trend up">
                        <span>↑</span>
                        <span>5%</span>
                    </div>
                </div>
                <div class="stat-number">47</div>
                <div class="stat-label">Total Artikel</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">👁️</div>
                    <div class="stat-trend up">
                        <span>↑</span>
                        <span>23%</span>
                    </div>
                </div>
                <div class="stat-number">8.4K</div>
                <div class="stat-label">Page Views (7d)</div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="content-grid">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Recent Applications -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span>👥</span>
                            <span>Lamaran Terbaru</span>
                        </h2>
                        <a href="#" class="card-action">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="applications-table">
                        <div class="application-row">
                            <div class="applicant-info">
                                <div class="applicant-avatar">AS</div>
                                <div class="applicant-details">
                                    <h4>Ahmad Suryadi</h4>
                                    <p>Security Guard</p>
                                </div>
                            </div>
                            <div class="application-date">8 Jan 2026</div>
                            <div><span class="status-badge new">New</span></div>
                            <div><button class="action-btn">Lihat</button></div>
                        </div>
                        <div class="application-row">
                            <div class="applicant-info">
                                <div class="applicant-avatar">SR</div>
                                <div class="applicant-details">
                                    <h4>Siti Rahmawati</h4>
                                    <p>Cleaning Service</p>
                                </div>
                            </div>
                            <div class="application-date">7 Jan 2026</div>
                            <div><span class="status-badge reviewed">Reviewed</span></div>
                            <div><button class="action-btn">Lihat</button></div>
                        </div>
                        <div class="application-row">
                            <div class="applicant-info">
                                <div class="applicant-avatar">BP</div>
                                <div class="applicant-details">
                                    <h4>Budi Prasetyo</h4>
                                    <p>Driver</p>
                                </div>
                            </div>
                            <div class="application-date">6 Jan 2026</div>
                            <div><span class="status-badge shortlisted">Shortlisted</span></div>
                            <div><button class="action-btn">Lihat</button></div>
                        </div>
                        <div class="application-row">
                            <div class="applicant-info">
                                <div class="applicant-avatar">DW</div>
                                <div class="applicant-details">
                                    <h4>Dewi Wulandari</h4>
                                    <p>Security Supervisor</p>
                                </div>
                            </div>
                            <div class="application-date">5 Jan 2026</div>
                            <div><span class="status-badge new">New</span></div>
                            <div><button class="action-btn">Lihat</button></div>
                        </div>
                    </div>
                </div>

                <!-- Analytics Chart -->
                <div class="analytics-section">
                    <div class="chart-container">
                        <div class="card-header" style="border-bottom: none; padding-bottom: 0;">
                            <h2 class="card-title">
                                <span>📊</span>
                                <span>Website Analytics (7 Hari Terakhir)</span>
                            </h2>
                        </div>
                        <div class="chart-placeholder">
                            📈 Chart Area - Integrate with Chart.js or similar library
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <a href="#" class="quick-action-btn">
                        <div class="quick-action-icon">✏️</div>
                        <div class="quick-action-text">
                            <h4>Tulis Artikel</h4>
                            <p>Buat post baru</p>
                        </div>
                    </a>
                    <a href="#" class="quick-action-btn">
                        <div class="quick-action-icon">💼</div>
                        <div class="quick-action-text">
                            <h4>Post Lowongan</h4>
                            <p>Tambah job baru</p>
                        </div>
                    </a>
                    <a href="#" class="quick-action-btn">
                        <div class="quick-action-icon">🛠️</div>
                        <div class="quick-action-text">
                            <h4>Kelola Layanan</h4>
                            <p>Edit services</p>
                        </div>
                    </a>
                    <a href="#" class="quick-action-btn">
                        <div class="quick-action-icon">🏢</div>
                        <div class="quick-action-text">
                            <h4>Tambah Klien</h4>
                            <p>Add client logo</p>
                        </div>
                    </a>
                </div>

                <!-- Recent Inquiries -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span>📬</span>
                            <span>RFQ Terbaru</span>
                        </h2>
                        <a href="#" class="card-action">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="inquiry-list">
                        <div class="inquiry-item">
                            <div class="inquiry-icon">🏢</div>
                            <div class="inquiry-content">
                                <div style="display: flex; justify-content: space-between; align-items: start;">
                                    <h4>PT Maju Jaya Sejahtera</h4>
                                    <span class="inquiry-badge">NEW</span>
                                </div>
                                <p>Security Service - Jakarta Selatan</p>
                                <div class="inquiry-meta">
                                    <span>👤 Budi Santoso</span>
                                    <span>📅 8 Jan 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="inquiry-item">
                            <div class="inquiry-icon">🏢</div>
                            <div class="inquiry-content">
                                <div style="display: flex; justify-content: space-between; align-items: start;">
                                    <h4>CV Sukses Bersama</h4>
                                    <span class="inquiry-badge">NEW</span>
                                </div>
                                <p>Cleaning Service - Tangerang</p>
                                <div class="inquiry-meta">
                                    <span>👤 Siti Aminah</span>
                                    <span>📅 7 Jan 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="inquiry-item">
                            <div class="inquiry-icon">🏢</div>
                            <div class="inquiry-content">
                                <h4>PT Sinar Terang</h4>
                                <p>Driver Service - Bekasi</p>
                                <div class="inquiry-meta">
                                    <span>👤 Ahmad Hidayat</span>
                                    <span>📅 6 Jan 2026</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animate stats on load
            const animateValue = (element, start, end, duration) => {
                const range = end - start;
                const increment = range / (duration / 16);
                let current = start;

                const timer = setInterval(() => {
                    current += increment;
                    if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                        element.textContent = end;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 16);
            };

            // Animate stat numbers
            document.querySelectorAll('.stat-number').forEach(el => {
                const finalValue = parseFloat(el.textContent.replace(/[^0-9.]/g, ''));
                if (!isNaN(finalValue)) {
                    const isDecimal = el.textContent.includes('K');
                    if (isDecimal) {
                        animateValue(el, 0, finalValue, 1000);
                        setTimeout(() => {
                            el.textContent = finalValue + 'K';
                        }, 1000);
                    } else {
                        animateValue(el, 0, finalValue, 1000);
                    }
                }
            });

            // Add click handlers for action buttons
            document.querySelectorAll('.action-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('.application-row');
                    const name = row.querySelector('.applicant-details h4').textContent;
                    alert('View application for: ' + name);
                });
            });

            // Add click handlers for inquiry items
            document.querySelectorAll('.inquiry-item').forEach(item => {
                item.addEventListener('click', function() {
                    const company = this.querySelector('h4').textContent;
                    alert('View inquiry from: ' + company);
                });
            });

            // Fade in animation
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.stat-card, .dashboard-card, .quick-action-btn').forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = `all 0.5s ease ${index * 0.05}s`;
                observer.observe(el);
            });
        });
    </script>
@endpush