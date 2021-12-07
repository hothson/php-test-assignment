<?php

namespace App\Providers;

use App\Services\SlackWebhook;
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
        $this->app->singleton(SlackWebhook::class, function () {
            return new SlackWebhook(config('services.slack.webhook'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
