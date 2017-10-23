<?php 
// Conexion a la base de datos
$con = mysqli_connect("localhost","root","","dbsistemacv");
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
///////////////////////////////
$codigo="";
$nombre="";
$categoria="";
$stock="";
$nomcategoria="";
///////////////////////////////

$action = $_REQUEST['action'];
$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));


$sql="SELECT * FROM articulo WHERE codigo = '$q'";
$query = mysqli_query($con, $sql);

while ($row=mysqli_fetch_array($query)){
	$codigo=$row['codigo'];
	$nombre=$row['nombre'];
	$categoria=$row['idcategoria'];
	$stock=$row['stock'];
}

if (isset($categoria)) {

	$sql="SELECT * FROM categoria WHERE idcategoria = '$categoria'";
	$query = mysqli_query($con, $sql);

	while ($row=mysqli_fetch_array($query)){
		$nomcategoria=$row['nombre'];
	}
}

/////////////////////////////////////////
?>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label for="codigo">Barcode</label>
		<input class="form-control" id="q" type="text" name="codigo" placeholder="Codigo..." value="<?php echo $q;?>" required>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input class="form-control" type="text" name="nombre" placeholder="Nombre..." value="<?php echo $nombre;?>" required>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label for="categoria">Categoria</label>
		<select name="idcategoria" class="form-control">
			<option value="<?php echo $categoria;?>" selected><?php echo $nomcategoria;?></option>
		</select>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label for="stock">Stock</label>
		<input class="form-control" type="number" name="stock" placeholder="Stock..." value="<?php echo $stock;?>" required>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input class="form-control" type="text" name="descripcion" placeholder="Descripcion..." value="">
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
	<div class="btn-group">
		<label id="label-missing">Missing</label>
		<input class="form-control" type="radio" id="mradio0" name="missing" value="nada" checked>
	       <label for="mradio0">Nada</label>
		<input class="form-control" type="radio" id="mradio1" name="missing" value="box">
	       <label for="mradio1">Box</label>
	    <input class="form-control" type="radio" id="mradio2" name="missing" value="manual">
	       <label for="mradio2">Manual</label> 
	    <input class="form-control" type="radio" id="mradio3" name="missing"value="wallmount">
	       <label for="mradio3">Wallmount</label>
	    <input class="form-control" type="radio" id="mradio4" name="missing" value="battery">
	       <label for="mradio4">Battery</label> 
	</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<img src="img/articulos/no-stock.png" alt="" height="100px" width="200px">
</div>

