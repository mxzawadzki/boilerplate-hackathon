<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlacesInAreaRequest;
use App\Http\Resources\PlaceResource;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * returns places in given area
     * boundaries are ldc and urc
     *
     * @param PlacesInAreaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function inArea(PlacesInAreaRequest $request){
        $boundaries = $request->boundaries;

        $places = Place::all()->filter(function (Place $place) use ($boundaries){
            return $place->isInArea($boundaries);
        });

        return response()->json(PlaceResource::collection($places));
    }
}
