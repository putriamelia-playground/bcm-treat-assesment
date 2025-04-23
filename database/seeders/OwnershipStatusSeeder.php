<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnershipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'owner_status_name' => 'Sewa',
            ],
            [
                'id' => 2,
                'owner_status_name' => 'Hak Milik',
            ],
            [
                'id' => 3,
                'owner_status_name' => 'Hak Guna Bangunan',
            ],
        ];

        OwnershipStatus::insert($data);
    }
}
