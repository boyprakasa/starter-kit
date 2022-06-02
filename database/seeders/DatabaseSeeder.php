<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(VillagesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(FlowSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSyncSeeder::class);
        $this->call(AdminProfileSeeder::class);
        $this->call(MemberProfileSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(JenisKegiatanSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
