<?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;

// class UserSeeder extends Seeder
// {
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
        // Membuat role
        // $roleAdmin = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        // $roleCustomer = \Spatie\Permission\Models\Role::create(['name' => 'customer']);

        // Membuat user admin
        // $userAdmin = \App\Models\User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@rental.com',
        //     'password' => bcrypt('admin123'),
        // ]);

        // Membuat user customer
        // $userCustomer = \App\Models\User::create([
        //     'name' => 'Customer',
        //     'email' => 'customer@rental.com',
        //     'password' => bcrypt('customer123'),
        // ]);

        // Memberikan role ke user
        // $userAdmin->assignRole($roleAdmin);
        // $userCustomer->assignRole($roleCustomer);
//     }
// }


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roleAdmin = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $roleCustomer = \Spatie\Permission\Models\Role::create(['name' => 'customer']);

        $userAdmin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@rental.com',
            'password' => bcrypt('admin123'),
        ]);

        $userCustomer = \App\Models\User::create([
            'name' => 'Customer',
            'email' => 'customer@rental.com',
            'password' => bcrypt('customer123'),
        ]);

        $userAdmin->assignRole($roleAdmin);
        $userCustomer->assignRole($roleCustomer);
    }
}
