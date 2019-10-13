<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BottleResource;
use App\Bottle;

class BottleController extends Controller
{
    public function getAll(){
        $bottles = Bottle::all();
        return response()->json(BottleResource::collection($bottles));
    }
}
