<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepositoryImpl implements UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login() {
        $credentials = request()->only(['email', 'password']);
        auth()->validate($credentials);

        if (!auth()->validate($credentials)) {
            abort(401);
        } else {
            $user = $this->model->where('email', $credentials['email'])->first();
            $user->tokens()->delete();
            $token = $user->createToken('postman');
            return response()->json(['$token' => $token->plainTextToken]);
        }
        return abort(500);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFaill($id);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
