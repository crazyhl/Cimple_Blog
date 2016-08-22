<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $fillable = ['title', 'description', 'count', 'order'];

    /**
     * 分类下的文章。
     */
    public function articles()
    {
        return $this->belongsToMany('App\Page');
    }
}
