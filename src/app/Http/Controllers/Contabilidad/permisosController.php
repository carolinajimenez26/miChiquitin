<?php

namespace App\Http\Controllers\Contabilidad;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\permisosContabilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class permisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!(Auth::user()->email == 'root@gmail.com')) abort(403);
        $permisos = permisosContabilidad::all();
        return view('Contabilidad.permisos')->with(
            [
                'permisos'=> $permisos,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delPer(Request $request){
        $input = $request->all();
        $rtJson    = [
            'ok' => false,
            'err' => ''
        ];
        try{
            // try code
            $permiso = permisosContabilidad::find($input['idp']);
            $permiso->delete();
            $rtJson['ok'] = true;
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;
    }

    public function addPer(Request $request){
        try{
            $input = $request->all();
            $rtJson    = [
                'ok' => false,
                'err' => ''
            ];
            $input['id_user'] = $input['idp'];
            // try code
            $permiso = permisosContabilidad::create(['id_user' => $input['idp']]);
            $rtJson['ok'] =true;
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;

    }
}
