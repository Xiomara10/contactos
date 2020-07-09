
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input  type="text" class="form-control {{$errors->has('Nombre')? 'is-invalid':''}}" name="Nombre" id="Nombre" 
value="{{ isset($contacto->Nombre)?$contacto->Nombre:old('Nombre') }}">

{!! $errors->first('Nombre','<div class="invalid-feedback">Nombre es requerido</div>') !!}

</div>

<div class="form-group">

<label for="Apellido" class="control-label">{{'Apellido'}}</label>
<input  type="text" class="form-control {{$errors->has('Apellido')? 'is-invalid':''}}" name="Apellido" id="Apellido" value="{{ isset($contacto->Apellido)?$contacto->Apellido:old('Apellido') }}">
{!! $errors->first('Apellido','<div class="invalid-feedback">Apellido es requerido</div>') !!}
</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input  type="email" class="form-control {{$errors->has('Email')? 'is-invalid':''}}" name="Email" id="Email" value="{{ isset($contacto->Email)?$contacto->Email:old('Email') }}">
{!! $errors->first('Email','<div class="invalid-feedback">El correo es requerido</div>') !!}
</div>

<div class="form-group">
<label for="Nacimiento" class="control-label">{{'Nacimiento'}}</label>
<input  type="date" class="form-control {{$errors->has('Nacimiento')? 'is-invalid':''}}" name="Nacimiento" id="Nacimiento" value="{{ isset($contacto->Nacimiento)?$contacto->Nacimiento:old('Nacimiento') }}">
{!! $errors->first('Nacimiento','<div class="invalid-feedback">Fecha de nacimiento es requerido</div>') !!}
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($contacto->Foto))

<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$contacto->Foto}}" alt="" width="200">

@endif
<input class="form-control {{$errors->has('Foto')? 'is-invalid':''}}"  type="file" name="Foto" id="Foto" value="">
{!! $errors->first('Foto','<div class="invalid-feedback">Foto es requerido</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">

<a class="btn btn-primary" href="{{ url('contactos') }}">Regresar</a>