<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nuevo">
	<h3>Nuevo Articulo</h3>
	{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off'))!!}
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
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" placeholder="Nombre...">
				</div>
				<div class="form-group">
					<label for="codigo">Codigo</label>
					<input class="form-control" type="text" name="codigo" placeholder="Codigo...">
				</div>
				<div class="form-group">
					<label for="categoria">Categoria</label>
					<input class="form-control" type="text" name="categoria" placeholder="Categoria...">
				</div>
				<div class="form-group">
					<label for="stock">Stock</label>
					<input class="form-control" type="text" name="stock" placeholder="Stock...">
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
