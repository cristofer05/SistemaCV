<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="modal-nuevo">
<!--<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog"  tabindex="-1" id="modal-nuevo"> -->
	<h3>Nuevo Articulo</h3>
	{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','file'=>'true'))!!}
	{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Nuevo Articulo</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="codigo">Barcode</label>
							<input class="form-control" type="text" name="codigo" placeholder="Codigo..." value="{{old('codigo')}}" required autofocus>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input class="form-control" type="text" name="nombre" placeholder="Nombre..." value="{{old('nombre')}}" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="categoria">Categoria</label>
							<select name="idcategoria" class="form-control">
							@foreach ($categorias as $cat)
								<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
						<label for="stock">Stock</label>
						<input class="form-control" type="number" name="stock" placeholder="Stock..." value="{{old('stock')}}" required>
					</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						
					</div>	
				</div>
					
					
					
					
					<div class="form-group">
						<label for="imagen">Imagen</label>
						<input class="form-control" type="text" name="imagen" placeholder="Imagen...">
					</div>
			</div>
			<div class="modal-footer">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
</div>

