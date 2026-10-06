<?php

declare(strict_types=1);

namespace Escorp\OzonApiClient\Factory;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientInterface;

use Escorp\OzonApiClient\Api\Common\RolesApi;
use Escorp\OzonApiClient\Api\Products\ProductApi;

use Escorp\OzonApiClient\Auth\StaticTokenProvider;
use Escorp\OzonApiClient\Http\GuzzleHttpClient;
use Escorp\OzonApiClient\Http\Psr18HttpClient;
use Escorp\OzonApiClient\OzonApiClient;


final class OzonApiClientFactory
{
    /**
     * Создание клиента
     *
     * @param string $clientId
     * @param string $apiKey
     * @param array{
     *   timeout?: int,
     *   retry_times?: int,
     *   retry_sleep_ms?: int
     * } $options
     * @param ClientInterface|null $psr18Client
     * @return OzonApiClient
     */
    public static function make(string $clientId, string $apiKey, array $options = [], ?ClientInterface $psr18Client = null): OzonApiClient
    {
        $timeout = $options['timeout'] ?? 10;
        $retryTimes = $options['retry_times'] ?? 3;
        $retrySleepMs = $options['retry_sleep_ms'] ?? 300;

        if ($psr18Client === null) {
            // дефолтный Guzzle → PSR-18 адаптер
            $psr18Client = new GuzzleClient(['timeout' => $timeout]);
        }

        $http = new Psr18HttpClient(
            $psr18Client,
            new HttpFactory(),
            new HttpFactory()
        );

        //retry-обертка поверх PSR-18
        $guzzleHttpClient = new GuzzleHttpClient($http, $retryTimes, $retrySleepMs);

        // Token provider
        $tokenProvider = new StaticTokenProvider($clientId, $apiKey);


        //Domain API
        $rolesApi = new RolesApi($guzzleHttpClient, $tokenProvider);
        $productApi = new ProductApi($guzzleHttpClient, $tokenProvider);


        //Root client
        return new OzonApiClient(
                    $rolesApi,
                    $productApi
                );
    }
}

