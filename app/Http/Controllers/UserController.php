<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    //
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function login(){
        return $this->user->login();
    }

    public function getAllUsers(){
        return $this->user->getAll();
    }

    public function getUser($id){
        return $this->user->getById($id);
    }
}
