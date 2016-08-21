<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'M1racle',
            'email' => 'crazyhl@163.com',
            'password' => bcrypt('111111'),
        ]);
    }
}
