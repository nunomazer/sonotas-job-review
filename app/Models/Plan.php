<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = [
        'subscribed_at',
        'expires_at',
    ];

    protected $casts = [
        'features' => 'json',
        'driver_id' => 'json',
        'active' => 'boolean',
    ];

}
