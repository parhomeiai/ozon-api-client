<?php

namespace Escorp\OzonApiClient\Dto\Products;

use Escorp\OzonApiClient\Exceptions\DtoMappingException;

/**
 * Остаток на складе
 */
class StockDTO
{
    /**
     * Идентификатор товара в системе продавца — артикул
     * @var string|null
     */
    private ?string $offer_id;

    /**
     * Идентификатор товара в системе Ozon
     * @var int
     */
    private int $product_id;

    /**
     * Количество товара в наличии без учёта зарезервированных товаров
     * @var int
     */
    private int $stock;

    /**
     * Идентификатор склада
     * @var int
     */
    private int $warehouse_id;

    /**
     *
     * @param int $product_id
     * @param int $stock
     * @param int $warehouse_id
     * @param string|null $offer_id
     */
    function __construct(int $product_id, int $stock, int $warehouse_id, ?string $offer_id = null) {
        $this->offer_id = $offer_id;
        $this->product_id = $product_id;
        $this->stock = $stock;
        $this->warehouse_id = $warehouse_id;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['product_id', 'stock', 'warehouse_id'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("StockDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['product_id'],
            $data['stock'],
            $data['warehouse_id'],
            $data['offer_id'] ?? null
        );
    }

    function setOfferId(?string $offer_id): void
    {
        $this->offer_id = $offer_id;
    }

    function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    function setWarehouseId(int $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    function getOfferId(): ?string
    {
        return $this->offer_id;
    }

    function getProductId(): int {
        return $this->product_id;
    }

    function getStock(): int {
        return $this->stock;
    }

    function getWarehouseId(): int {
        return $this->warehouse_id;
    }

    public function toArray(): array
    {
        return array_filter([
            'offer_id' => $this->offer_id,
            'product_id' => $this->product_id,
            'stock' => $this->stock,
            'warehouse_id' => $this->warehouse_id
        ], fn($v) => $v !== null);
    }
}
