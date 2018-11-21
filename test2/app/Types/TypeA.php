<?php

namespace App\Types;

use App\Rules\Required;
use App\Rules\NoSpaces;

class TypeA extends BaseType
{
    const FIELD_A = 'field_a';
    const FIELD_B = 'field_b';
    const FIELD_C = 'field_c';
    const FIELD_D = 'field_d';
    const FIELD_E = 'field_e';

    public function getFieldsAndRules()
    {
        return [
            self::FIELD_A => new Required,
            self::FIELD_B => new NoSpaces,
            self::FIELD_C => null,
            self::FIELD_D => new Required,
            self::FIELD_E => new Required,
        ];
    }
}