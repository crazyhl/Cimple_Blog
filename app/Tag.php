<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['title', 'count'];

    /**
     * 分类下的文章。
     */
    public function articles()
    {
        return $this->belongsToMany('App\Page');
    }
}
