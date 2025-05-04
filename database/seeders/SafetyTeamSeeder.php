<?php

namespace Database\Seeders;

use App\Models\BuildingSafetyTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SafetyTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'location_type' => 1,
                'parent_type' => 'Ketua Tim Tanggap Darurat Kepala Regu Pemadam Api',
                'status' => 'Posko/Ruang Kontrol',
            ],
            [
                'id' => 2,
                'location_type' => 1,
                'parent_type' => 'Ketua Tim Tanggap Darurat Kepala Regu Pemadam Api',
                'status' => 'Pemadam Api',
            ],
            [
                'id' => 3,
                'location_type' => 1,
                'parent_type' => 'Ketua Tim Tanggap Darurat Kepala Regu Pemadam Api',
                'status' => 'Proteksi Kebakaran: Ruang Pompa, Penyediaan Air, Press Fan, Alarm',
            ],
            [
                'id' => 4,
                'location_type' => 1,
                'parent_type' => 'Ketua Tim Tanggap Darurat Kepala Regu Pemadam Api',
                'status' => 'Listrik dan Genset',
            ],
            [
                'id' => 5,
                'location_type' => 1,
                'parent_type' => 'Ketua Tim Tanggap Darurat Kepala Regu Pemadam Api',
                'status' => 'Lift',
            ],
            [
                'id' => 6,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Kepala Regu Keamanan Gedung',
            ],
            [
                'id' => 7,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Pengatur Parkir',
            ],
            [
                'id' => 8,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Captain Floor',
            ],
            [
                'id' => 9,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Deputy Floor',
            ],
            [
                'id' => 10,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Penyelamat Dokumen',
            ],
            [
                'id' => 11,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Evakuasi dan Peran Lantai',
                'status' => 'Pencari',
            ],
            [
                'id' => 12,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Logistik dan Sarana',
                'status' => 'Unit Sarana & Prasarana',
            ],
            [
                'id' => 13,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Logistik dan Sarana',
                'status' => 'Tangga Darurat',
            ],
            [
                'id' => 14,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Logistik dan Sarana',
                'status' => 'Koordinator Logistik',
            ],
            [
                'id' => 15,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Logistik dan Sarana',
                'status' => 'Koordinator Transportasi',
            ],
            [
                'id' => 16,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Persiapan Assembly Point & K3',
                'status' => 'Koordinator P3K',
            ],
            [
                'id' => 17,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Persiapan Assembly Point & K3',
                'status' => 'Dokumentasi',
            ],
            [
                'id' => 18,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Persiapan Assembly Point & K3',
                'status' => 'Informasi Internal',
            ],
            [
                'id' => 19,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Persiapan Assembly Point & K3',
                'status' => 'Informasi Eksternal',
            ],
            [
                'id' => 20,
                'location_type' => 1,
                'parent_type' => 'Kepala Regu Persiapan Assembly Point & K3',
                'status' => 'Persiapan Assembly Point',
            ],
            [
                'id' => 21,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Pengarah Tim Tanggap Darurat Kantor Wilayah/Cabang',
            ],
            [
                'id' => 22,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Ketua Tim Tanggap Darurat Kantor Wilayah/Cabang',
            ],
            [
                'id' => 23,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Captain Floor',
            ],
            [
                'id' => 24,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Deputy Floor',
            ],
            [
                'id' => 25,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Penyelamat Dokumen',
            ],
            [
                'id' => 26,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Pemadam Api',
            ],
            [
                'id' => 27,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Keamanan',
            ],
            [
                'id' => 28,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Persiapan Assembly Point dan Parkir',
            ],
            [
                'id' => 29,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Transportasi',
            ],
            [
                'id' => 30,
                'location' => 0,
                'parent_type' => null,
                'status' => 'P3K',
            ],
            [
                'id' => 31,
                'location' => 0,
                'parent_type' => null,
                'status' => 'Teknisi',
            ],
        ];

        BuildingSafetyTeam::insert($data);
    }
}
