<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Seeder;

class VillagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::truncate();

        $json = database_path('json/villages.json');
        $data = json_decode(file_get_contents($json), true);

        $chunks = collect($data['records'])->chunk(1000);

        foreach ($chunks as $chunk) {
            Village::insert($chunk->toArray());
        }
    }
}
