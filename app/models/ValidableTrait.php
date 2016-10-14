<?php
namespace App\Models;

use Validator;

trait Validable
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
