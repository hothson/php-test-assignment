<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Site::query()->truncate();
        \App\User::query()->truncate();
        \App\User::create([
            'email' => 'client@example.com',
            'password' => bcrypt('12345678'),
            'name' => 'John Doe',
        ]);
    }
}
