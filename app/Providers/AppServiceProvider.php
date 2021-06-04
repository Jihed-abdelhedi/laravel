<?php

namespace App\Providers;

//use Illuminate\Contracts\Pagination\Paginator;

use App\Models\Category;
//use App\Models\Livre;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();
        View::share([
            'application_name' => 'APP Livre',
            //'categories'=>Category::all(),
           // 'livres'=>Livre::all()
           'categories'=>Category::with('livres')->get()

            ]);
    }
}
