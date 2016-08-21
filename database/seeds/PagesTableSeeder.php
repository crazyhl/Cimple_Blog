<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Page::create([
            'title' => '这是一篇Cimple创建的文章',
            'description' => '',
            'content' => '欢迎使用Cimple',
            'type' => 1,
            'status' => 1,
        ]);
    }
}
