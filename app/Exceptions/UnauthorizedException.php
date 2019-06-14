<?php

namespace App\Exceptions;
use App\Exceptions\CustomException;

use Exception;

class UnauthorizedException extends CustomException
{
    public function __construct(string $message = 'Unauthorized', int $code = 401) {
        parent::__construct($message, $code);
    }
}
