<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 'TITLE' => 'CimpleBlog',
        'KEYWORDS' => '',
        'DESCRIPTION' => '',
        'PER_PAGE' => 10, // 分页的每页数量
        'BN_NO' => '',// 备案号
         */
        \App\Option::create([
            'name' => 'TITLE',
            'value' => 'CimpleBlog',
        ]);
        \App\Option::create([
            'name' => 'KEYWORDS',
            'value' => '',
        ]);
        \App\Option::create([
            'name' => 'DESCRIPTION',
            'value' => '',
        ]);
        \App\Option::create([
            'name' => 'PER_PAGE',
            'value' => '15',
        ]);
        \App\Option::create([
            'name' => 'BN_NO',
            'value' => '',
        ]);
    }
}
