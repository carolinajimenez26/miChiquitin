<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class rootMiddleware
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
      if($request->user()->tipo_rol == "root"){
         return $next($request);
       }else{
         //Session::flash('flash_message', 'Acceso denegado');
         Session::flash('flash_message','Acceso denegado');
         return redirect()->back();
       }
    }
}
