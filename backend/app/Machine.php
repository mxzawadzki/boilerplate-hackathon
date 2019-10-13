<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Machines
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereAmenity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereOpenWeekAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereOpenWeekendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine wherePopupContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $api_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Machine whereApiToken($value)
 */
class Machine extends Model
{

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
