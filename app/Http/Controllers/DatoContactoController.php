<?php

namespace App\Http\Controllers;

use App\DatoContacto;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class DatoContactoController extends Controller
{
    public function __construct()
    {
        //Linea para agregar un Middleware a las funciones del controlador
        //$this->middleware('auth');
        //$this->middleware('authByName')->only('create','edit','destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosContacto = DatoContacto::orderBy('id','DESC')->paginate(3);
        return view('DatoContacto.index',compact('datosContacto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DatoContacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'nombre' => 'required',
            'edad' => 'required',
            'puesto' => 'required',
            'salario'=> 'required']);

        $arrayUpdate =[
            'nombre' => $request->get("nombre"),
            'edad' => $request->get('edad'),
            'puesto' => $request->get('puesto'),
            'salario' => $request->get('salario'),
            'activo' => $request->has('activo') ? $request->get('activo') : 0
        ];

        DatoContacto::create($arrayUpdate);

        return redirect()->route('datoContacto.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datoContacto = DatoContacto::find($id);
        return view('DatoContacto.show',compact('datoContacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('Empleado.edit',compact('empleado'));
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
        $this->validate($request,['nombre' => 'required','edad' => 'required','puesto' => 'required','activo' => 'required','salario'=> 'required']);
        DatoContacto::find($id)->update($request->all());

        return redirect()->route('datoContacto.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DatoContacto::find($id)->delete();
        return redirect()->route('datoContacto.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
