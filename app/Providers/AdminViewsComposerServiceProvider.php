<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminViewsComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
                            'admin.*',
                        ], 'App\Http\ViewComposers\AdminViewsComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
