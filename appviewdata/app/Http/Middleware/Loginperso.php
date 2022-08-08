<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Loginperso
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

        //return $next($request);


        $val = Session::get('paneladmin');
        if($val == NULL){
            return redirect()->route('logpersoform');
        }else{
            //return redirect()->route('adminpage');
             return $next($request);
        }

    }





}
