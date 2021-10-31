<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Http\Resources\BankCollection;
use App\Http\Resources\BankResource;
use App\Repositories\Bank\BankRepository;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    //
    private $bank;

    public function __construct(BankRepository $bank){
        $this->bank = $bank;
    }

    public function getAllBanks(){
        $banks = $this->bank->getAll();
        return new BankCollection($banks);
    }

    public function getBank($id){
        $bank =  $this->bank->getById($id);
        return new BankResource($bank);
    }

    public function create(BankRequest $request){
        $validator = $request->validated();

        $bank =  $this->bank->create($request->safe()->only('account_number', 'trust'));
        return new BankResource($bank);
    }
}
