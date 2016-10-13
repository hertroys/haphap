<?php
namespace App\Models;

use Validator;

Trait Validable
{
    public function rules()
    {
        return [];
    }

    public function validate()
    {
        return Validator::make($this->toArray(), $this->rules());
    }
}
