<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $weightage
 * @property Metric[] $metrics
 * @property ProjectFactor[] $projectFactors
 */
class qualityFactors extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'weightage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metrics()
    {
        return $this->hasMany('App\Metric', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectFactors()
    {
        return $this->hasMany('App\ProjectFactor', 'factor_id');
    }
}
