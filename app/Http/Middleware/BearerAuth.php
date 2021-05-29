<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class BearerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //проверить авторизацию

        $token =$request->bearerToken();

        $user= User::where('token',$token)->first();

        if (is_null($user)) {
            return response()->json([
                "status"=>false,
                "message"=>"Acess denied"
            ],401);
        }

        return $next($request);
    }
}
