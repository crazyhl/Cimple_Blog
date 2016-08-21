<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'description', 'content', 'type', 'status', 'order', 'isTop'];

    /**
     * 文章的分类。
     */
    public function cates()
    {
        return $this->belongsToMany('App\Cate');
    }
}
