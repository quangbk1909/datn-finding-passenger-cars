<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use App\Notification;


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
        
        
        
        view()->composer('*', function ($view) 
        {
            if (Auth::check()) {
                $user = Auth::user();
                $notifications = Notification::where('user_id','=',$user->id)->orderBy('created_at','desc')->limit(5)->get();
                view()->share('notifications',$notifications); 
            }   
        }); 
        
    }
}
