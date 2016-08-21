<?php

use Illuminate\Database\Seeder;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cate::create([
            'title' => '未分类',
            'description' => '',
            'count' => '1',
        ]);
    }
}
