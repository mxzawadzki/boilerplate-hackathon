<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "type" => "Feature",
            "properties" => [
                "name" => $this->name,
                "amenity" => $this->amenity,
                "popupContent" => $this->popup_content,
            ],
            "geometry" => [
                "type"=>"Point",
                "coordinates" =>[
                    $this->lat,
                    $this->lng
                ]
            ],
        ];
    }
}
