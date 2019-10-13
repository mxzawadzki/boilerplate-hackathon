<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Place
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereAmenity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereOpenWeekAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereOpenWeekendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines wherePopupContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machines whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Machines extends Model
{
    protected $table = 'places';

    protected $fillable =[
        "popup_content",
        "amenity",
        "name",
        "address",
        "open_week_at",
        "open_weekend_at",
        "lat",
        "lng",
    ];

    public function isInArea(array $boundaries):bool{
        if($this->lat >= $boundaries[0][0] ){
            if($this->lat <= $boundaries[1][0]){
                if($this->lng >= $boundaries[0][1] ){
                    if($this->lng <= $boundaries[1][1]){
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
