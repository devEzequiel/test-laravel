<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\AbstractRepository;

class AuthRepository implements AuthRepositoryInterface
{
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
