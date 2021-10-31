<?php

namespace App\Repositories\Bank;

use App\Models\Bank;

class BankRepositoryImpl implements BankRepository
{

    private $model;

    public function __construct(Bank $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $bank = $this->model->findOrFail($id);
        $bank->update($attributes);
        return $bank;
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }
}
