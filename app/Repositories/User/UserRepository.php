<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function login(array $credentials);

    public function getAll();

    public function getById($id);
}
