<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="modal-nuevo">
<!--<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog"  tabindex="-1" id="modal-nuevo"> -->
	<h3>Nuevo Articulo</h3>
	{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','file'=>'true','enctype'=>'multipart/form-data'))!!}
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
							<input class="form-control" id="q" type="text" name="codigo" placeholder="Codigo..." value="{{old('codigo')}}" required autofocus onkeypress="return pulsar(event)">
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
						<div class="form-group">
							<label for="descripcion">Descripción</label>
							<input class="form-control" type="text" name="descripcion" placeholder="Descripcion..." value="{{old('descripcion')}}">
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
						<img src="{{asset('img/articulos/no-stock.png')}}" alt="" height="200px" width="200px">
					</div>
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

<script type="text/javascript">

function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  if (tecla==13){
  	var text = document.getElementById("q");
  	alert("Barcode: -> " + text.value);
  	/////////////
  	var q= $("#q").val();
  	var parametros={'action':'ajax','page':page,'q':q,'id_categoria':id_categoria};
  	$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/buscar_productos.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
  } 
}

</script>
