<?php

namespace Database\Seeders;

use App\Models\Flow;
use Illuminate\Database\Seeder;

class FlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flow = [
            [
                'name' => 'CS/Front Office',
            ],
            [
                'name' => 'BO Teknis',
            ],
            [
                'name' => 'BO Korektor',
            ],
            [
                'name' => 'BO Kasi',
            ],
            [
                'name' => 'BO Kabid',
            ],
            [
                'name' => 'Kepala Dinas',
            ]
        ];

        Flow::insert($flow);
    }
}
