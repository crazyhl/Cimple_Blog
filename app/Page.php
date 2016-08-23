<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'description', 'content', 'type', 'status', 'order', 'isTop'];

    /**
     * 查询所有的文章.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArticles($query)
    {
        return $query->where('type',1)->orderBy('isTop', 'desc')->orderBy('updated_at', 'desc');
    }

    /**
     * 查询所有的文章
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePages($query)
    {
        return $query->where('type',2)->orderBy('order', 'desc')->orderBy('id', 'desc');
    }

    /**
     * 设置用户的名字.
     *
     * @param string $value
     *
     * @return string
     */
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $value;
        $descArr = explode('<!--more-->', $value);
        $this->attributes['description'] = '';
        if (count($descArr) > 1) {
            $this->attributes['description'] = $descArr[0];
        }
    }

    /**
     * 文章的分类。
     */
    public function cates()
    {
        return $this->belongsToMany('App\Cate');
    }

    /**
     * 文章的标签.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
