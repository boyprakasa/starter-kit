<?php

namespace Database\Seeders;

use App\Models\SkalaBangkitan;
use Illuminate\Database\Seeder;

class BangkitanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bangkitan = [
            [
                'index' => 'A',
                'nama' => 'Bangkitan Lalu Lintas Tinggi',
                'deskripsi' => 'Membangkitkan >= 1.500 perjalanan per jam',
                'min' => '>= 1500',
                'max' => '> 1500',
            ],
            [
                'index' => 'B',
                'nama' => 'Bangkitan Lalu Lintas Sedang',
                'deskripsi' => 'Membangkitkan >= 500 sd < 1.500 perjalanan per jam',
                'min' => '>= 500',
                'max' => '< 1500',
            ],
            [
                'index' => 'C',
                'nama' => 'Bangkitan Lalu Lintas Rendah',
                'deskripsi' => 'Membangkitkan >= 100 sd < 500 perjalanan per jam',
                'min' => '>= 100',
                'max' => '< 500',
            ],
        ];

        SkalaBangkitan::insert($bangkitan);
    }
}
