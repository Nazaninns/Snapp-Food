<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@user',
            'phone' => '1235465',
            'role' => 3,
            'password' => '123456'
        ]);
        $seller = \App\Models\User::factory()->create([
            'name' => 'seller',
            'email' => 'seller@user',
            'phone' => '1235465',
            'role' => 2,
            'password' => '123456'
        ]);

        /*
        $adminRole = Role::create(['name' => 'admin'])
        $sellerRole = Role::create(['name' => 'seller'])

        $admin->assignRole('admin');
        $seller->assignRole('seller');

        */
    }
}
