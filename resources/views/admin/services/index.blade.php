@extends('layouts.admin')

@section('title', 'Kelola Layanan - Admin Panel')
@section('page-title', 'Kelola Layanan')

@push('styles')
    <style>
        /* ========== SERVICES CONTAINER ========== */
        .services-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title-group h1 {
            font-size: 2rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* ========== STATS CARDS ========== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s;
        }

        .stat-card:hover {
            border-color: var(--navy-primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(10, 31, 68, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.blue { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .stat-icon.green { background: linear-gradient(135deg, #10b981, #059669); }
        .stat-icon.orange { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .stat-icon.red { background: linear-gradient(135deg, #ef4444, #dc2626); }

        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--navy-primary);
            margin-bottom: 0.2rem;
        }

        .stat-info p {
            font-size: 0.85rem;
            color: var(--gray-600);
            margin: 0;
        }

        /* ========== SEARCH & FILTER ========== */
        .search-filter-bar {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 1rem;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.9rem 1.2rem 0.9rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 3px rgba(10, 31, 68, 0.1);
        }

        .search-box::before {
            content: '🔍';
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
        }

        .filter-select {
            padding: 0.9rem 2.5rem 0.9rem 1.2rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            background: var(--white);
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--navy-primary);
        }

        /* ========== SERVICES GRID ========== */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .service-card {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            position: relative;
        }

        .service-card:hover {
            border-color: var(--navy-primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(10, 31, 68, 0.15);
        }

        .service-header {
            padding: 2rem;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-secondary));
            color: white;
            position: relative;
        }

        .service-icon-large {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .service-category {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-badge.active {
            background: #10b981;
            color: white;
        }

        .status-badge.inactive {
            background: #ef4444;
            color: white;
        }

        .service-body {
            padding: 1.5rem;
        }

        .service-description {
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .service-meta {
            display: grid;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background: var(--gray-50);
            border-radius: 8px;
        }

        .meta-label {
            font-size: 0.85rem;
            color: var(--gray-600);
        }

        .meta-value {
            font-weight: 700;
            color: var(--navy-primary);
        }

        .service-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
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
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-secondary {
            background: var(--gray-200);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-300);
        }

        .btn-full {
            grid-column: 1 / -1;
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border: 2px dashed var(--gray-300);
            border-radius: 16px;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--gray-600);
            margin-bottom: 2rem;
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

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .services-container {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-filter-bar {
                grid-template-columns: 1fr;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .service-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="services-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title-group">
                <h1>🛠️ Kelola Layanan</h1>
                <p class="page-subtitle">Manajemen semua layanan yang ditawarkan perusahaan</p>
            </div>
            <a href="#" class="btn btn-success" onclick="alert('Halaman tambah layanan baru'); return false;">
                ➕ Tambah Layanan
            </a>
        </div>

        <!-- Success Alert (Hidden by default) -->
        <div class="alert alert-success" style="display: none;" id="successAlert">
            <span>✓</span>
            <span>Layanan berhasil diperbarui!</span>
        </div>

        <!-- Stats Row -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon blue">🛠️</div>
                <div class="stat-info">
                    <h3>6</h3>
                    <p>Total Layanan</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">✅</div>
                <div class="stat-info">
                    <h3>6</h3>
                    <p>Aktif</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">⏸️</div>
                <div class="stat-info">
                    <h3>0</h3>
                    <p>Tidak Aktif</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">📊</div>
                <div class="stat-info">
                    <h3>4.8</h3>
                    <p>Rating Rata-rata</p>
                </div>
            </div>
        </div>

        <!-- Search & Filter Bar -->
        <div class="search-filter-bar">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Cari layanan...">
            </div>
            <select class="filter-select">
                <option value="">Semua Status</option>
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </select>
            <select class="filter-select">
                <option value="">Semua Kategori</option>
                <option value="security">Security</option>
                <option value="cleaning">Cleaning</option>
                <option value="driver">Driver</option>
            </select>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">
            <!-- Service Card 1 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">🛡️</div>
                    <h3 class="service-title">Security Guard</h3>
                    <p class="service-category">Keamanan & Pengawasan</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Personel security bersertifikat Gada Pratama dengan pelatihan 6 tahap seleksi untuk menjaga keamanan aset dan lingkungan bisnis Anda.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">2,345</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit Security Guard')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('Security Guard')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 2 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">🧹</div>
                    <h3 class="service-title">Cleaning Service</h3>
                    <p class="service-category">Kebersihan & Sanitasi</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Layanan kebersihan profesional dengan peralatan modern dan metode yang efektif untuk menjaga lingkungan kerja tetap bersih dan nyaman.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">1,892</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit Cleaning Service')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('Cleaning Service')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 3 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">🚗</div>
                    <h3 class="service-title">Driver Service</h3>
                    <p class="service-category">Transportasi</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Driver profesional dengan SIM yang valid dan pengalaman mengemudi untuk mendukung mobilitas operasional perusahaan Anda.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">1,567</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit Driver Service')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('Driver Service')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 4 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">🗺️</div>
                    <h3 class="service-title">Patrol & Monitoring</h3>
                    <p class="service-category">Pengawasan</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Sistem patroli dengan monitoring digital 24/7 dan laporan real-time untuk pengawasan yang lebih efektif dan terukur.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">1,234</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit Patrol & Monitoring')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('Patrol & Monitoring')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 5 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">📹</div>
                    <h3 class="service-title">CCTV & Security System</h3>
                    <p class="service-category">Teknologi Keamanan</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi untuk perlindungan maksimal.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">987</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit CCTV & Security System')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('CCTV & Security System')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 6 -->
            <div class="service-card">
                <div class="service-header">
                    <span class="status-badge active">Aktif</span>
                    <div class="service-icon-large">💼</div>
                    <h3 class="service-title">Security Consulting</h3>
                    <p class="service-category">Konsultasi</p>
                </div>
                <div class="service-body">
                    <p class="service-description">
                        Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko dan kebutuhan spesifik bisnis Anda.
                    </p>
                    <div class="service-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Dibuat</span>
                            <span class="meta-value">15 Jan 2025</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">👁️ Views</span>
                            <span class="meta-value">765</span>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn btn-primary" onclick="alert('Edit Security Consulting')">
                            ✏️ Edit
                        </button>
                        <button class="btn btn-secondary" onclick="toggleStatus(this)">
                            ⏸️ Nonaktifkan
                        </button>
                        <button class="btn btn-danger btn-full" onclick="deleteService('Security Consulting')">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Toggle Service Status
        function toggleStatus(btn) {
            const card = btn.closest('.service-card');
            const badge = card.querySelector('.status-badge');
            const isActive = badge.classList.contains('active');
            
            if (confirm(`${isActive ? 'Nonaktifkan' : 'Aktifkan'} layanan ini?`)) {
                if (isActive) {
                    badge.classList.remove('active');
                    badge.classList.add('inactive');
                    badge.textContent = 'Tidak Aktif';
                    btn.innerHTML = '▶️ Aktifkan';
                    btn.classList.remove('btn-secondary');
                    btn.classList.add('btn-success');
                } else {
                    badge.classList.remove('inactive');
                    badge.classList.add('active');
                    badge.textContent = 'Aktif';
                    btn.innerHTML = '⏸️ Nonaktifkan';
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-secondary');
                }
                
                showSuccessAlert();
            }
        }

        // Delete Service
        function deleteService(serviceName) {
            if (confirm(`Apakah Anda yakin ingin menghapus layanan "${serviceName}"?\n\nTindakan ini tidak dapat dibatalkan.`)) {
                const card = event.target.closest('.service-card');
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                
                setTimeout(() => {
                    card.remove();
                    showSuccessAlert();
                }, 300);
            }
        }

        // Show Success Alert
        function showSuccessAlert() {
            const alert = document.getElementById('successAlert');
            alert.style.display = 'flex';
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }

        // Search Functionality
        document.querySelector('.search-input')?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.service-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.service-title').textContent.toLowerCase();
                const description = card.querySelector('.service-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter Functionality
        document.querySelectorAll('.filter-select').forEach(select => {
            select.addEventListener('change', function() {
                const statusFilter = document.querySelectorAll('.filter-select')[0].value;
                const cards = document.querySelectorAll('.service-card');
                
                cards.forEach(card => {
                    const badge = card.querySelector('.status-badge');
                    const isActive = badge.classList.contains('active');
                    
                    if (statusFilter === '') {
                        card.style.display = 'block';
                    } else if (statusFilter === 'active' && isActive) {
                        card.style.display = 'block';
                    } else if (statusFilter === 'inactive' && !isActive) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Animation on load
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.service-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
@endpush