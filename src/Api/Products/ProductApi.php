<?php

namespace Escorp\OzonApiClient\Api\Products;

use Escorp\OzonApiClient\Api\AbstractOzonApi;
use Escorp\OzonApiClient\Dto\Products\ProductListResponse;


/**
 * Загрузка и обновление товаров
 * https://docs.ozon.ru/api/seller/#tag/ProductAPI
 */
class ProductApi extends AbstractOzonApi
{

    /**
     * Список товаров
     * https://docs.ozon.ru/api/seller/#operation/ProductAPI_GetProductList
     *
     * @param string $lastId
     * @param array $filter
     * @param int $limit
     *
     * @return ProductListResponse
     */
    public function list(string $lastId = "", array $filter = ['visibility' => 'ALL'], int $limit = 1000): ProductListResponse
    {
        $url = $this->baseUrl . '/v3/product/list';

        $response = $this->request('POST', $url,[
            'json' => [
                'filter' => $filter,
                'last_id' => $lastId,
                'limit' => $limit,
            ]
        ]);

        return ProductListResponse::fromArray($response);
    }

    /**
     * Возвращает все товары
     *
     * @param array $filter
     * @return array
     */
    public function allProducts(array $filter = ['visibility' => 'ALL']): array
    {
        $lastId = '';
        $items = [];

        do{
            $productListResponse = $this->list($lastId, $filter);

            $items = array_merge($items, $productListResponse->items);

            $lastId = $productListResponse->last_id;

            if ($lastId) {
                usleep(20_000);
            }

        }while($lastId);

        return $items;
    }
}
