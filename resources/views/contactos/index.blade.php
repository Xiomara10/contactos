@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{ url('contactos/create') }}" class="btn btn-success">Agregar un nuevo contacto</a>
<br/>
<br/>
<table class="table table-light table-hover">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Nacimiento</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
    @foreach($contactos as $contacto)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            
            <img src="{{ asset('storage').'/'.$contacto->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">

            
            </td>
            <td>{{$contacto->Nombre}}</td>
            <td>{{$contacto->Apellido}}</td>
            <td>{{$contacto->Email}}</td>
            <td>{{$contacto->Nacimiento}}</td>
            <td>
            <a class="btn btn-warning" href="{{ url('/contactos/'.$contacto->id.'/edit') }}">Editar</a>

            |
            
            <form method="post" action="{{ url('/contactos/'.$contacto->id) }}" style="display:inline">
            {{csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?')">Borrar</button>
            </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection