<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class BankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_number' => 'required|numeric',
            'trust' => 'required|numeric',
        ];
    }
    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'born_date.before' => 'Sorry, but you\'re too young to join.',
            'born_date.date_format' => 'Your birth date isn\'t a valid date.',
        ];
    }

    public function after($validator)
    {
        if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }
    }
}
