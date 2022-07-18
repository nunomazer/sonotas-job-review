<?php

namespace App\Services\Integra;

abstract class PlatformAbstract
{
    public static $name = 'Set this in subclass';
    public static array $fields = [];

    public function name()
    {
        return $this->name;
    }

    public function fields()
    {
        return $this->fields;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'fields' => $this->fields,
        ];
    }
}
