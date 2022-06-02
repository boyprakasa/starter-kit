<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Seeder;

class JenisKegiatanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisKegiatan = [
            [
                'kegiatan_id' => 1,
                'index' => 'A',
                'nama' => 'Kegiatan Perdagangan dan Perbelanjaan'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'B',
                'nama' => 'Kegiatan Perkantoran'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'C',
                'nama' => 'Kegiatan Industri dan Pergudangan'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'D',
                'nama' => 'Kegiatan Pariwisata'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'E',
                'nama' => 'Fasilitas Kesehatan'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'F',
                'nama' => 'Fasilitas Pelayanan Umum'
            ],
            [
                'kegiatan_id' => 1,
                'index' => 'G',
                'nama' => 'Pusat Kegiatan Lain Yang Dapat Menimbulkan Bangkitan dan/atau Tarikan Lalu Lintas'
            ],
            [
                'kegiatan_id' => 2,
                'index' => 'A',
                'nama' => 'Perumahan dan Permukiman'
            ],
            [
                'kegiatan_id' => 2,
                'index' => 'B',
                'nama' => 'Rumah Susun dan Apartemen'
            ],
            [
                'kegiatan_id' => 2,
                'index' => 'C',
                'nama' => 'Permukiman Lain Yang Dapat Menimbulkan Bangkitan dan/atau Tarikan Lalu Lintas'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'A',
                'nama' => 'Akses ke dan dari Jalan Tol'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'B',
                'nama' => 'Pelabuhan'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'C',
                'nama' => 'Bandar Udara'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'D',
                'nama' => 'Terminal'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'E',
                'nama' => 'Stasiun Kereta Api'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'F',
                'nama' => 'Tempat Penyimpanan Kendaraan (pool)'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'G',
                'nama' => 'Fasilitas Parkir Umum'
            ],
            [
                'kegiatan_id' => 3,
                'index' => 'H',
                'nama' => 'Insfrasruktur Lain Yang Dapat Menimbulkan Bangkitan dan/atau Tarikan Lalu Lintas'
            ],
        ];

        JenisKegiatan::insert($jenisKegiatan);
    }
}
