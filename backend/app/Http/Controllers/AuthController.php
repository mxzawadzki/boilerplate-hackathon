<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class AuthController extends Controller
{
    public function SocialSignup (Request $request) {
        // Socialite will pick response data automatic 
        $provide = $request->provider;
        $user = Socialite::driver($provider)->stateless()->user();
        return response()->json($user);
    }

    public function index() {

    }
}
