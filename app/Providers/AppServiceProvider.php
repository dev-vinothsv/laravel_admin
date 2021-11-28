<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		//$session_id = Session::getId();
		//Log::info('Session ID:'.$session_id);
   
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
