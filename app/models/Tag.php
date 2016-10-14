<?php
namespace App\Models;

use Eloquent;

class Tag extends Eloquent
{
    use Validable;

    /**
     * Return the validation rules for the model.
     *
     * @return array
     */
    public function rules()
    {
        return ['name' => 'required | unique:tags,name,'.$this->id];
    }
}
