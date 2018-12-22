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
                            'public.participation',
                            'public.news',
                            'public.contact',
                            'public.profile',
                            'public.participate',
                            'auth.passwords.email',
                            'auth.passwords.reset'
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
