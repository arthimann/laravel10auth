<?php

namespace App\Repositories\Auth;

interface RegisterRepositoryInterface
{
    /**
     * Store new user with data and return created user ID
     * @param array $data
     * @return int
     */
    public function store(array $data): int;
}
