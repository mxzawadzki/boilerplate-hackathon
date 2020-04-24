<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachinesInAreaRequest;
use App\Http\Resources\MachineResource;
use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * returns mmachines in given area
     * boundaries are ldc and urc
     *
     * @param MachinesInAreaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function inArea(MachinesInAreaRequest $request){
        $boundaries = $request->boundaries;

        $machines = Machine::all()->filter(function (Machine $machine) use ($boundaries){
            return $machine->isInArea($boundaries);
        });

        return response()->json(MachineResource::collection($machines));
    }
}
