<?php

namespace Database\Seeders;

use App\Models\SafetyTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SafetyToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'tool_name' => 'APAR',
                'tool_type' => 0,
            ],
            [
                'id' => 2,
                'tool_name' => 'APAB',
                'tool_type' => 0,
            ],
            [
                'id' => 3,
                'tool_name' => 'CCTV',
                'tool_type' => 0,
            ],
            [
                'id' => 4,
                'tool_name' => 'Genset',
                'tool_type' => 0,
            ],
            [
                'id' => 5,
                'tool_name' => 'Assembly Point',
                'tool_type' => 0,
            ],
            [
                'id' => 6,
                'tool_name' => 'Kotak P3K',
                'tool_type' => 0,
            ],
            [
                'id' => 7,
                'tool_name' => 'UPS (Uninterruptible Power Supply)',
                'tool_type' => 0,
            ],
            [
                'id' => 8,
                'tool_name' => 'Petunjuk dan Jalur Evakuasi',
                'tool_type' => 0,
            ],
            [
                'id' => 9,
                'tool_name' => 'Nomor Kontak Darurat',
                'tool_type' => 0,
            ],
            [
                'id' => 10,
                'tool_name' => 'Sistem Alarm dan Sensor Deteksi',
                'tool_type' => 1,
            ],
            [
                'id' => 11,
                'tool_name' => 'Panel Listrik',
                'tool_type' => 1,
            ],
            [
                'id' => 12,
                'tool_name' => 'Penangkal Petir',
                'tool_type' => 1,
            ],
            [
                'id' => 13,
                'tool_name' => 'Pintu Darurat',
                'tool_type' => 1,
            ],
            [
                'id' => 14,
                'tool_name' => 'Rambu Petunjuk',
                'tool_type' => 1,
            ],
            [
                'id' => 15,
                'tool_name' => 'Lift',
                'tool_type' => 1,
            ],
            [
                'id' => 16,
                'tool_name' => 'Ruang Server',
                'tool_type' => 1,
            ],
            [
                'id' => 17,
                'tool_name' => 'Sprinkler',
                'tool_type' => 1,
            ],
            [
                'id' => 18,
                'tool_name' => 'Tangga Darurat',
                'tool_type' => 1,
            ],
            [
                'id' => 19,
                'tool_name' => 'Hidran',
                'tool_type' => 1,
            ],
            [
                'id' => 20,
                'tool_name' => 'Trafo',
                'tool_type' => 1,
            ],
            [
                'id' => 21,
                'tool_name' => 'Paging Gedung',
                'tool_type' => 1,
            ],
        ];

        SafetyTool::insert($data);
    }
}
