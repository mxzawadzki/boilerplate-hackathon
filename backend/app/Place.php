<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
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
