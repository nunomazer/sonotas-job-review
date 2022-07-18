<?php

namespace App\Services\Integra;

interface IIntegraDriver
{
    public function name() : string;

    public function fields() : array;

    public function toArray() : array;
}
