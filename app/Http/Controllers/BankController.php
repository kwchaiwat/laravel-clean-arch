<?php

namespace App\Http\Controllers;

use App\Repositories\Bank\BankRepository;

class BankController extends Controller
{
    //
    private $bank;

    public function __construct(BankRepository $bank)
    {
        $this->bank = $bank;
    }

    public function getAllBanks(){
        return $this->bank->getAll();
    }

    public function getBank($id){
        return $this->bank->getById($id);
    }
}
