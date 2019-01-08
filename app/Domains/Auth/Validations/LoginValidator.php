<?php

namespace App\Domains\Auth\Validations;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidator extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
}
