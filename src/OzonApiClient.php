<?php

namespace Escorp\OzonApiClient;

use Escorp\OzonApiClient\Api\Common\RolesApi;

class OzonApiClient
{

    public RolesApi $rolesApi;

    public function __construct(
        RolesApi $rolesApi
    ) {
        $this->rolesApi = $rolesApi;
    }

    public function ping(): string
    {
        return 'Ozon API client works';
    }

    public function rolesApi(): RolesApi
    {
        return $this->rolesApi;
    }
}