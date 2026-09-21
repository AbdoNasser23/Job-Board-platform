<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name'     => 'Admin',
            'role'     => 'admin',
            'password' => bcrypt('123456789'),
        ]);


        User::firstOrCreate([
                'email' => "company@company.com",
            ], [
                'name'     => 'Abdo',
                'role'     => 'company_owner',
                'password' => bcrypt('123456789'),

            ]);

    }
}
