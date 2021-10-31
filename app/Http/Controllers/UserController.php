<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    //
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function login(): JsonResponse
    {
        $credentials = request()->only(['email', 'password']);
        $plainTextToken =  $this->user->login($credentials);
        return response()->json([
            '$token' => $plainTextToken
        ]);
    }

    public function getAllUsers(){
        return $this->user->getAll();
    }

    public function getUser($id){
        return $this->user->getById($id);
    }
}
