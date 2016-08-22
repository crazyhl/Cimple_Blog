<?php

namespace App\Providers;

use App\Option;
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
        //
        $optionsEq = Option::all();
        $options = [];
        foreach ($optionsEq as $option) {
            $options[$option->name] = $option->value;
        }
        view()->share('option', $options);
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
