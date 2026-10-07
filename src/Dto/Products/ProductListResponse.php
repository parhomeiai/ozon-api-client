<?php

namespace Escorp\OzonApiClient\Dto\Products;

use Escorp\OzonApiClient\Dto\OzonApiResponseDto;

/**
 * Список товаров
 *
 * Используется в endpoint:
 * POST https://api-seller.ozon.ru/v3/product/list
 */
class ProductListResponse extends OzonApiResponseDto
{
    /**
     * Идентификатор последнего значения на странице.
     * @var string|null
     */
    public ?string $last_id;

    /**
     * Всего товаров.
     * @var int
     * @deprecated
     */
    public int $total;

    /**
     * Всего товаров.
     * @var int
     */
    public int $total_items;

    /**
     * Список товаров.
     * @var array | ItemDTO[]
     */
    public array $items = [];


    public static function fromArray(array $response): self
    {
        $ozonApiResponseDto = parent::fromArray($response);

        $dto = new self($ozonApiResponseDto->data);

        $dto->last_id = $response['result']['last_id'] ?? null;

        $dto->total = $response['result']['total'] ?? 0;
        $dto->total_items = $response['result']['total_items'] ?? 0;

        $items = $response['result']['items'] ?? [];

        foreach ($items as $item) {
            $dto->items[] = ItemDTO::fromArray($item);
        }

        return $dto;
    }

    /**
     * Возвращает информацию о товарах
     * @return array | ItemDTO[]
     */
    public function items(): array
    {
        return $this->items;
    }
}
