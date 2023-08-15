<?php

namespace App\Providers;

use App\Models\GeneralSetting;
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
        view()->composer(['layouts.app', 'authApp.auth.login','auth.login'], function ($view) {
            $id       =  GeneralSetting::latest('updated_at')->value('id');
            $title    =  GeneralSetting::where('id', $id)->value('site_name');
            $logo     =  GeneralSetting::where('id', $id)->value('logo');
            $favicon  =  GeneralSetting::where('id', $id)->value('favicon');

            $view->with('title', $title);
            $view->with('favicon', $favicon);
            $view->with('logo', $logo);
        });
    }
}
