<?php

namespace App\Services\Sped;

class SpedApiReturn
{
    protected $code;
    protected $message;
    protected bool $error = false;
    protected array $data = [];

    public function __get($name)
    {
        if ($name == 'code') return $this->code;

        if ($name == 'message') return $this->message;

        if ($name == 'error') return $this->error;

        if ($name == 'data') return $this->data;
    }
}
