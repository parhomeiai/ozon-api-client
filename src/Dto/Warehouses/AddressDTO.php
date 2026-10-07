<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

/**
 * Информация о расположении склада.
 */
class AddressDTO
{
    /**
     * Адрес склада.
     * @var string|null
     */
    public ?string $address;

    /**
     * Широта
     * @var float|null
     */
    public ?float $latitude;

    /**
     * Долгота
     * @var float|null
     */
    public ?float $longitude;

    /**
     * Часовой пояс
     * @var string|null
     */
    public ?string $utc;

    /**
     *
     * @param string|null $address
     * @param float|null $latitude
     * @param float|null $longitude
     * @param string|null $utc
     */
    function __construct(?string $address, ?float $latitude, ?float $longitude, ?string $utc) {
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->utc = $utc;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['address'] ?? null,
            $data['latitude'] ?? null,
            $data['longitude'] ?? null,
            $data['utc'] ?? null
        );
    }
}
