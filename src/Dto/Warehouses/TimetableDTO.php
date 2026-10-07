<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

/**
 * Расписание работы склада.
 */
class TimetableDTO
{
    /**
     * Дата начала работы склада.
     * @var string|null
     */
    public ?string $timetable_from;

    /**
     * Дата окончания работы склада.
     * @var string|null
     */
    public ?string $timetable_to;

    /**
     * Часы работы склада.
     * @var WorkingHoursDTO|null
     */
    public ?WorkingHoursDTO $working_hours;

    /**
     *
     * @param string|null $timetable_from
     * @param string|null $timetable_to
     * @param WorkingHoursDTO|null $working_hours
     */
    function __construct(?string $timetable_from, ?string $timetable_to, ?WorkingHoursDTO $working_hours) {
        $this->timetable_from = $timetable_from;
        $this->timetable_to = $timetable_to;
        $this->working_hours = $working_hours;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['timetable_from'] ?? null,
            $data['timetable_to'] ?? null,
            $data['working_hours'] ? WorkingHoursDTO::fromArray($data['working_hours']) : null
        );
    }
}
