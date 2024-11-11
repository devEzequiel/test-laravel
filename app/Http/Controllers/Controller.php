<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Info(
 *     title="Liberfly API - Test",
 *     version="1.0.0"
 * )
 *
 * *@OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     in="header",
 *     description="Acess token obtido no login",
 *     name="Authorization",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseOk($data, string $message = 'success'): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data], Response::HTTP_OK);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseCreated(string $message = ''): JsonResponse
    {
        return response()->json($message ? ['message' => $message] : null, Response::HTTP_CREATED);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseAccepted(string $message = 'success'): JsonResponse
    {
        return response()->json(['message' => $message], Response::HTTP_ACCEPTED);
    }

    /**
     * @return JsonResponse
     */
    public function responseUnauthorized(): JsonResponse
    {
        return response()->json(null, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @return JsonResponse
     */
    public function responseForbidden(): JsonResponse
    {
        return response()->json(null, Response::HTTP_FORBIDDEN);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseNotFound(string $message = ''): JsonResponse
    {
        return response()->json($message ? ['message' => $message] : null, Response::HTTP_NOT_FOUND);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseUnprocessableEntity(string $message = 'error'): JsonResponse
    {
        return response()->json(
            $message ? ['message' => $message] : null,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function responseInternalServerError(string $message = 'error'): JsonResponse
    {
        return response()->json(
            $message ? ['message' => $message] : null,
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
