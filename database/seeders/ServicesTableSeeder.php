<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'icon' => '🛡️',
                'title' => 'Security Guard',
                'slug' => 'security-guard',
                'description' => 'Personel security bersertifikat Gada Pratama dengan pelatihan 6 tahap seleksi untuk menjaga keamanan aset dan lingkungan bisnis Anda.',
                'full_description' => 'Layanan security guard profesional dengan personel yang telah tersertifikasi Gada Pratama dan melalui 6 tahap seleksi ketat. Kami menyediakan pengamanan 24/7 dengan sistem monitoring digital.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => '🧹',
                'title' => 'Cleaning Service',
                'slug' => 'cleaning-service',
                'description' => 'Layanan kebersihan profesional dengan peralatan modern dan metode yang efektif untuk menjaga lingkungan kerja tetap bersih dan nyaman.',
                'full_description' => 'Cleaning service dengan standar internasional menggunakan peralatan modern dan bahan pembersih ramah lingkungan. Tim kami terlatih untuk menangani berbagai jenis area.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => '🚗',
                'title' => 'Driver Service',
                'slug' => 'driver-service',
                'description' => 'Driver profesional dengan SIM yang valid dan pengalaman mengemudi untuk mendukung mobilitas operasional perusahaan Anda.',
                'full_description' => 'Layanan driver profesional dengan SIM yang lengkap dan valid, berpengalaman dalam mengemudi berbagai jenis kendaraan untuk mendukung operasional perusahaan.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => '🗺️',
                'title' => 'Patrol & Monitoring',
                'slug' => 'patrol-monitoring',
                'description' => 'Sistem patroli dengan monitoring digital 24/7 dan laporan real-time untuk pengawasan yang lebih efektif dan terukur.',
                'full_description' => 'Sistem patroli modern dengan aplikasi Turjawali Patrol Online yang memberikan laporan real-time dan monitoring 24/7 untuk keamanan maksimal.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => '📹',
                'title' => 'CCTV & Security System',
                'slug' => 'cctv-security-system',
                'description' => 'Instalasi dan pemeliharaan sistem CCTV serta security system terintegrasi untuk perlindungan maksimal.',
                'full_description' => 'Layanan instalasi, pemeliharaan, dan monitoring sistem CCTV dan security system terintegrasi dengan teknologi terkini untuk perlindungan maksimal aset Anda.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => '💼',
                'title' => 'Security Consulting',
                'slug' => 'security-consulting',
                'description' => 'Konsultasi dan perencanaan sistem keamanan sesuai analisis risiko dan kebutuhan spesifik bisnis Anda.',
                'full_description' => 'Layanan konsultasi keamanan profesional dengan analisis risiko mendalam dan perencanaan sistem keamanan yang disesuaikan dengan kebutuhan spesifik bisnis Anda.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}