<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 页面表 文章和页面公用一个表
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // 标题
            $table->string('description'); // 描述
            $table->string('content'); // 内容
            $table->unsignedInteger('type'); // 1 文章 2 页面
            $table->unsignedTinyInteger('status'); // 状态 1 正常 0 草稿
            $table->unsignedInteger('order')->default(0);
            $table->unsignedTinyInteger('isTop')->default(0);
            $table->index('type');
            $table->unique('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
