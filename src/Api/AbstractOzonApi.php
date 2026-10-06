<?php

namespace Escorp\OzonApiClient\Api;

use Escorp\OzonApiClient\Contracts\HttpClientInterface;
use Escorp\OzonApiClient\Contracts\TokenProviderInterface;

/**
 * Базовый класс для всех Domain API
 *
 */
abstract class AbstractOzonApi
{
    protected HttpClientInterface $http;
    protected TokenProviderInterface $token;

    protected string $baseUrl;

    public function __construct(
        HttpClientInterface $http,
        TokenProviderInterface $token,
        ?string $baseUrl = null)
    {
        $this->http = $http;
        $this->token = $token;

        $this->baseUrl = ($baseUrl) ? ($baseUrl) : ('https://api-seller.ozon.ru');
    }

    /**
     * Выполняет запрос, подставляет токен
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return array
     */
    protected function request(string $method, string $url, array $options = []): array
    {
        if(!isset($options['headers']['Client-Id'])){
            $options['headers']['Client-Id'] = $this->token->getClientId();
        }

        if(!isset($options['headers']['Api-Key'])){
            $options['headers']['Api-Key'] = $this->token->getApiKey();
        }

        $response = $this->http->request($method, $url, $options);

        return $response;
    }
}
