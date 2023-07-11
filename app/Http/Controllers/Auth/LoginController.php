<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\Auth\LoginRepository;

class LoginController extends Controller
{
    /**
     * Unauthorized RESTAPI message
     */
    private const UNAUTHORIZED_MESSAGE = 'Unauthorized';

    public function __invoke(LoginRequest $request, LoginRepository $loginRepository): JsonResponse
    {
        $token = $loginRepository->auth($request->post('email'), $request->post('password'));
        if (!$token) {
            return response()->json([
                'message' => self::UNAUTHORIZED_MESSAGE,
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'token' => $token,
        ]);
    }
}
