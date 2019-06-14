<?php
namespace App\Services\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

interface MyAuthServiceInterface {

    public function attempt(array $credentials);

}

