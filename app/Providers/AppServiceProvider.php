<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $authUser = session('auth_user');

            if (!is_array($authUser)) {
                $authUser = [];
            }

            $initial = null;

            if (!empty($authUser['name'])) {
                $initial = mb_strtoupper(mb_substr($authUser['name'], 0, 1));
            }

            $view->with([
                'authUser' => $authUser,
                'authUserInitial' => $initial,
                'today' => Carbon::now()->locale('es'),
            ]);
        });
    }
}
