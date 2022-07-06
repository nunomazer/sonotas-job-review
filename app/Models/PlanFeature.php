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

    public function toArray()
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'unlimited' => $this->unlimited,
            'value' => $this->value,
            'period' => $this->period,
            'interval' => $this->interval,
        ];
    }
}
