<?php

namespace Infrastructure\Exception;

use LogicException;
use Exception;

final class SerializerServiceException extends LogicException
{
    public function __construct($message = 'Json com formato inválido.', $codigo = null, Exception $previous = null)
    {
        parent::__construct($message, $codigo, $previous);
    }
}