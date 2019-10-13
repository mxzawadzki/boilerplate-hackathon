<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource\BottleResource;
use App\Bottle;

class BottleController extends Controller
{
    public function getAll(){
        $bottles = Bottle::all();
        return BottleResource::collection($bottles);
    }
}
