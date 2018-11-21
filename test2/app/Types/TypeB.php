<?php

namespace App\Types;

use App\Rules\Required;
use App\Rules\NoSpaces;

class TypeB extends BaseType
{
    const FIELD_A = 'field_a';
    const FIELD_B = 'field_b';

    public function getFieldsAndRules()
    {
        return [
            self::FIELD_A => new Required,
            self::FIELD_B => new NoSpaces,
        ];
    }
}