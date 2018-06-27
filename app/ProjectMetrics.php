<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $metric_id
 * @property int $project_id
 * @property float $metric_value
 * @property int $metric_indicator
 * @property string $type
 * @property Metric $metric
 * @property Project $project
 */
class projectMetrics extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['metric_id', 'project_id', 'metric_value', 'metric_indicator', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metric()
    {
        return $this->belongsTo('App\Metric');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
