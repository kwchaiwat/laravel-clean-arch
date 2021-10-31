<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'bank_account_number' => 'ACC:' . $this->account_number,
            'bank_trust' => $this->trust
        ];
    }

    public function with($request)
    {
        return [
            'status'=> 'OK',
            'version' => '1.0'
        ];
    }
}
