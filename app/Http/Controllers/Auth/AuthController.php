<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        try {
            $token = $this->authService->login($data['email'], $data['password']);

            return $this->responseOk(
                ['token' => $token]
            );
        } catch (\Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $message = $this->authService->logout($request->user());

            return $this->responseAccepted($message);
        } catch (\Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }
}
