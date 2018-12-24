<?php

namespace App\Domains\Category\Validations;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'name_slug' => 'required|string|min:3',
            'description' => 'required|string|min:3',
        ];
    }
}
