<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();

        $json = database_path('json/provinces.json');
        $data = json_decode(file_get_contents($json), true);

        Province::insert($data['records']);
    }
}
