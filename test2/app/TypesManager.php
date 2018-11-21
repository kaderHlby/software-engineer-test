<?php

namespace App;

use App\Types\BaseType;

class TypesManager
{
    const TYPE_A = 'type_a';
    const TYPE_B = 'type_b';

    const TYPES = [
        self::TYPE_A,
        self::TYPE_B,
    ];

    /**
     * @return BaseType
     * @throws \Exception
     */
    public function resolve($type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new \Exception("type $type dose not exist.");
        }

        $namespace = "App\Types";
        $studlyName = $this->snakeCaseToCamelCase($type);
        $class = "$namespace\\$studlyName";
        return new $class();
    }

    function snakeCaseToCamelCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}