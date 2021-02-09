<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'moaz',
            'email' => 'moazmarouf444@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01222442506',
            'is_Admin' => 1,
        ]);
    }
}
