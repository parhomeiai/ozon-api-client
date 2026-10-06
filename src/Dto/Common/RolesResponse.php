<?php

namespace Escorp\OzonApiClient\Dto\Common;

use Escorp\OzonApiClient\Dto\OzonApiResponseDto;

/**
 * Получить список ролей и методов по API-ключу
 *
 * Используется в endpoint:
 * POST https://api-seller.ozon.ru/v1/roles
 */
class RolesResponse extends OzonApiResponseDto
{
    public string $expires_at;

    /**
     *
     * @var array
     */
    public array $roles = [];


    public static function fromArray(array $response): self
    {
        $ozonApiResponseDto = parent::fromArray($response);

        $dto = new self($ozonApiResponseDto->data);

        $dto->expires_at = $response['expires_at'] ?? null;

        $roles = $response['roles'] ?? [];

        foreach ($roles as $role) {
            $dto->roles[] = RoleDTO::fromArray($role);
        }

        return $dto;
    }

    /**
     * Возвращает информацию о ролях
     * @return array | RoleDTO[]
     */
    public function roles(): array
    {
        return $this->roles;
    }
}
