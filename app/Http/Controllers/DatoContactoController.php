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
        $datosContactos = DatoContacto::orderBy('id','DESC')->paginate(3);
        return view('DatoContacto.index',compact('datosContactos'));
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
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'estado'=> 'required']);

        $arrayUpdate =[
            'nombre' => $request->get("nombre"),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'estado' => $request->get('estado')
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
        $datoContacto = DatoContacto::find($id);
        $estadosArray = [1 => 'Aguascalientes'
            ,2 => 'Baja California'
            ,3 => 'Baja California Sur'
            ,4 => 'Campeche'
            ,5 => 'Chiapas'
            ,6 => 'Chihuahua'
            ,7 => 'Coahuila'
            ,8 => 'Colima'
            ,9 => 'CDMX'
            ,10 => 'Durango'
            ,11 => 'Estado de México'
            ,12 => 'Guanajuato'
            ,13 => 'Guerrero'
            ,14 => 'Hidalgo'
            ,15 => 'Jalisco'
            ,16 => 'Michoacán'
            ,17 => 'Morelos'
            ,18 => 'Nayarit'
            ,19 => 'Nuevo León'
            ,20 => 'Oaxaca'
            ,21 => 'Puebla'
            ,22 => 'Querétaro'
            ,23 => 'Quintana Roo'
            ,24 => 'San Luis Potosí'
            ,25 => 'Sinaloa'
            ,26 => 'Sonora'
            ,27 => 'Tabasco'
            ,28 => 'Tamaulipas'
            ,29 => 'Tlaxcala'
            ,30 => 'Veracruz'
            ,31 => 'Yucatán'
            ,32 => 'Zacatecas'];

        return view('DatoContacto.edit',compact('datoContacto', 'estadosArray'));
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
        $this->validate($request,['nombre' => 'required','email' => 'required','telefono' => 'required','direccion' => 'required','estado'=> 'required']);
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
