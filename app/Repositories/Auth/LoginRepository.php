<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginRepository implements LoginRepositoryInterface
{
    /**
     * Authenticate user using email and password
     * @param string $email
     * @param string $password
     * @return string|null
     */
    public function auth(string $email, string $password): ?string
    {
        if (!$token = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            return null;
        }

        $user = User::where('email', $email)->first();
        return $user->createToken(LoginRepositoryInterface::API_TOKEN)->plainTextToken;
    }

    /**
     * Delete all user access tokens
     * @return int
     */
    public function revoke(): int
    {
        return auth()->user()->tokens()->delete();
    }
}
