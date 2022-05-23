<?php

namespace Database\Seeders;

use App\Models\AdminProfile;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'user_id' => 1,
                'identity_number' => '0000000000000001',
                'civil_servant_identity_number' => '11111111 111111 1 111',
                'gender' => 'L',
                'phone' => null,
                'flow_id' => null
            ],
            [
                'user_id' => 2,
                'identity_number' => '0000000000000002',
                'civil_servant_identity_number' => '11111111 111111 1 112',
                'gender' => 'L',
                'phone' => null,
                'flow_id' => null
            ],
            [
                'user_id' => 3,
                'identity_number' => '0000000000000003',
                'civil_servant_identity_number' => '11111111 111111 1 113',
                'gender' => 'L',
                'phone' => null,
                'flow_id' => null
            ],
        ];

        AdminProfile::insert($admin);
    }
}
