<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface
{
    public function findByEmail(string $email);
}
