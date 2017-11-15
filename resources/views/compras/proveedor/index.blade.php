@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores <a href="" data-target="#modal-nuevo" data-toggle="modal"><button class="btn btn-success">Nuevo</button></a></h3>

		@if (count($errors)>0)
		<p class="parrafo-error">La operacion no puedo realizarse</p>
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach	
			</ul>
		</div>
		@endif
		@include('compras.proveedor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Tipo Doc</th>
					<th>Número Doc</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
				@foreach ($personas as $per)
				<tr>
					<td>{{$per->idpersona}}</td>
					<td>{{$per->nombre}}</td>
					<td>{{$per->tipo_documento}}</td>
					<td>{{$per->num_documento}}</td>
					<td>{{$per->telefono}}</td>
					<td>{{$per->email}}</td>
					<td>
						<a href="{{URL::action('ProveedorController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('compras.proveedor.modal')
				@include('compras.proveedor.mcreate')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>
@endsection