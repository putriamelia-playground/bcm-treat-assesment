<?php

namespace Database\Seeders;

use App\Models\AparType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AparTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'apar_type_name' => 'APAR Air',
            ],
            [
                'id' => 2,
                'apar_type_name' => 'APAR Karbon Dioksida (CO₂)',
            ],
            [
                'id' => 3,
                'apar_type_name' => 'APAR Busa',
            ],
            [
                'id' => 4,
                'apar_type_name' => 'APAR Serbuk Kimia Kering',
            ],
            [
                'id' => 5,
                'apar_type_name' => 'APAR Clean Agent',
            ],
            [
                'id' => 6,
                'apar_type_name' => 'APAR Wet Chemical',
            ],
        ];

        AparType::insert($data);
    }
}
