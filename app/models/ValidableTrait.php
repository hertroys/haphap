<?php
namespace App\Models;

use Validator;

trait Validable
{
    /**
     * Return the validation rules for the model.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Validate the models attributes against its rules.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validate()
    {
        return Validator::make($this->toArray(), $this->rules());
    }
}
