<?php

namespace Escorp\OzonApiClient\Dto\Products;

/**
 * Квант
 */
class QuantDTO
{
    /**
     * Идентификатор эконом-товара.
     * @var string|null
     */
    public ?string $quant_code;

    /**
     * Размер кванта.
     * @var int|null
     */
    public ?int $quant_size;

    /**
     *
     * @param string|null $quant_code
     * @param int|null $quant_size
     */
    function __construct(?string $quant_code, ?int $quant_size) {
        $this->quant_code = $quant_code;
        $this->quant_size = $quant_size;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['quant_code'] ?? null,
            $data['quant_size'] ?? null
        );
    }
}
