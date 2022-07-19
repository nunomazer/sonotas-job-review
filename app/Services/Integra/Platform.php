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
        return $this::$name;
    }

    public function fields() : array
    {
        return $this::$fields;
    }

    public function toArray() : array
    {
        return [
            'name' => $this::$name,
            'fields' => $this::$fields,
        ];
    }
}
