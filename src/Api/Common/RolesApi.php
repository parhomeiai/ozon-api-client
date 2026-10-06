<?php

namespace Escorp\OzonApiClient\Api\Common;

use Escorp\OzonApiClient\Api\AbstractOzonApi;
use Escorp\OzonApiClient\Dto\Common\RolesResponse;


/**
 * Проверка подключения
 */
class RolesApi extends AbstractOzonApi
{

    /**
     * Метод для получения информации и ролях и методах, привязанных к API-ключу.
     * https://docs.ozon.ru/api/seller/#operation/AccessAPI_RolesByToken
     *
     * @return RolesResponse
     */
    public function roles(): RolesResponse
    {
        $url = $this->baseUrl . '/v1/roles';

        $response = $this->request('POST', $url);

        return RolesResponse::fromArray($response);
    }
}
