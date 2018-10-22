<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PublicViewsComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
                            'welcome',
                            'public.event',
                            'public.contact',
                            'public.profile',
                            'public.participate',
                        ], 'App\Http\ViewComposers\PublicViewComposer');
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
