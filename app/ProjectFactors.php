<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property int $project_id
 * @property QualityFactor $qualityFactor
 * @property Project $project
 */
class ProjectFactors extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'project_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualityFactor()
    {
        return $this->belongsTo('App\QualityFactor', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
