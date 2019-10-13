<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Machine
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $open_week_at
 * @property string $open_weekend_at
 * @property float|null $lat
 * @property float|null $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $amenity
 * @property string $popup_content
 * @property string $api_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereAmenity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereOpenWeekAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereOpenWeekendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine wherePopupContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Machine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Machine extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'machines';
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
