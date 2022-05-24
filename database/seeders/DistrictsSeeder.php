<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::truncate();

        $json = database_path('json/districts.json');
        $data = json_decode(file_get_contents($json), true);

        District::insert($data['records']);
    }
}
