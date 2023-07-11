<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
            ]);

            return \response()->json([
                'message' => 'User created!',
                'user_id' => $user->id,
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
