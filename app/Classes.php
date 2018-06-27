<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property int $parent_id
 * @property int $method_count
 * @property int $attrbute_count
 * @property int $public_attributes
 * @property Project $project
 * @property Method[] $methods
 */
class Classes extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['project_id', 'name', 'parent_id', 'method_count', 'attribute_count', 'public_attributes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function methods()
    {
        return $this->hasMany('App\Method');
    }
}
