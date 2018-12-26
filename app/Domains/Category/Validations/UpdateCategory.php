<?php

namespace App\Domains\Category\Validations;

class UpdateCategory extends CreateCategory
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $updateRules = ['id' => 'required|int',];
        $createRules = parent::rules();
        return array_merge($updateRules, $createRules);
    }
}
