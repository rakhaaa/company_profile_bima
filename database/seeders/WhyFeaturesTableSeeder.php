<?php

namespace Database\Seeders;

use App\Models\WhyFeature;
use Illuminate\Database\Seeder;

class WhyFeaturesTableSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'icon' => '📜',
                'title' => 'Legalitas Lengkap',
                'description' => 'Memiliki seluruh izin operasional dari Kepolisian (SIO), sertifikasi ISO 9001, K3, dan Lingkungan serta terdaftar di ABUJAPI.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => '🎓',
                'title' => 'Personel Tersertifikasi',
                'description' => 'Semua personel security memiliki sertifikat Gada Pratama dan telah melalui 6 tahap seleksi ketat dengan pelatihan intensif.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => '📱',
                'title' => 'Monitoring 24/7',
                'description' => 'Sistem monitoring digital dengan aplikasi Turjawali Patrol Online dan MCC untuk transparansi dan laporan real-time.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => '⚡',
                'title' => 'Quick Response Team',
                'description' => 'Tim tanggap darurat yang siap 24/7 untuk menangani situasi emergency dengan cepat dan profesional.',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            WhyFeature::create($feature);
        }
    }
}