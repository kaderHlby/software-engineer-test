<?php

namespace App\Rules;

class Required implements BaseRule
{
    public function validate($string, $header)
    {
        return ($string != '' && $string != null) ? null : "Missing value in $header";
    }
}