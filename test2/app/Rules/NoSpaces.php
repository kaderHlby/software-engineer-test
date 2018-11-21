<?php

namespace App\Rules;

class NoSpaces implements BaseRule
{
    public function validate($string, $header)
    {
        return !preg_match('/\s/', $string) ? null : "$header should not contain any space";
    }
}