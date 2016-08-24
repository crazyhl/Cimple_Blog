<?php

namespace App\Providers;

use App\Cate;
use App\Option;
use App\Page;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 所有视图共享的数据
        $optionsEq = Option::all();
        $options = [];
        foreach ($optionsEq as $option) {
            $options[$option->name] = $option->value;
        }
        view()->share('option', $options);
        // 前台视图共享的数据
        view()->composer(['index.index','index.article'],function($view){
            $pages = Page::pages()->where('status', 1)->get();
            $view->with('pages', $pages);
            $cates = Cate::orderBy('order', 'desc')->get();
            $view->with('cates', $cates);
            $tags = Tag::all();
            $view->with('tags', $tags);
            $lastestArticle = Page::articles()->take(10)->get();
            $view->with('lastestArticle', $lastestArticle);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
