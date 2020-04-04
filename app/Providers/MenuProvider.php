<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class MenuProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getMenu();
    }

    private function getMenu()
    {
        \Illuminate\Support\Facades\View::composer('layouts.main', function ($view){
            $view->with('menu', \view('menu'));
        });
    }
}
