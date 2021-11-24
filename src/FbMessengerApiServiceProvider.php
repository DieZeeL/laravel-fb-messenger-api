<?php

namespace diezeel\LaravelFbMessengerApi;

use diezeel\LaravelFbMessengerApi\Facades\FacebookMessenger;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class FbMessengerApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/facebook.php' => \config_path('facebook.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/facebook.php', 'facebook');

        $this->app->bind('InstagramMessenger', function ($app){
            $config = $app['config']->get('facebook.config');
            return new InstagramMessenger($config);
        });
        $this->app->bind('InstagramMessenger',InstagramMessenger::class);
        $this->app->bind('FacebookMessenger',FacebookMessenger::class);
//        $this->app->singleton(Factory::class, function ($app) {
//            return new SocialiteManager($app);
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['FacebookMessenger','InstagramMessenger'];
    }
}
