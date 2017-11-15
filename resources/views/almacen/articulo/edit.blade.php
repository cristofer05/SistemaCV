@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{$articulo->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
			{{Form::token()}}
			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="codigo">Barcode</label>
							<input class="form-control" type="text" name="codigo" value="{{$articulo->codigo}}" required autofocus>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input class="form-control" type="text" name="nombre" value="{{$articulo->nombre}}" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="categoria">Categoria</label>
							<select name="idcategoria" class="form-control">
							@foreach ($categorias as $cat)
								@if ($cat->idcategoria==$articulo->idcategoria)
									<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
								@else
									<option value="{{$cat->idcategoria}}" >{{$cat->nombre}}</option>
								@endif
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="stock">Stock</label>
							<input class="form-control" type="number" name="stock" value="{{$articulo->stock}}" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="descripcion">Descripción</label>
							<input class="form-control" type="text" name="descripcion" placeholder="Descripcion..." value="{{$articulo->descripcion}}">
						</div>
					</div>	
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="imagen">Imagen</label>
							<input class="form-control" type="file" name="imagen">
							
						</div>
						
					</div>	
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="btn-group">
							<label id="label-condicion">Condición</label>
							<input class="form-control" type="radio" id="radio1" name="condicion" value="new" checked>
						       <label for="radio1">New</label>
						    <input class="form-control" type="radio" id="radio2" name="condicion" value="open">
						       <label for="radio2">Like New</label> 
						    <input class="form-control" type="radio" id="radio3" name="condicion"value="ga">
						       <label for="radio3">Grado A</label>
						    <input class="form-control" type="radio" id="radio4" name="condicion" value="gb">
						       <label for="radio4">Grado B</label> 
						    <input class="form-control" type="radio" id="radio5" name="condicion" value="gc">
						       <label for="radio5">Grado C</label> 
						    <input class="form-control" type="radio" id="radio6" name="condicion" value="re">
						       <label for="radio6">Refurbished</label> 
						    <input class="form-control" type="radio" id="radio7" name="condicion" value="malo">
						       <label for="radio7">Malo</label> 
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<img src="{{asset('img/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="300px" width="300px">
					</div>
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
@endsection