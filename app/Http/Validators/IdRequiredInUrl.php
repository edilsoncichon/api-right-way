<?php

namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * In some scenarios it is mandatory to enter the entity ID in the URI.
 * This validator ensures that the ID has been entered and is an integer.
 *
 * @package App\Http\Validators
 */
class IdRequiredInUrl
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var Request $request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->validate();
    }

    protected function validate()
    {
        Validator::make(['id' => $this->request->id], [
            'id' => 'required|int'
        ])->validate();

        $id = intval($this->request->id);
        $this->id = $id;
    }
}
