<?php

namespace Logwood\DingPush;

use Illuminate\Support\ServiceProvider;

class DingPushServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // load config
        $this->publishes([
            __DIR__ . '/../config/dingpush.php' => config_path('dingpush.php')
        ]);
    }
}
