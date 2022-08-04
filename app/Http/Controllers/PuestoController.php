<?php

namespace App\Http\Controllers;
use App\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puesto = Puesto::orderBy('id','DESC')->paginate(3);
        return view('Puesto.index',compact('puesto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Puesto.create');
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
            'requisitos' => 'required',
            'rango_salario' => 'required',
            'puestos_disponibles'=> 'required']);

        $arrayStore =[
            'nombre' => $request->get("nombre"),
            'requisitos' => $request->get('requisitos'),
            'rango_salario' => $request->get('rango_salario'),
            'puestos_disponibles' => $request->get('puestos_disponibles')
        ];

        Puesto::create($arrayStore);

        return redirect()->route('puesto.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puesto = puesto::find($id);
        return view('Puesto.show',compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = puesto::find($id);
        return view('Puesto.edit',compact('puesto'));
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
        $this->validate($request,['nombre' => 'required','requisitos' => 'required','rango_salario' => 'required','puestos_disponibles' => 'required']);
        Puesto::find($id)->update($request->all());

        return redirect()->route('puesto.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Puesto::find($id)->delete();
        return redirect()->route('puesto.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
