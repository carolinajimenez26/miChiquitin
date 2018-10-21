<?php

namespace App\Http\Controllers\Contabilidad;

use App\Models\Contabilidad\nomina;
use App\Models\Contabilidad\Varcontrol;
use App\Models\Facturacion\Factura;
use App\Models\Usuarios\Empleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;

class NominaCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //abort(403); AGREGAR SEGURIDAD
        if(!(Auth::user()->email == 'root@gmail.com')){
            $empleado = Auth::user()->empleado;
            if(is_null($empleado)) abort('403');
            if(is_null($empleado->permiso)) abort('403');
        }
        $dt = Carbon::now();
        $dt = $dt->format('Y-m');
        $str = $dt .'%';
        $nominas = nomina::where('fecha_prenomina', 'like', $str)->get();
        $nominasP = nomina::orWhere('estado', '=', 'PorPagar')
            ->orWhere('estado', '=', 'RechazadoCapital')->get();
        return view('Contabilidad.nominas')->with(
            [
                'date'=> $dt,
                'nominas' => $nominas,
                'nominasP'=> $nominasP
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

    public function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }

    public function getNominas(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => 'No se encontraron resultados',
            'dat' => []
        ];
        $input = $request->all();
        $str = $input['dt'] . '%';
        $datos = nomina::where('fecha_prenomina', 'like', $str)->get();

        if(count($datos)>0){
            $rtJson['ok'] = true;
            $rtJson['err']='';
            foreach ($datos as $key => $dato) {
                $total = $dato->base + ( 3 * $dato->salud) + $dato->aux_transporte;
                $rtJson['dat'][$key] = [
                    'id'=> $dato->id,
                    'id3' => $this->numhash($dato->id),
                    'id2' => $dato->empleado->user->email,
                    'nom' => $dato->empleado->user->name,
                    'app' => $dato->empleado->user->apellidos,
                    'f_pre' => $dato->fecha_prenomina,
                    'f_pag' => $dato->fecha_pago,
                    'tot' => $total,
                    'estado' => $dato->estado
                ];
            }
        }

        return $rtJson;
        //Hacer Seguridad

    }

    public function getEmpleados(Request $request)
    {

        $str = $request->input('q') . '%';
        $limite = $request->input('page');
        $empleados = DB::table('empleados')->select(
            'empleados.id_empleado',
            'users.name',
            'users.email',
            'users.apellidos'
        )
            ->join ('users', 'empleados.id_usuario', '=' , 'users.id')
            ->where([
                    ['empleados.estado', '=', 'activo'],
                    ['users.email', 'like', $str]
                ]
            )
            ->limit($limite)
            ->get();


        $respuesta = [];
                foreach ($empleados as $empleado) {
                    $respuesta[] = [
                        'id' => $empleado->id_empleado,
                        'text' => $empleado->email . ' - (' . $empleado->name . ' - ' . $empleado->apellidos . ' )'
                    ];
                }
        return $respuesta;
    }

    public function getDatos(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => '',
        ];

        try{
            // try code
            $aporte = Varcontrol::where('nombre', '=', 'aporte')->get()->first();
            $aux = Varcontrol::where('nombre', '=', 'aux_transporte')->get()->first();
            $input = $request->all();
            $empleado = Empleado::where('id_empleado', '=', $input['ide'])->get()->first();
            $base = $empleado->contrato->salario;
            $valorAporte = $base * $aporte->valor / 100;
            $neto = $base - (2.00 * $base * $aporte->valor / 100.00) + $aux->valor;
            $total = $base + (3.00 * $base * $aporte->valor / 100.00) + $aux->valor;
            $rtJson['aporte'] = $valorAporte;
            $rtJson['base'] = $base;
            $rtJson['aux_transporte'] = $aux->valor;
            $rtJson['neto'] = $neto;
            $rtJson['total']=$total;
            $rtJson['ok']=true;
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;
        //Hacer Seguridad

    }

    public function getNomina(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => '',
        ];
        $input = $request->all();
        try{
            // try code
            $nomina = nomina::find($input['idn']);
            $rtJson['aporte'] = $nomina->salud;
            $rtJson['base'] = $nomina->base;
            $rtJson['aux_transporte'] = $nomina->aux_transporte;
            $rtJson['neto'] = $nomina->neto;
            $rtJson['total']= $nomina->base + (3.00 * $nomina->salud) + $nomina->aux_tranporte;
            $empleado = Empleado::where('id_empleado', '=', $nomina->id_empleado)->get()->first();
            $rtJson['empleado'] = $empleado->user->email . ' (' . $empleado->user->name . ' '
                . $empleado->user->Apellidos . ')';
            $rtJson['ok']=true;
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;
    }

    public function genNom(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => 'Algó salió mal',
        ];
        $input = $request->all();
        try{
            if ($input['id'] < 0) {
                $input['estado'] = 'PorPagar';
                $dt = Carbon::now();
                $dt = $dt->format('Y-m-d');
                $input['fecha_prenomina'] = $dt;
                $nominas = nomina::where([
                    ['id_empleado', '=', $input['id_empleado']],
                    ['fecha_prenomina', 'like', $dt.'%'],
                ])->get();
                $nomina = nomina::create($input);
                $dt = Carbon::now();
                $dt = $dt->format('Y-m');
                $rtJson['ok'] = true;

                if(count($nominas)>0){
                    $nomina->delete();
                    $rtJson['ok'] = false;
                    $rtJson['err'] = 'Ya hay nomina generado este mes para este empleado';
                }
            } else {
                $nomina = nomina::find($input['id']);
                if($nomina->estado == 'Pagado'){
                    $rtJson['err'] = 'No se puede editar nomina que ya esta pagado';
                }
                else{
                    $nomina->update([
                        'base' => $input['base'],
                        ''
                    ]);
                    $rtJson['ok'] = true;
                }
            }
            // try code
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;
        //Hacer Seguridad

    }

    public function pagarNom(Request $request){
        $input = $request->all();
        $rtJson    = [
            'ok' => false,
            'err' => '',
        ];
        try{

                $nomina = nomina::find($input['idp']);
                if(is_null($nomina)){
                    $rtJson['err'] = 'No se encontró la nomina';
                }
                else{
                    $efectivo = Varcontrol::where('nombre', '=', 'efectivo')->get()->first();
                    $total = ($nomina->base + (3 * $nomina->salud) + $nomina->aux_transporte);
                    if($efectivo->valor < $total){
                        $nomina->update(['estado'=> 'RechazadoCapital']);
                        $rtJson['err'] = 'Se rechazo el pago de nomina por que no hay suficiente capital';
                    }
                    else{
                        $dt = Carbon::now();
                        $dt = $dt->format('Y-m-d');
                        $nomina->update(['estado'=> 'Pagado', 'fecha_pago' => $dt]);
                        $resta = $efectivo->valor - $total;
                        $efectivo->update(['valor' => $resta]);
                        $rtJson['ok']= true;
                    }

                }


            // try code
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }

        return $rtJson;
    }
}
