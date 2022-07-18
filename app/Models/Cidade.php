<?php

namespace App\Models;

use Kayo\StatesAndCitiesIbge\Models\City;

class Cidade extends City
{
    protected $table = 'cities';

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'state_id');
    }
}
