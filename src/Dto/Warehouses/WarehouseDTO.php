<?php

namespace Escorp\OzonApiClient\Dto\Warehouses;

/**
 * Информация о складе
 */
class WarehouseDTO
{
    public ?AddressDTO $address_info;
    public string $carriage_label_type;
    public string $courier_comment;
    public array $courier_phones;
    public ?string $created_at;
    public ?int $cut_in_time;
    public ?FirstMileDTO $first_mile;
    public bool $has_entrusted_acceptance;
    public bool $has_postings_limit;
    public bool $is_auto_assembly;
    public bool $is_comfort;
    public bool $is_express;
    public bool $is_kgt;
    public bool $is_rfbs;
    public bool $is_waybill_enabled;
    public ?int $min_postings_limit;
    public ?string $name;
    public ?string $pause_at;
    public ?string $phone;
    public int $postings_limit = -1;
    public ?int $sla_cut_in;
    public ?string $status;
    public ?TimetableDTO $timetable;
    public ?string $updated_at;
    public ?int $warehouse_id;
    public ?string $warehouse_type;
    public ?bool $with_item_list;
    public array $working_days;

    function __construct(?AddressDTO $address_info, string $carriage_label_type, string $courier_comment, array $courier_phones, ?string $created_at, ?int $cut_in_time, ?FirstMileDTO $first_mile, bool $has_entrusted_acceptance, bool $has_postings_limit, bool $is_auto_assembly, bool $is_comfort, bool $is_express, bool $is_kgt, bool $is_rfbs, bool $is_waybill_enabled, ?int $min_postings_limit, ?string $name, ?string $pause_at, ?string $phone, int $postings_limit, ?int $sla_cut_in, ?string $status, ?TimetableDTO $timetable, ?string $updated_at, ?int $warehouse_id, ?string $warehouse_type, ?bool $with_item_list, array $working_days) {
        $this->address_info = $address_info;
        $this->carriage_label_type = $carriage_label_type;
        $this->courier_comment = $courier_comment;
        $this->courier_phones = $courier_phones;
        $this->created_at = $created_at;
        $this->cut_in_time = $cut_in_time;
        $this->first_mile = $first_mile;
        $this->has_entrusted_acceptance = $has_entrusted_acceptance;
        $this->has_postings_limit = $has_postings_limit;
        $this->is_auto_assembly = $is_auto_assembly;
        $this->is_comfort = $is_comfort;
        $this->is_express = $is_express;
        $this->is_kgt = $is_kgt;
        $this->is_rfbs = $is_rfbs;
        $this->is_waybill_enabled = $is_waybill_enabled;
        $this->min_postings_limit = $min_postings_limit;
        $this->name = $name;
        $this->pause_at = $pause_at;
        $this->phone = $phone;
        $this->postings_limit = $postings_limit;
        $this->sla_cut_in = $sla_cut_in;
        $this->status = $status;
        $this->timetable = $timetable;
        $this->updated_at = $updated_at;
        $this->warehouse_id = $warehouse_id;
        $this->warehouse_type = $warehouse_type;
        $this->with_item_list = $with_item_list;
        $this->working_days = $working_days;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['address_info'] ? AddressDTO::fromArray($data['address_info']) : null,
            $data['carriage_label_type'] ?? 'UNSPECIFIED ',
            $data['courier_comment'] ?? '',
            $data['courier_phones'] ?? [],
            $data['created_at'] ?? null,
            $data['cut_in_time'] ?? null,
            $data['first_mile'] ? FirstMileDTO::fromArray($data['first_mile']) : null,
            $data['has_entrusted_acceptance'] ?? false,
            $data['has_postings_limit'] ?? false,
            $data['is_auto_assembly'] ?? false,
            $data['is_comfort'] ?? false,
            $data['is_express'] ?? false,
            $data['is_kgt'] ?? false,
            $data['is_rfbs'] ?? false,
            $data['is_waybill_enabled'] ?? false,
            $data['min_postings_limit'] ?? null,
            $data['name'] ?? null,
            $data['pause_at'] ?? null,
            $data['phone'] ?? null,
            $data['postings_limit'] ?? -1,
            $data['sla_cut_in'] ?? null,
            $data['status'] ?? null,
            $data['timetable'] ? TimetableDTO::fromArray($data['timetable']) : null,
            $data['updated_at'] ?? null,
            $data['warehouse_id'] ?? null,
            $data['warehouse_type'] ?? null,
            $data['with_item_list'] ?? null,
            $data['working_days'] ?? []
        );
    }
}
