<?php

namespace Jreyt\Globelabs;


use Globe\Connect\Sms;
use Illuminate\Support\ServiceProvider;

class GlobeServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../../config/globe.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('globe.php')]);
        }elseif($this->app instanceof LumenApplication){
            $this->app->configure('globe');
        }

        $this->mergeConfigFrom($source,'globe')
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $sender = $app['config']['globe']['sender'];
        $app_id = $app['config']['globe']['app_id'];
        $app_secret = $app['config']['globe']['app_secret'];
        $passphrase = $app['config']['globe']['passphrase'];

        $this->app->singleton('globe', function($app) use ($sender,$app_id,$app_secret,$passphrase){
            return new Sms($sender,$app_id,$app_secret,$passphrase);
        });

        $this->app->alias('globe' , Sms::class)
    }

    public function provides()
    {
        return ['globe'];
    }
}
