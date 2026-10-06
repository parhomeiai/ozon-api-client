<?php

namespace Escorp\OzonApiClient;

use Escorp\OzonApiClient\Api\Common\RolesApi;
use Escorp\OzonApiClient\Api\Products\ProductApi;

class OzonApiClient
{

    public RolesApi $rolesApi;
    public ProductApi $productApi;

    public function __construct(
        RolesApi $rolesApi,
        ProductApi $productApi
    ) {
        $this->rolesApi = $rolesApi;
        $this->productApi = $productApi;
    }

    public function ping(): string
    {
        return 'Ozon API client works';
    }

    public function rolesApi(): RolesApi
    {
        return $this->rolesApi;
    }

    public function productApi(): ProductApi
    {
        return $this->productApi;
    }
}