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
                'tool_name' => 'Sistem Alarm dan Sensor Deteksi'
            ],
            [
                'id' => 2,
                'tool_name' => 'Panel Listrik'
            ],
            [
                'id' => 3,
                'tool_name' => 'Penangkal Petir'
            ],
            [
                'id' => 4,
                'tool_name' => 'Pintu Darurat'
            ],
            [
                'id' => 5,
                'tool_name' => 'Petunjuk dan Jalur Evakuasi'
            ],
            [
                'id' => 6,
                'tool_name' => 'Rambu Petunjuk'
            ],
            [
                'id' => 7,
                'tool_name' => 'Lift'
            ],
            [
                'id' => 8,
                'tool_name' => 'Nomor Kontak Darurat'
            ],
            [
                'id' => 9,
                'tool_name' => 'Ruang Server'
            ],
            [
                'id' => 10,
                'tool_name' => 'Sprinkler'
            ],
            [
                'id' => 11,
                'tool_name' => 'Tangga Darurat'
            ],
            [
                'id' => 12,
                'tool_name' => 'Hidran'
            ],
            [
                'id' => 13,
                'tool_name' => 'Trafo'
            ],
            [
                'id' => 14,
                'tool_name' => 'Paging Gedung'
            ],
            [
                'id' => 15,
                'tool_name' => 'APAR'
            ],
            [
                'id' => 16,
                'tool_name' => 'APAB'
            ],
            [
                'id' => 17,
                'tool_name' => 'CCTV'
            ],
            [
                'id' => 18,
                'tool_name' => 'Genset'
            ],
            [
                'id' => 19,
                'tool_name' => 'Assembly Point'
            ],
            [
                'id' => 20,
                'tool_name' => 'Kotak P3K'
            ],
            [
                'id' => 21,
                'tool_name' => 'UPS (Uninterruptible Power Supply)'
            ],
        ];

        SafetyTool::insert($data);
    }
}
