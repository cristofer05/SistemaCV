@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos <a href="" data-target="#modal-nuevo" data-toggle="modal"><button class="btn btn-success">Nuevo</button></a></h3>

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
		@include('almacen.articulo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Código</th>
					<th>Categoria</th>
					<th>Stock</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach ($articulos as $art)
				<tr>
					<td>{{$art->idarticulo}}</td>
					<td>
						<img src="{{asset('img/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" height="50px" width="50px" class="img-thumbnail">
					</td>
					<td>{{$art->nombre}}</td>
					<td>{{$art->codigo}}</td>
					<td>{{$art->categoria}}</td>
					<td>{{$art->stock}}</td>
					<td>{{$art->estado}}</td>
					<td>
						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</th>
				</tr>
				@include('almacen.articulo.modal')
				@include('almacen.articulo.mcreate')
				@endforeach
			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>
@endsection