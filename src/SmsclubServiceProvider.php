<?php

namespace Nekkoy\GatewaySmsclub;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class SmsclubServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewaySmsclub\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewaySmsclub\Services\GatewayService();
        });

        $this->app->singleton('gateway-smsclub', function ($app) {
            return new \Nekkoy\GatewaySmsclub\Services\GatewaySmsclubService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-smsclub.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-smsclub');
    }
}
