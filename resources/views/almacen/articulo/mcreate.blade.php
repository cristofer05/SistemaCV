<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="modal-nuevo">
<!--<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog"  tabindex="-1" id="modal-nuevo"> -->
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<h4 class="modal-title">Nuevo Articulo</h4>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<span id="loader"></span>
					</div>
				</div>	
			</div>
			<div class="modal-body">
			<div class="row">
			<!--	{!! Form::open(array('url'=>'almacen/articulo','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="center-block" style="width:430px">
								<label for="q">VERIFICAR</label>
								<input type="text" id="q" name="q" placeholder="Barcode..." style="width:270px" autofocus onkeypress="return pulsar(event)">
								 <input type="hidden" name="action" value="buscar">
							<!--	<span class="input-group-btn">
									<button type="button" class="btn btn-primary" onclick="return pulsar(event)">Buscar</button> 
								</span> -->
							</div>
					</div>
			<!--	{{Form::close()}} -->
			</div>

				{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','file'=>'true','enctype'=>'multipart/form-data'))!!}
				{{Form::token()}}
				<div class="row">
					<div class="ajax-content">
						
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
  	// if (text.value=="") {var text = document.getElementById("q2");}
  	var q= $("#q").val();
  	var parametros={'action':'buscar','q':q,};
  	$("#loader").fadeIn('slow');
		$.ajax({
			data: parametros,
			url:'{{asset("ajax/ajax.php")}}',
			 beforeSend: function(objeto){
			 $('#loader').html('<img src="{{asset("img/ajaxloader.gif")}}" width="30px"> Cargando...');
		  },
			success:function(data){
				$(".ajax-content").html(data).fadeIn('slow');
				$('#loader').html('');
				
			}
		})
  } 
}

</script>
