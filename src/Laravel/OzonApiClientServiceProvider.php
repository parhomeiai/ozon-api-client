<?php

namespace Escorp\OzonApiClient\Laravel;

use Escorp\OzonApiClient\OzonApiClient;
use Escorp\OzonApiClient\Factory\OzonApiClientFactory;
use Illuminate\Support\ServiceProvider;

class OzonApiClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/ozon-api-client.php', 'ozon-api-client'
        );

        $this->app->singleton(OzonApiClient::class, function () {
            return OzonApiClientFactory::make(
                config('ozon-api-client.client_id'),
                config('ozon-api-client.api_key'),
                [
                    'timeout'        => config('ozon-api-client.http.timeout'),
                    'retry_times'    => config('ozon-api-client.http.retry.times'),
                    'retry_sleep_ms' => config('ozon-api-client.http.retry.sleep_ms'),
                ]
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/ozon-api-client.php' =>
                config_path('ozon-api-client.php'),
        ], 'ozon-api-client-config');
    }
}