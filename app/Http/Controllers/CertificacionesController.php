<?php

namespace App\Http\Controllers;

use App\Certificaciones;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class CertificacionesController extends Controller
{
    
    //Pagina principal
    public function index()
    {
        $listaCertificaciones = Certificaciones::orderBy('id')->paginate();
        return view('Certificaciones.index',compact('listaCertificaciones'));
    }

    //Para mostrar la tabla
    public function show($id){
        $certificaciones = Certificaciones::find($id);
        return view('Certificaciones.show', compact('certificaciones'));
    }

    //Regresa la pagina de crear
    public function create(){
        return view('Certificaciones.create');
    }

    //Para guardar registros
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'proveedor' => 'required',
            'duracion' => 'required',
            'validez' => 'required|numeric',
            'expira'=> 'required']);

        $arrayStore =[
            'nombre' => $request->get("nombre"),
            'proveedor' => $request->get('proveedor'),
            'duracion' => $request->get('duracion'),
            'validez' => $request->get('validez'),
            'expira' => $request->get('expira')
        ];

        Certificaciones::create($arrayStore);

        return redirect()->route('certificaciones.index')->with(['success'=>'Registro creado satisfactoriamente','alert'=>'alert alert-success']);
    }

    public function edit($id){
        $certificaciones = Certificaciones::find($id);
        return view('Certificaciones.edit', compact('certificaciones'));
    }

    public function update(Request $request, $id){
        $this->validate($request, ['nombre' => 'required','proveedor' => 'required','duracion' => 'required','validez' => 'required','expira'=> 'required']);
        Certificaciones::find($id)->update($request->all());

        return redirect()->route('certificaciones.index')->with(['success'=>'Registro actualizado satisfactoriamente','alert'=>'alert alert-info']);
    }

    public function destroy($id)
    {
        Certificaciones::find($id)->delete();
        return redirect()->route('certificaciones.index')->with(['success'=>'Registro eliminado satisfactoriamente','alert'=>'alert alert-danger']);
    }

}
