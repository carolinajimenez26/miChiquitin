<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Usuarios\Empleado;
use Session;
class vendedorMiddleware
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
      if($request->user()->tipo_rol == "empleado"){
        $empleado= Empleado::where('id_usuario',$request->user()->id)->first();
        if(($empleado->cargo=="Vendedor" or ($empleado->cargo=="Auxiliar")){
         return $next($request);
       }else{
         Session::flash('flash_message','Acceso denegado');
         return redirect()->back();
       }
     }
      elseif ( $request->user()->tipo_rol == "admin") {
          return $next($request);
        }
      if($request->user()->tipo_rol == "root"){
          return $next($request);
        }
        else{
          Session::flash('flash_message','Acceso denegado');
          return redirect()->back();
        }
    }
}
