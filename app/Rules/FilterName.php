<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FilterName implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return !(strtolower($value == 'admin'));
    }


    public function message()
    {
        return 'This value is not allowed';
    }
}
