<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatsTableSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            [
                'icon' => '👮',
                'label' => 'Personel Terlatih',
                'number' => 500,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => '🤝',
                'label' => 'Klien Aktif',
                'number' => 200,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => '📅',
                'label' => 'Tahun Pengalaman',
                'number' => 8,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => '🏆',
                'label' => 'Sertifikasi',
                'number' => 15,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($stats as $stat) {
            Stat::create($stat);
        }
    }
}