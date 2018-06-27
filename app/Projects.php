<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $quality_score
 * @property int $sloc
 * @property int $total_classes
 * @property int $total_methods
 * @property Class[] $classes
 * @property Method[] $methods
 * @property ProjectFactor[] $projectFactors
 * @property ProjectMetric[] $projectMetrics
 */
class Projects extends Model
{
    /**
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['name', 'quality_score', 'sloc', 'total_classes', 'total_methods'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany('App\Class');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function methods()
    {
        return $this->hasMany('App\Method');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectFactors()
    {
        return $this->hasMany('App\ProjectFactor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectMetrics()
    {
        return $this->hasMany('App\ProjectMetric');
    }
}
