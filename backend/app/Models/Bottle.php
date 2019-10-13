<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bottle
 *
 * @property int $id
 * @property int $points
 * @property string $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bottle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bottle extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'bottles';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
