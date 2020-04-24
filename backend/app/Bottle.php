<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bottle
 *
 * @property int $id
 * @property int $points
 * @property string $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bottle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bottle extends Model
{
    //
}
