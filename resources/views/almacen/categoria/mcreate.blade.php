<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nuevo">
	<h3>Nueva Categoria</h3>
	{!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Nueva Categoria</h4>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" placeholder="Nombre...">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<input class="form-control" type="text" name="descripcion" placeholder="Descripcion...">
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
