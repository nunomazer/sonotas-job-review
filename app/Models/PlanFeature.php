<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature
{
    const FEATURE_QTDE_NOTAS = 'qtde_notas';

    const PERIOD_DAY = 'day';
    const PERIOD_MONTH = 'month';
    const PERIOD_WEEK = 'week';
    const PERIOD_YEAR = 'year';

    public $slug;
    public $name;
    public $description;
    public $unlimited;
    public $value;
    public $period;
    public $interval;
}
