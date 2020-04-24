<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Qr
 *
 * @property int $id
 * @property string $string
 * @property int $points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr whereString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qr whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Qr extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'qrs';
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
