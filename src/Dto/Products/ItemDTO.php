<?php

namespace Escorp\OzonApiClient\Dto\Products;

use InvalidArgumentException;

/**
 * Информация о товарк
 */
class ItemDTO
{
    public ?bool $archived;
    public ?bool $has_fbo_stocks;
    public ?bool $has_fbs_stocks;
    public ?bool $is_discounted;
    public ?string $offer_id;
    public ?int $product_id;
    public ?int $sku;
    public array $quants;

    /**
     *
     * @param bool|null $archived
     * @param bool|null $has_fbo_stocks
     * @param bool|null $has_fbs_stocks
     * @param bool|null $is_discounted
     * @param string|null $offer_id
     * @param int|null $product_id
     * @param int|null $sku
     * @param array $quants
     * @throws InvalidArgumentException
     */
    function __construct(?bool $archived, ?bool $has_fbo_stocks, ?bool $has_fbs_stocks, ?bool $is_discounted, ?string $offer_id, ?int $product_id, ?int $sku, array $quants)
    {
        foreach ($quants as $q) {
            if (!$q instanceof QuantDTO) {
                throw new InvalidArgumentException('quants must contain QuantDTO');
            }
        }

        $this->archived = $archived;
        $this->has_fbo_stocks = $has_fbo_stocks;
        $this->has_fbs_stocks = $has_fbs_stocks;
        $this->is_discounted = $is_discounted;
        $this->offer_id = $offer_id;
        $this->product_id = $product_id;
        $this->sku = $sku;
        $this->quants = $quants;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $quants = [];
        foreach ($data['quants'] ?? [] as $quant) {
            $quants[] = QuantDTO::fromArray($quant);
        }

        return new self(
            $data['archived'] ?? null,
            $data['has_fbo_stocks'] ?? null,
            $data['has_fbs_stocks'] ?? null,
            $data['is_discounted'] ?? null,
            $data['offer_id'] ?? null,
            $data['product_id'] ?? null,
            $data['sku'] ?? null,
            $quants
        );
    }
}
