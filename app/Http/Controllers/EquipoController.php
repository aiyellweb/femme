<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
///
use Storage;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
///
use App\equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipo=  equipo::with('Tipo_equipo')->get();
        //dd($equipo);

        return view('equipos.index',compact('equipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(Input::hasFile('archivo')){

            $file=Input::file('archivo');  // para guardar el archivo temporal
            $path = Input::file('archivo')->getRealPath(); // para el archivo excel luego recorrerlo

            $nombre_original=$file->getClientOriginalName(); // el nombre del archivo
            $extension=$file->getClientOriginalExtension(); // la extencion del archivo
            $r1=Storage::disk('equipo')->put($nombre_original,  \File::get($file) ); // donde guardo el archivo 
     
            $data = Excel::load($path, function($reader) { 
            })->get();   

            $mytime = Carbon::now('America/bogota');
            $fecha_ingreso=$mytime->toDateTimeString();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                     DB::table('equipo')->insert(['tipo_equipo_id' =>$value->tipo_equipo_id,
                        'nombre_equipo' => $value->nombre_equipo,'nombre_usuario'=>$value->nombre_usuario,
                        'marca'=>$value->marca,'modelo_equipo'=>$value->modelo_equipo,'sistema'=>$value->sistema,
                        'procesador'=>$value->procesador,'ram'=>$value->ram,'discoduro'=>$value->discoduro,
                        'ip'=>$value->ip,'serial_sistema'=>$value->serial_sistema,'marca_procesador'=>$value->marca_procesador,
                        'marca_sistema'=>$value->marca_sistemas,'estado_id'=>$value->estado_id,
                        'fecha_crea'=>$fecha_ingreso
                    ]);


                }
             return back()->with('info','cargado Exitosamente');
            }

        }
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
}
