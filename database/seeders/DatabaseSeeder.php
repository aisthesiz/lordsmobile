<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'password' => Hash::make('123'),
        ]);

        $userApi = \App\Models\User::factory()->create([
            'name' => 'Api',
            'email' => 'api@api.com',
            'is_admin' => false,
            'password' => Hash::make('123'),
        ]);

        $user01 = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'is_admin' => false,
            'password' => Hash::make('123'),
        ]);

        $filePath = storage_path('configs/settings.json');
        $settingsContent = file_get_contents($filePath);

        foreach(['1625103499','1625104056','1625104223'] as $accountId) {
            \App\Models\Account::factory()->create([
                'user_id' => $user01->id,
                'lord_account_id' => $accountId,
                'params' => $settingsContent,
                'is_active' => true,
                'time_start' => Carbon::now(),
                'time_end' => Carbon::now()->addMonths(3),
            ]);
        }

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'read api']);
        Permission::create(['name' => 'write api']);
        $role = Role::create(['name' => 'api']);
        $role->givePermissionTo('read api');
        $role->givePermissionTo('write api');
        $userApi->assignRole('api');
    }
}
