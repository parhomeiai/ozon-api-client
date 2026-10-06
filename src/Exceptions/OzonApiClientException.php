<?php

namespace Escorp\OzonApiClient\Exceptions;

use RuntimeException;
use Throwable;

class OzonApiClientException extends RuntimeException
{
    public static function fromException(Throwable $e): self
    {
        return new self($e->getMessage(), (int) $e->getCode(), $e);
    }
}

