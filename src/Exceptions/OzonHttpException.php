<?php


namespace Escorp\OzonApiClient\Exceptions;

use Escorp\OzonApiClient\Dto\OzonErrorResponseDto;

/**
 * Расширенный Exception для ошибок Http
 *
 */
class OzonHttpException extends OzonApiClientException
{
    private $httpStatus;

    /**
     * DTO ошибки Ozon
     * @var OzonErrorResponseDto
     */
    private OzonErrorResponseDto $error;

    /**
     *
     * @param OzonErrorResponseDto $error
     */
    public function __construct(OzonErrorResponseDto $error, $httpStatus = null)
    {
        parent::__construct('Ошибка', (int)$httpStatus);

        $this->error = $error;
        $this->httpStatus = $httpStatus;
    }

    /**
     * Возвращает DTO ошибки Ozon
     * @return OzonErrorResponseDto
     */
    public function getError(): OzonErrorResponseDto
    {
        return $this->error;
    }

    public function getStatus()
    {
        return $this->getStatus();
    }
}
