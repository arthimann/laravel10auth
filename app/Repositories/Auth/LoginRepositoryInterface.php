<?php

namespace App\Repositories\Auth;

interface LoginRepositoryInterface
{
    /**
     * API Token Key
     */
    public const API_TOKEN = 'API TOKEN';

    /**
     * Authenticate exists user and return bearer token
     * @param string $email
     * @param string $password
     * @return string|null
     */
    public function auth(string $email, string $password): ?string;

    /**
     * Delete all user tokens
     * @return int
     */
    public function revoke(): int;
}
