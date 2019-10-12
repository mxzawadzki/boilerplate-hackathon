<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function data(){
        $user = auth()->user();

        return response()->json(new UserResource($user));
    }
}
