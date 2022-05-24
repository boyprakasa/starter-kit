<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $json = database_path('json/cities.json');
        $data = json_decode(file_get_contents($json), true);

        City::insert($data['records']);
    }
}
