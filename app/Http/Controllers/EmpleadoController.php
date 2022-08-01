<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        //Linea para agregar un Middleware a las funciones del controlador
        /*$this->middleware('auth')->except('index','create');
        $this->middleware('authByName')->only('create','edit','destroy');*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id','DESC')->paginate(3);
        return view('Empleado.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleado.create');
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
            'edad' => 'required|numeric',
            'puesto' => 'required',
            'salario'=> 'required']);

        $arrayStore =[
            'nombre' => $request->get("nombre"),
            'edad' => $request->get('edad'),
            'puesto' => $request->get('puesto'),
            'salario' => $request->get('salario'),
            'activo' => $request->has('activo') ? $request->get('activo') : 0
        ];

        Empleado::create($arrayStore);

        return redirect()->route('empleado.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('Empleado.show',compact('empleado'));
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
        Empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
