<?php

namespace App\Services\Auth;

use App\User;

use App\Services\Auth\MyAuthServiceInterface;
use App\Exceptions\UnauthorizedException;

class MyAuthService implements MyAuthServiceInterface {

    public function attempt (array $credentials) {
        if (! $token = auth()->attempt($credentials)) {
            throw new UnauthorizedException();
        }
        else {
            return $token;
        }
    }
}