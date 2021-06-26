<?php

namespace App\Providers;

use App\Service\PaymentService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentService::class,function ($app){
            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /*Кастомная деректива для IF*/
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::if('admin',function (){
            return Auth::check() && Auth::user()->isAdmin();
        });

    }
}
