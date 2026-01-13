<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlidesTableSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'badge_icon' => '🏆',
                'badge_text' => 'ISO Certified & Trusted by 200+ Companies',
                'title' => 'Solusi Alih Daya',
                'highlight_text' => 'Terpercaya & Terlatih',
                'description' => 'Menyediakan personel profesional dengan sertifikasi lengkap untuk kebutuhan security, cleaning, dan driver perusahaan Anda.',
                'background_color' => '#0A1F44',
                'primary_button_text' => '📋 Ajukan Penawaran',
                'primary_button_link' => '/contact',
                'secondary_button_text' => '💼 Cari Lowongan Kerja',
                'secondary_button_link' => '/career',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'badge_icon' => '🛡️',
                'badge_text' => '24/7 Monitoring & Professional Team',
                'title' => 'Personel Tersertifikasi',
                'highlight_text' => 'Gada Pratama',
                'description' => 'Semua personel security kami telah melalui 6 tahap seleksi ketat dan memiliki sertifikasi Gada Pratama dari Kepolisian.',
                'background_color' => '#1E3A5F',
                'primary_button_text' => '🔍 Lihat Layanan',
                'primary_button_link' => '/services',
                'secondary_button_text' => '📖 Tentang Kami',
                'secondary_button_link' => '/about',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'badge_icon' => '📊',
                'badge_text' => 'Multi-Regional Coverage & Support',
                'title' => 'Monitoring Digital',
                'highlight_text' => 'Real-Time 24/7',
                'description' => 'Sistem monitoring berbasis aplikasi dengan laporan digital real-time untuk transparansi dan efisiensi operasional.',
                'background_color' => '#152238',
                'primary_button_text' => '📞 Konsultasi Gratis',
                'primary_button_link' => '/contact',
                'secondary_button_text' => '🏆 Lihat Portfolio',
                'secondary_button_link' => '/portfolio',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }
}