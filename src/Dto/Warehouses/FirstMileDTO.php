<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

/**
 * Первая миля
 */
class FirstMileDTO
{
    /**
     * Идентификатор drop-off пункта.
     * @var string|null
     */
    public ?string $dropoff_point_id;

    /**
     * Признак, что настройки склада обновляются.
     * @var bool
     */
    public bool $first_mile_is_changing;

    /**
     * Время начала таймслота.
     * @var string|null
     */
    public ?string $timeslot_from;

    /**
     * Идентификатор таймслота.
     * @var int|null
     */
    public ?int $timeslot_id;

    /**
     * Время окончания таймслота.
     * @var string|null
     */
    public ?string $timeslot_to;

    /**
     * Тип первой мили — PICK_UP или DROP_OFF
     * @var string
     */
    public string $type;

    /**
     *
     * @param string|null $dropoff_point_id
     * @param bool $first_mile_is_changing
     * @param string|null $timeslot_from
     * @param int|null $timeslot_id
     * @param string|null $timeslot_to
     * @param string $type
     */
    function __construct(?string $dropoff_point_id, bool $first_mile_is_changing, ?string $timeslot_from, ?int $timeslot_id, ?string $timeslot_to, string $type) {
        $this->dropoff_point_id = $dropoff_point_id;
        $this->first_mile_is_changing = $first_mile_is_changing;
        $this->timeslot_from = $timeslot_from;
        $this->timeslot_id = $timeslot_id;
        $this->timeslot_to = $timeslot_to;
        $this->type = $type;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['dropoff_point_id'] ?? null,
            $data['first_mile_is_changing'] ?? false,
            $data['timeslot_from'] ?? null,
            $data['timeslot_id'] ?? null,
            $data['timeslot_to'] ?? null,
            $data['type'] ?? 'UNSPECIFIED'
        );
    }
}
