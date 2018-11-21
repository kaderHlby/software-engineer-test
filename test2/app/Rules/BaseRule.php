<?php

namespace App\Rules;

interface BaseRule
{
    public function validate($string, $header);
}
