<?php

namespace Database\Seeders;

use App\Models\ApabType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApabTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'apab_type_name' => 'APAB Serbuk Kimia Kering (Dry Chemical Powder)',
            ],
            [
                'id' => 2,
                'apab_type_name' => 'APAB Karbon Dioksida (CO₂)',
            ],
            [
                'id' => 3,
                'apab_type_name' => 'APAB Busa (Foam)',
            ],
            [
                'id' => 4,
                'apab_type_name' => 'APAB Clean Agent',
            ],
            [
                'id' => 5,
                'apab_type_name' => 'APAB Air (Water Extinguisher)',
            ],
        ];

        ApabType::insert($data);
    }
}
