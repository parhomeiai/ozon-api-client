<?php

namespace Escorp\OzonApiClient\Api\Warehouses;

use Escorp\OzonApiClient\Api\AbstractOzonApi;
use Escorp\OzonApiClient\Dto\Warehouses\WarehouseListResponse;

use InvalidArgumentException;


/**
 * Работа со складами FBS и rFBS
 * https://docs.ozon.ru/api/seller/?__rr=1&abt_att=1#tag/WarehouseAPI
 */
class WarehouseApi extends AbstractOzonApi
{

    /**
     * Список складов
     * https://docs.ozon.ru/api/seller/?__rr=1&abt_att=1#operation/WarehouseListV2
     *
     * @param array $warehouseIds
     * @param string $cursor
     * @param int $limit
     * @return WarehouseListResponse
     * @throws InvalidArgumentException
     */
    public function list(array $warehouseIds = [], string $cursor = "", int $limit = 200): WarehouseListResponse
    {
        if(count($warehouseIds) > 200){
            throw new InvalidArgumentException('warehouseIds must be an array of no more than 200 elements');
        }

        if($limit > 200){
            throw new InvalidArgumentException('limit must be an integer of no more than 200');
        }

        $url = $this->baseUrl . '/v2/warehouse/list';

        $response = $this->request('POST', $url,[
            'json' => [
                'filter' => $limit,
                'cursor' => $cursor,
                'warehouse_ids' => $warehouseIds,
            ]
        ]);

        return WarehouseListResponse::fromArray($response);
    }

    /**
     * Возвращает все товары
     *
     * @param array $warehouseIds
     * @return array | \Escorp\OzonApiClient\Dto\Warehouses\WarehouseDTO[]
     */
    public function allWarehouses(array $warehouseIds = []): array
    {
        $cursor = '';
        $warehouses = [];

        do{
            $warehouseListResponse = $this->list($warehouseIds, $cursor);

            $warehouses = array_merge($warehouses, $warehouseListResponse->warehouses);

            $cursor = $warehouseListResponse->cursor;

            if ($warehouseListResponse->has_next) {
                usleep(20_000);
            }

        }while($warehouseListResponse->has_next);

        return $warehouses;
    }
}
