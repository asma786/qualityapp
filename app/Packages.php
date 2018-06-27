<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property int $parent_id
 */
class Packages extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['project_id', 'name', 'parent_id'];

}
