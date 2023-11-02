<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'nazanin',
            'email' => 'nazanin@gmail.com',
            'phone' => '1235465',
            'password' => '123456'
        ]);
        $seller = \App\Models\User::factory()->create([
            'name' => 'seller',
            'email' => 'seller@user',
            'phone' => '1235465',
            'password' => '123456'
        ]);

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class
        ]);
        $admin->assignRole('admin');
        $seller->assignRole('seller');
    }
}
