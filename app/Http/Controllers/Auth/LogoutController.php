<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\LoginRepository;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    public function __invoke(LoginRepository $loginRepository): JsonResponse
    {
        $result = $loginRepository->revoke();
        return response()->json([
            'status' => $result > 0,
        ]);
    }
}
