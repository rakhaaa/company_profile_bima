<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'CLIENT 1', 'order' => 1, 'is_active' => true],
            ['name' => 'CLIENT 2', 'order' => 2, 'is_active' => true],
            ['name' => 'CLIENT 3', 'order' => 3, 'is_active' => true],
            ['name' => 'CLIENT 4', 'order' => 4, 'is_active' => true],
            ['name' => 'CLIENT 5', 'order' => 5, 'is_active' => true],
            ['name' => 'CLIENT 6', 'order' => 6, 'is_active' => true],
            ['name' => 'CLIENT 7', 'order' => 7, 'is_active' => true],
            ['name' => 'CLIENT 8', 'order' => 8, 'is_active' => true],
            ['name' => 'CLIENT 9', 'order' => 9, 'is_active' => true],
            ['name' => 'CLIENT 10', 'order' => 10, 'is_active' => true],
            ['name' => 'CLIENT 11', 'order' => 11, 'is_active' => true],
            ['name' => 'CLIENT 12', 'order' => 12, 'is_active' => true],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}