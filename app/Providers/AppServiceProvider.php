<?php

namespace App\Providers;

use App\Model\Category;
use App\Model\Page;
use App\Model\Skill;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->share('categories' , Category::get());
        view()->share('skills' , Skill::get());
        view()->share('pages' , Page::get());
    }
}
