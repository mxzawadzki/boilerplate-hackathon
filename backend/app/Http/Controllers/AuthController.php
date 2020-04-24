<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialiteService;

class AuthController extends Controller
{

    protected $socialiteService;

    public function __construct() {
        $this->socialiteService = new SocialiteService();
    }
    /**
     * Redirect the user to the social network authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return response()
            ->json($this->socialiteService
                ->getRedirectUrlByProvider($provider));
    }
    /**
     * Obtain the user information from social network
     *
     * @return Response
     */
    public function handleProviderCallback(Reqeust $request, $provider)
    {
        $token = $request->header('Authorization') ?? $request->get('api_token'); 
        $result = $this->socialiteService->loginWithSocialite($provider, $token);
        return response()->json()->withCookie($result['cookie']);
    }
}
