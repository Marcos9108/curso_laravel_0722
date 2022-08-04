<?php

namespace App\Http\Controllers;

use App\Proyectos;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;


class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyectos::orderBy('id','DESC')->paginate(3);
        return view('Proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'lenguajeProgramacion' => 'required',
            'plataforma' => 'required',
            'porcentajeAvance' => 'required',
            'personalInvolucrado'=> 'required']);

        $arrayUpdate =[
            'nombre' => $request->get("nombre"),
            'lenguajeProgramacion' => $request->get('lenguajeProgramacion'),
            'plataforma' => $request->get('plataforma'),
            'porcentajeAvance' => $request->get('porcentajeAvance'),
            'personalInvolucrado' => $request->get('personalInvolucrado')
        ];

        Proyectos::create($arrayUpdate);

        return redirect()->route('proyectos.index')->with('success','Proyecto creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectos = Proyectos::find($id);
        return view('Proyectos.show',compact('proyectos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyectos = Proyectos::find($id);
        return view('Proyectos.edit',compact('proyectos'));
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
        $this->validate($request,['nombre' => 'required','lenguajeProgramacion' => 'required','plataforma' => 'required','porcentajeAvance' => 'required','personalInvolucrado'=> 'required']);
        Proyectos::find($id)->update($request->all());

        return redirect()->route('proyectos.index')->with('success','Proyecto actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyectos::find($id)->delete();
        return redirect()->route('proyectos.index')->with('success','Proyecto eliminado satisfactoriamente');
    }
}
