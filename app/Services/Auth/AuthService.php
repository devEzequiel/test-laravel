<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @throws ValidationException
     */
    public function login(string $email, string $password)
    {
        $user = $this->authRepository->findByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Wrong credentials.'],
            ]);
        }

        return $user->createToken('teste')->plainTextToken;
    }

    public function logout($user): string
    {
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return 'Logged out';
    }
}
