<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FilterName implements Rule
{

    protected $forbidden;
    public function __construct($forbidden)
    {
        $this->forbidden = $forbidden;
    }

    public function passes($attribute, $value)
    {
        return !in_array($value, $this->forbidden);
    }


    public function message()
    {
        return 'This value is not allowed';
    }
}
