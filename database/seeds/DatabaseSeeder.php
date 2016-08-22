<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(CateTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(RelaTableSeeder::class);
        $this->call(OptionTableSeeder::class);

        Model::reguard();
    }
}
