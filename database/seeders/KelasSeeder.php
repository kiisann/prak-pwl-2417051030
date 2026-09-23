<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KelasModel;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'A',
            'B',
            'C',
            'D',
        ];

        foreach($data as $kelas) {
            KelasModel::create([
                'nama_kelas' => $kelas,
            ]);
        }
    }
}
