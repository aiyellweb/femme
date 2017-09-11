<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/// estructura para carga de datos
use Storage;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
////

use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =   User::where('rol_id',2)->paginate(15);

          //dd($user);
        return view('usuarios.index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return  view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function crear(Request $request){

          //dd($request->all());

            $this->validate($request,[
            'name'=>'required',
            'email'=>'email|required|unique:users,email',
            'password'=>'required|confirmed', 
        ]);




    }



    public function store(Request $request)
    {


            //// si  con carga maxiva       
             if(Input::hasFile('archivo')){

            $file=Input::file('archivo');  // para guardar el archivo temporal
            $path = Input::file('archivo')->getRealPath(); // para el archivo excel luego recorrerlo

            $nombre_original=$file->getClientOriginalName(); // el nombre del archivo
            $extension=$file->getClientOriginalExtension(); // la extencion del archivo
            $r1=Storage::disk('op')->put($nombre_original,  \File::get($file) ); // donde guardo el archivo 

            $data = Excel::load($path, function($reader) { 
            })->get();   

            $mytime = Carbon::now('America/bogota');
            $fecha_ingreso=$mytime->toDateTimeString();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                     DB::table('users')->insert(['email' => $value->email,'name' => $value->name,
                                  'segundo_nombre'=>$value->segundo_nombre,
                                  'rol_id'=>$value->rol_id,
                                  'password'=>bcrypt($value->password),
                                   'created_at'=>$fecha_ingreso
                    ]);
                }
             return back()->with('info','cargado Exitosamente');
            }

        } ////  fin carga masiva 
          
          /// creaando usuario uno a uno
          
          // validaciones campos
         $this->validate($request,[
            'name'=>'required',
            'email'=>'email|required|unique:users,email',
            'password'=>'required|confirmed',  // validar contrasena de que sea la misma
        ]);
         
       dd($request->all());





    }


 public function cargaMaxiva(Request $request){

       if(Input::hasFile('archivo')){

            $file=Input::file('archivo');  // para guardar el archivo temporal
            $path = Input::file('archivo')->getRealPath(); // para el archivo excel luego recorrerlo

            $nombre_original=$file->getClientOriginalName(); // el nombre del archivo
            $extension=$file->getClientOriginalExtension(); // la extencion del archivo
            $r1=Storage::disk('op')->put($nombre_original,  \File::get($file) ); // donde guardo el archivo 
     
            $data = Excel::load($path, function($reader) { 
            })->get();   


            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                     DB::table('users')->insert(['numero_op' => $value->numero_op,'referencia' => $value->referencia,
                                  'referencia'=>$value->referencia,'cuero_color'=>$value->cuero_color,
                                   'suelo_color'=>$value->suelo_color,'tallas'=>$value->tallas,
                                   'cantidad_tallas_producir'=>$value->cantidad_tallas_producir,
                                   'cantidad_pares'=>$value->cantidad_pares,'cliente_nombre'=>$value->cliente,
                                    'user_id'=>$user_id,
                                   'created_at'=>$fecha_ingreso,'estado'=>$estado_ingrero
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
        
    }



public function modalEdit(){
    $rol = Rol::all();
    
    return view('usuarios.modalEdit',compact('rol'));
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
        $user = User::findOrFail($id)->update($request->all());
       return back()->with('info','el usuario fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        $user->rol_id=3;
        $user->save();
        return back();
    }
}
