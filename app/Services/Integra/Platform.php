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

    public function fieldLabel(string $name): string
    {
        foreach (static::$fields as $field) {
            if (strtolower($field['name']) == strtolower($name)) return $field['label'];
        }
        return '';
    }
    
    public function isFieldVisible(string $fieldName): string
    {
        foreach (static::$fields as $field) {
            if (strtolower($field['name']) == strtolower($fieldName)) return $field['visible'] === true;
        }
        return '';
    }
    
    public function fieldHelpText(string $name): string
    {
        foreach (static::$fields as $field) {
            if (strtolower($field['name']) == strtolower($name)) return $field['helptext'];
        }
        return '';
    }

    public function toArray() : array
    {
        return [
            'name' => $this::$name,
            'fields' => $this::$fields,
        ];
    }
}
