<?php

namespace App\Services\Integra;

abstract class PlatformSetting
{
    protected $name = 'Set this in subclass';
    protected array $fields = [];

    public function getName()
    {
        return $this->name;
    }

    public function getFields()
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
