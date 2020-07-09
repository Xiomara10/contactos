@extends('layouts.app')

@section('content')

<div class="container">

Sección para editar
<form action="{{ url('/contactos/' .$contacto->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('contactos.form',['Modo'=>'editar'])



</form>
</div>
@endsection