<?php

namespace Database\Seeders;

use App\Models\MemberProfile;
use Illuminate\Database\Seeder;

class MemberProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member_profiles = [
            [
                'user_id' => 4,
                'identity_number' => '3502093005980003',
                'gender' => 'L',
                'phone' => '6282333589277'
            ],
        ];

        MemberProfile::insert($member_profiles);
    }
}
