<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

/**
 * Расписание работы склада.
 */
class WorkingHoursDTO
{
    /**
     * Время начала работы
     * @var string|null
     */
    public ?string $time_from;

    /**
     * Время окончания работы.
     * @var string|null
     */
    public ?string $time_to;

    /**
     *
     * @param string|null $time_from
     * @param string|null $time_to
     */
    function __construct(?string $time_from, ?string $time_to) {
        $this->time_from = $time_from;
        $this->time_to = $time_to;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['time_from'] ?? null,
            $data['time_to'] ?? null
        );
    }
}
