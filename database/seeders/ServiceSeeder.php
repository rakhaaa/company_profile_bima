<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Security Guard Service',
                'slug' => 'security-guard',
                'icon' => '🛡️',
                'category' => 'Security',
                'description' => 'Personel security bersertifikat Gada Pratama dengan pelatihan 6 tahap seleksi untuk menjaga keamanan aset dan lingkungan bisnis Anda.',
                'full_description' => 'Layanan security guard profesional dengan personel bersertifikat Gada Pratama yang telah melalui 6 tahap seleksi ketat. Tim kami siap menjaga keamanan aset dan lingkungan bisnis Anda dengan standar keamanan tertinggi. Dilengkapi dengan sistem monitoring 24/7 dan laporan digital real-time untuk transparansi dan akuntabilitas.',
                'features' => [
                    'Personel Tersertifikasi Gada Pratama',
                    '6 Tahap Seleksi Ketat',
                    'Monitoring 24/7 dengan Aplikasi',
                    'Laporan Digital Real-time'
                ],
                'price_label' => 'Mulai dari Rp 3.5 Jt/bulan',
                'price_start' => 3500000,
                'benefits' => [
                    'Personel terlatih dan bersertifikat',
                    'Sistem monitoring digital terintegrasi',
                    'Backup personel 24 jam',
                    'Supervisor berpengalaman',
                    'Asuransi ketenagakerjaan',
                    'Seragam dan perlengkapan lengkap'
                ],
                'requirements' => [
                    'Area yang akan dijaga',
                    'Jumlah personel yang dibutuhkan',
                    'Shift kerja (8, 12, atau 24 jam)',
                    'Spesifikasi tugas khusus'
                ],
                'process_description' => 'Proses dimulai dengan survey lokasi, analisis kebutuhan, penempatan personel terseleksi, training khusus sesuai SOP client, dan monitoring berkelanjutan dengan laporan rutin.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Cleaning Service',
                'slug' => 'cleaning-service',
                'icon' => '🧹',
                'category' => 'Cleaning',
                'description' => 'Layanan kebersihan profesional dengan peralatan modern dan metode yang efektif untuk menjaga lingkungan kerja tetap bersih dan nyaman.',
                'full_description' => 'Layanan cleaning service dengan tenaga profesional dan peralatan modern. Kami menggunakan metode pembersihan yang efektif dan ramah lingkungan untuk menjaga kebersihan dan kenyamanan lingkungan kerja Anda. Dilengkapi dengan supervisor berpengalaman dan sistem quality control yang ketat.',
                'features' => [
                    'Peralatan Modern & Lengkap',
                    'Produk Ramah Lingkungan',
                    'Jadwal Fleksibel',
                    'Supervisor Berpengalaman'
                ],
                'price_label' => 'Mulai dari Rp 2.8 Jt/bulan',
                'price_start' => 2800000,
                'benefits' => [
                    'Tenaga terlatih dan profesional',
                    'Peralatan lengkap dan modern',
                    'Chemical ramah lingkungan',
                    'Quality control berkala',
                    'Backup personel tersedia',
                    'Jadwal fleksibel sesuai kebutuhan'
                ],
                'requirements' => [
                    'Luas area yang akan dibersihkan',
                    'Frekuensi pembersihan (harian/periodik)',
                    'Jenis permukaan dan material',
                    'Spesifikasi pembersihan khusus'
                ],
                'process_description' => 'Survey area, penyusunan jadwal, penempatan tenaga cleaning terlatih, penyediaan peralatan dan bahan, dan inspeksi rutin untuk memastikan kualitas.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Driver Service',
                'slug' => 'driver-service',
                'icon' => '🚗',
                'category' => 'Transportation',
                'description' => 'Driver profesional dengan SIM yang valid dan pengalaman mengemudi untuk mendukung mobilitas operasional perusahaan Anda.',
                'full_description' => 'Layanan driver profesional dengan SIM yang valid dan pengalaman mengemudi yang luas. Tim driver kami siap mendukung mobilitas operasional perusahaan Anda dengan pelayanan yang aman, nyaman, dan tepat waktu. Menguasai rute Jakarta dan sekitarnya dengan baik.',
                'features' => [
                    'SIM Valid & Berpengalaman',
                    'Pengetahuan Rute Lengkap',
                    'Kendaraan Terawat',
                    'Fleksibel & Disiplin'
                ],
                'price_label' => 'Mulai dari Rp 3.2 Jt/bulan',
                'price_start' => 3200000,
                'benefits' => [
                    'Driver berpengalaman min. 5 tahun',
                    'SIM A/B1 yang valid',
                    'Pengetahuan rute lengkap',
                    'Penampilan rapi dan profesional',
                    'Komunikasi baik',
                    'Available untuk overtime'
                ],
                'requirements' => [
                    'Jenis kendaraan yang akan dikendarai',
                    'Jam kerja dan shift',
                    'Area operasional',
                    'Tugas tambahan yang diperlukan'
                ],
                'process_description' => 'Seleksi driver berpengalaman, verifikasi SIM dan dokumen, pengenalan kendaraan dan rute, briefing SOP perusahaan, dan monitoring kinerja rutin.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Patrol & Monitoring',
                'slug' => 'patrol-monitoring',
                'icon' => '👁️',
                'category' => 'Monitoring',
                'description' => 'Sistem patroli dengan monitoring digital 24/7 dan laporan real-time untuk pengawasan yang lebih efektif dan terukur.',
                'full_description' => 'Layanan patroli dan monitoring dengan sistem digital 24/7. Dilengkapi dengan aplikasi Turjawali Patrol Online yang memberikan laporan real-time, GPS tracking, dan dokumentasi lengkap untuk pengawasan yang lebih efektif, terukur, dan akuntabel.',
                'features' => [
                    'Aplikasi Turjawali Patrol',
                    'GPS Tracking Real-time',
                    'Laporan Digital Otomatis',
                    'Mobile Command Center'
                ],
                'price_label' => 'Hubungi kami',
                'price_start' => null,
                'benefits' => [
                    'Monitoring real-time 24/7',
                    'GPS tracking lokasi petugas',
                    'Laporan digital otomatis',
                    'Checkpoint system',
                    'Incident reporting',
                    'Dashboard monitoring'
                ],
                'requirements' => [
                    'Area yang akan dipatroli',
                    'Jumlah checkpoint',
                    'Frekuensi patroli',
                    'Jenis laporan yang dibutuhkan'
                ],
                'process_description' => 'Instalasi checkpoint, setup aplikasi monitoring, training petugas, implementasi sistem patroli, dan monitoring center yang aktif 24/7.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'CCTV & Security System',
                'slug' => 'cctv-system',
                'icon' => '📹',
                'category' => 'Technology',
                'description' => 'Instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi untuk perlindungan maksimal dan monitoring efektif.',
                'full_description' => 'Layanan instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi. Kami menyediakan solusi keamanan berbasis teknologi dengan kamera HD, remote viewing, recording system, dan integrasi dengan sistem keamanan lainnya untuk perlindungan maksimal aset dan properti Anda.',
                'features' => [
                    'CCTV HD & IP Camera',
                    'Remote Viewing 24/7',
                    'Recording & Backup',
                    'Maintenance Berkala'
                ],
                'price_label' => 'Custom package',
                'price_start' => null,
                'benefits' => [
                    'CCTV HD/IP Camera berkualitas',
                    'Recording capacity besar',
                    'Remote viewing via mobile',
                    'Night vision capability',
                    'Motion detection alert',
                    'Maintenance dan support 24/7'
                ],
                'requirements' => [
                    'Layout dan denah lokasi',
                    'Jumlah dan titik kamera',
                    'Durasi recording yang dibutuhkan',
                    'Budget dan spesifikasi teknis'
                ],
                'process_description' => 'Survey lokasi, desain sistem, instalasi perangkat, konfigurasi dan testing, training operator, dan layanan maintenance berkala.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Security Consulting',
                'slug' => 'security-consulting',
                'icon' => '💼',
                'category' => 'Consulting',
                'description' => 'Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko dan kebutuhan spesifik bisnis Anda.',
                'full_description' => 'Layanan konsultasi keamanan profesional dengan analisis risiko mendalam. Kami membantu merencanakan sistem keamanan yang sesuai dengan kebutuhan spesifik bisnis Anda, termasuk risk assessment, security planning, SOP development, training personel, dan audit keamanan berkala untuk perlindungan optimal.',
                'features' => [
                    'Risk Assessment',
                    'Security Planning',
                    'SOP Development',
                    'Training & Audit'
                ],
                'price_label' => 'Project based',
                'price_start' => null,
                'benefits' => [
                    'Risk assessment menyeluruh',
                    'Security master plan',
                    'SOP dan prosedur lengkap',
                    'Training dan workshop',
                    'Security audit berkala',
                    'Konsultan berpengalaman'
                ],
                'requirements' => [
                    'Profil perusahaan dan bisnis',
                    'Area dan aset yang perlu diamankan',
                    'Current security measures',
                    'Timeline dan budget proyek'
                ],
                'process_description' => 'Initial assessment, risk analysis, perencanaan strategis, penyusunan SOP, implementasi dan training, serta evaluasi dan audit berkelanjutan.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}