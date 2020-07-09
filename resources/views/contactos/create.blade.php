@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

Sección para crear
<form action="{{ url('/contactos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

@include('contactos.form',['Modo'=>'crear'])


</form>
</div>
@endsection