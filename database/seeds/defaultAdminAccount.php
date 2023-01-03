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
        DB::table('users')->where('email', 'client@example.com')->update(['role' => 'admin']);
    }
}
