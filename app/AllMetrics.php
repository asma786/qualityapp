<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property string $short_name
 * @property string $name
 * @property string $formula
 * @property float $min_threshold
 * @property float $max_threshold
 * @property QualityFactor $qualityFactor
 * @property ProjectMetric[] $projectMetrics
 */
class AllMetrics extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'short_name', 'name', 'formula', 'min_threshold', 'max_threshold'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualityFactor()
    {
        return $this->belongsTo('App\QualityFactor', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectMetrics()
    {
        return $this->hasMany('App\ProjectMetric', 'metric_id');
    }
}
