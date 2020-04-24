<?php

namespace App\Http\Middleware;

use App\Machine;
use Closure;

class MachineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiToken = $request->api_token;
        $machine = Machine::where('api_token','like',$apiToken)->get()->first();

        if($machine===null)
            return abort(401);

        return $next($request);
    }
}
