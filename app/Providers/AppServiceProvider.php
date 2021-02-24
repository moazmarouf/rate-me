<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::share('unseenmessages', Message::orderBy('created_at', 'desc')->where('seen', 0)->where('type',1)->get());
        view::share('latestmessages', Message::orderBy('created_at', 'desc')->get());
    }
}
