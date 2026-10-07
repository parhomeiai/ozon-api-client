<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

use Escorp\OzonApiClient\Dto\OzonApiResponseDto;

/**
 * Список складов
 *
 * Используется в endpoint:
 * POST https://api-seller.ozon.ru/v2/warehouse/list
 */
class WarehouseListResponse extends OzonApiResponseDto
{
    /**
     * Указатель для выборки следующих данных.
     * @var string|null
     */
    public ?string $cursor;

    /**
     * true, если в ответе вернулись не все значения
     * @var bool
     */
    public bool $has_next;

    /**
     * Список складов
     * @var array | WarehouseDTO[]
     */
    public array $warehouses = [];


    public static function fromArray(array $response): self
    {
        $ozonApiResponseDto = parent::fromArray($response);

        $dto = new self($ozonApiResponseDto->data);

        $dto->cursor = $response['cursor'] ?? null;

        $dto->has_next = $response['has_next'] ?? false;

        $warehouses = $response['warehouses'] ?? [];

        foreach ($warehouses as $warehouse) {
            $dto->warehouses[] = WarehouseDTO::fromArray($warehouse);
        }

        return $dto;
    }

    /**
     * Возвращает информацию о складах
     * @return array | WarehouseDTO[]
     */
    public function warehouses(): array
    {
        return $this->warehouses;
    }
}
