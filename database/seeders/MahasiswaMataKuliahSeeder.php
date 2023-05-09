<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai = [
            [
                'mahasiswa_id' => 2141720264,
                'matakuliah_id' => 1,
                'nilai' => 88,
            ],
            [
                'mahasiswa_id' => 2141720264,
                'matakuliah_id' => 2,
                'nilai' => 91,
            ],
            [
                'mahasiswa_id' => 2141720264,
                'matakuliah_id' => 3,
                'nilai' => 80,
            ],
            [
                'mahasiswa_id' => 2141720264,
                'matakuliah_id' => 4,
                'nilai' => 85,
            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($nilai);
    }
}
