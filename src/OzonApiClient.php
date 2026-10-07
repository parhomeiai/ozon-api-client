<?php

namespace Escorp\OzonApiClient;

use Escorp\OzonApiClient\Api\Common\RolesApi;
use Escorp\OzonApiClient\Api\Products\ProductApi;
use Escorp\OzonApiClient\Api\Warehouses\WarehouseApi;

class OzonApiClient
{

    public RolesApi $rolesApi;
    public ProductApi $productApi;
    public WarehouseApi $warehouseApi;

    public function __construct(
        RolesApi $rolesApi,
        ProductApi $productApi,
        WarehouseApi $warehouseApi
    ) {
        $this->rolesApi = $rolesApi;
        $this->productApi = $productApi;
        $this->warehouseApi = $warehouseApi;
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

    public function warehouseApi(): WarehouseApi
    {
        return $this->warehouseApi;
    }
}