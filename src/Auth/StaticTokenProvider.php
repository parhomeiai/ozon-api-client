<?php

namespace Escorp\OzonApiClient\Auth;

use Escorp\OzonApiClient\Contracts\TokenProviderInterface;

/**
 * Статический токен
 */
final class StaticTokenProvider implements TokenProviderInterface
{
    private string $clientId;
    private string $apiKey;

    public function __construct(string $clientId, string $apiKey)
    {
        $this->clientId = $clientId;
        $this->apiKey = $apiKey;
    }

    /**
     * Возвращает идентификатор клиента
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Возвращает токен
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
