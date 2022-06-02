<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatan = [
            ['nama' => 'Pusat Kegiatan'],
            ['nama' => 'Permukiman'],
            ['nama' => 'Infrastruktur']
        ];

        Kegiatan::insert($kegiatan);
    }
}
