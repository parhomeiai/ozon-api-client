<?php

namespace Escorp\OzonApiClient\Contracts;

interface TokenProviderInterface
{
    public function getClientId(): string;
    public function getApiKey(): string;
}