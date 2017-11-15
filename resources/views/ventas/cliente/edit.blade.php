@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{$persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif

			{!!Form::model($persona,['method'=>'PATCH','route'=>['cliente.update',$persona->idpersona]])!!}
			{{Form::token()}}
			<div class="form-group">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" placeholder="Nombre..." required value="{{$persona->nombre}}">
				</div>
				<div class="form-group">
					<label for="nombre">Tipo de Documento</label>
					<select name="tipo_documento" class="form-control" required>
					@if ($persona->tipo_documento=='Cedula')
						<option value="Cedula" selected>Cedula</option>
						<option value="Pasaporte">Pasaporte</option>
						<option value="Otro">Otro</option>
					@elseif ($persona->tipo_documento=='Pasaporte')
						<option value="Cedula">Cedula</option>
						<option value="Pasaporte" selected>Pasaporte</option>
						<option value="Otro">Otro</option>
					@else
						<option value="Cedula">Cedula</option>
						<option value="Pasaporte">Pasaporte</option>
						<option value="Otro" selected>Otro</option>
					@endif
					</select>
				</div>
				<div class="form-group">
					<label for="nombre">Número de Documento</label>
					<input class="form-control" type="text" name="num_documento" placeholder="Numero de Documento..." value="{{$persona->num_documento}}">
				</div>
				<div class="form-group">
					<label for="nombre">Direccion</label>
					<input class="form-control" type="text" name="direccion" placeholder="Direccion..." value="{{$persona->direccion}}">
				</div>
				<div class="form-group">
					<label for="nombre">Telefono</label>
					<input class="form-control" type="text" name="telefono" placeholder="Telefono..." value="{{$persona->telefono}}">
				</div>
				<div class="form-group">
					<label for="nombre">Email</label>
					<input class="form-control" type="email" name="email" placeholder="Email..." value="{{$persona->email}}">
				</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-warning" type="reset">Descartar</button>
				<button class="btn btn-danger" onclick="goBack()" type="button">Cancelar</button>
			</div>


			{!!Form::close()!!}
			<script>
				function goBack() {
				    window.history.back();
				}
			</script>
		</div>
	</div>
@endsection