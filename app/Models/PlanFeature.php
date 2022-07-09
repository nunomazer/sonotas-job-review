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
    /**
     * @var bool Whether the feature is unlimited or not. If true value will not be evaluated.
     */
    public bool $unlimited;
    /**
     * @var int The value of the feature. If unlimited is true, this value will not be evaluated.
     */
    public int $value;
    /**
     * @var string The interval of time: day, month, week, year.
     */
    public string $period;
    /**
     * @var int The frequency feature must be renewed. If periodo is month, and frequency is 3, this means Each three months.
     * This also means that the value of the feature is considered something like 50 notas per 3 months, in ths example.
     */
    public int $frequency;

    public function toArray()
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'unlimited' => $this->unlimited,
            'value' => $this->value,
            'period' => $this->period,
            'frequency' => $this->frequency,
        ];
    }
}
