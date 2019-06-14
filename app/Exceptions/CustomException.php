<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception 
{
    protected $message;
    protected $code;

    public function __construct(string $message, int $code = 500) {
        parent::__construct();
        $this->message = $message;
        $this->code = $code;
    }

    public function getStatusCode() {
        return $this->code;
    }
}