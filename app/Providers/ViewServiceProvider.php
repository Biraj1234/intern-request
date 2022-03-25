<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        view()->composer(['frontend.includes.header'], function ($view) {
            $menuItems = Category::whereStatus(1)->pluck('title', 'slug')->all();
            $view->with(['menuItems' => ['' => 'Home'] + $menuItems]);
        });
    }
}
