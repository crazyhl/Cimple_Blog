<?php

use Illuminate\Database\Seeder;

class RelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('cate_page')->insert([
            'cate_id' => 1,
            'page_id' => 1,
        ]);
    }
}
