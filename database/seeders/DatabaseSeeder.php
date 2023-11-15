<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
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
        $customer=User::factory()->create([
            'name'=>'aa',
            'email'=>'a@gmail.com',
            'phone'=>'09122222222',
            'password'=>'Aa123456'
        ]);
        RestaurantCategory::query()->create([
            'name'=>'aaa',
        ]);
        RestaurantCategory::query()->create([
            'name'=>'bbb',
        ]);
        FoodCategory::query()->create([
            'name'=>'aaa'
        ]);
        FoodCategory::query()->create([
            'name'=>'bbb'
        ]);
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class
        ]);
        $admin->assignRole('admin');
        $seller->assignRole('seller');
        $customer->assignRole('customer');
    }
}
