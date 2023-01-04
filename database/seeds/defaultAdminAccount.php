<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class defaultAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'name' => 'Admin',
            'role' => 'admin',
        ]);
    }
}
