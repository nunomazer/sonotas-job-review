<?php

namespace App\Services\Integra;

abstract class Platform implements IIntegraDriver
{
    public static $name = 'Set this in subclass';
    public static array $fields = [];

    protected array $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function name() : string
    {
        return self::$name;
    }

    public function fields() : array
    {
        return self::$fields;
    }

    public function toArray() : array
    {
        return [
            'name' => self::$name,
            'fields' => self::$fields,
        ];
    }
}
