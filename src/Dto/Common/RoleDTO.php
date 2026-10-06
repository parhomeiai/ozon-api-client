<?php

namespace Escorp\OzonApiClient\Dto\Common;

/**
 * Информация о роли и методах
 */
class RoleDTO
{
    /**
     * Название роли.
     * @var string
     */
    public string $name;

    /**
     * Методы, доступные для роли.
     * @var array
     */
    public array $methods;

    /**
     *
     * @param string $name
     * @param array $methods
     */
    function __construct(string $name, array $methods)
    {
        $this->name = $name;
        $this->methods = $methods;
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
            $data['name'] ?? '',
            (isset($data['methods']) && is_array($data['methods'])) ? $data['methods'] : []
        );
    }
}
