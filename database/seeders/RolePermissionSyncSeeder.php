<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSyncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_id' => 1,
                'model_type' => 'App\Models\User',
            ],
            [
                'role_id' => 2,
                'model_id' => 2,
                'model_type' => 'App\Models\User',
            ],
            [
                'role_id' => 3,
                'model_id' => 3,
                'model_type' => 'App\Models\User',
            ],
        ]);

        DB::table('model_has_permissions')->insert([
            [
                'permission_id' => 1,
                'model_id' => 2,
                'model_type' => 'App\Models\User',
            ], [
                'permission_id' => 2,
                'model_id' => 2,
                'model_type' => 'App\Models\User',
            ], [
                'permission_id' => 3,
                'model_id' => 2,
                'model_type' => 'App\Models\User',
            ], [
                'permission_id' => 1,
                'model_id' => 3,
                'model_type' => 'App\Models\User',
            ], [
                'permission_id' => 2,
                'model_id' => 3,
                'model_type' => 'App\Models\User',
            ], [
                'permission_id' => 3,
                'model_id' => 3,
                'model_type' => 'App\Models\User',
            ]
        ]);
    }
}
