<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $class_id
 * @property int $project_id
 * @property string $name
 * @property int $sloc
 * @property float $complexity
 * @property string $operators
 * @property string $operands
 * @property string $parameters
 * @property string $return_type
 * @property string $shared_attributes
 * @property Class $class
 * @property Project $project
 */
class Methods extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['class_id', 'project_id', 'name', 'sloc', 'complexity', 'operators', 'operands', 'parameters', 'return_type', 'shared_attributes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo('App\Class');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
