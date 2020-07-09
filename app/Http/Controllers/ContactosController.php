<?php

namespace App\Http\Controllers;

use App\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['contactos']=Contactos::paginate(5);

        return view('contactos.index',$datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosContacto=request()->all();
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Email' => 'required|email',
            'Nacimiento' => 'required|string|max:100',
            'Foto' => 'required|max:1000|mimes:jpeg,png,jpg'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosContacto=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosContacto['Foto']=$request->file('Foto')->store('uploads','public','storage');
        }

        Contactos::insert($datosContacto);

        //return response()->json($datosContacto);
        return redirect('contactos')->with('Mensaje','Contacto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(Contactos $contactos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto= Contactos::findOrFail($id);

        return view('contactos.edit',compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Email' => 'required|email',
            'Nacimiento' => 'required|string|max:100'
            
        ];
        
        if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:1000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosContacto=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $contacto= Contactos::findOrFail($id);

            Storage::delete('public/'.$contacto->Foto);

            $datosContacto['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Contactos::where('id','=',$id)->update($datosContacto);

        //$contacto= Contactos::findOrFail($id);

       //return view('contactos.edit',compact('contacto'));
       return redirect('contactos')->with('Mensaje','Contacto modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto= Contactos::findOrFail($id);

        if(Storage::delete('public/'.$contacto->Foto)){
            Contactos::destroy($id);
        }

        

        return redirect('contactos')->with('Mensaje','Contacto eliminado correctamente');
    }
}
