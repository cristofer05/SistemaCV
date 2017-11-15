<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nuevo">
	<h3>Nuevo Cliente</h3>
	{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Nuevo Cliente</h4>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" placeholder="Nombre..." required value="{{old('nombre')}}">
				</div>
				<div class="form-group">
					<label for="nombre">Tipo de Documento</label>
					<select name="tipo_documento" class="form-control" required>
						<option value="Cedula" selected>Cedula</option>
						<option value="Pasaporte">Pasaporte</option>
						<option value="Otro">Otro</option>
					</select>
				</div>
				<div class="form-group">
					<label for="nombre">Número de Documento</label>
					<input class="form-control" type="text" name="num_documento" placeholder="Numero de Documento..." value="{{old('num_documento')}}">
				</div>
				<div class="form-group">
					<label for="nombre">Direccion</label>
					<input class="form-control" type="text" name="direccion" placeholder="Direccion..." value="{{old('direccion')}}">
				</div>
				<div class="form-group">
					<label for="nombre">Telefono</label>
					<input class="form-control" type="text" name="telefono" placeholder="Telefono..." value="{{old('telefono')}}">
				</div>
				<div class="form-group">
					<label for="nombre">Email</label>
					<input class="form-control" type="email" name="email" placeholder="Email..." value="{{old('email')}}">
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
