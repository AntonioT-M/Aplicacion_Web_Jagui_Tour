<?php
require_once '../admin/class/ViajesG.php';
require_once '../admin/class/Hoteles.php';
require_once '../admin/class/Destinos.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$s = (isset($_REQUEST['s'])) ? $_REQUEST['s'] : null;
$r = (isset($_REQUEST['r'])) ? $_REQUEST['r']: null;
$salida = "";
$data = "";
if($q || $s || $r){
	$viajeG = ViajesG::buscar($q, $s, $r);
	if(count($viajeG) > 0){
		$salida.='<section class="no_sidebar_2column_area">
				<div class="container">
					<div class="two_column_product">
      					<div class="row">';
	foreach($viajeG as $item){
		if($item['fechaSG'] < date('Y-m-d', strtotime('- 5 days'))){ }else{
		$salida.='<div class="col-lg-3 col-sm-6">
			<div class="l_product_item">
				<div class="l_p_img">
					<img class="img-fluid" style="height: 150px; width: 300px; size: cover;" src="admin/destinos/'.$item['urlDestino'].'">
				</div>
                    <div class="l_p_text">
                        <ul>
                        <input type="hidden" name="idViajeG" value="'.$item['idViajeG'].'">
                        <li><button class="add_cart_btn" onclick="abrirViaje('.$item['idViajeG'].')">Adquirir</button></li>
                        </ul>
                        <h4>'.$item['destino'].'</h4>
                        <h5><del></del></h5>
                    </div>
				</div>
			</div>';
			$data+=1;
		}
	}
	$salida.='</div>
			</div>
		</div>
	</section>';
	}else{
		$salida.='<div class="col-xs-12"><img src="admin/template/img/jagui_tour.png" style="border-radius: 160px; margin-left: 40%;"></img><p class="centered noHayDatos" style="">Lo sentimos, no se encontraron viajes. Por favor, sigue con nosotros</p></div>';
	}
	if($data >= 1){
	echo $salida;
	}else{
	echo $sinData='<div class="col-xs-12"><img src="admin/template/img/jagui_tour.png" style="border-radius: 160px; margin-left: 40%;"></img><p class="centered noHayDatos" style="">Lo sentimos, no se encontraron viajes. Por favor, sigue con nosotros</p></div>';
	} 
}
if(isset($_REQUEST['destino'])){
$destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : null;
$salida2="";
	$hotel = Hoteles::buscarHotel($destino);
		if(count($hotel)>0){
			$salida2.='<select class="form-control" name="hotelP" required>
			<option value="">Selecciona</option>';
		foreach($hotel as $item){
			$salida2.='<option value="'.$item['nombreHotel'].'">'.$item['nombreHotel'].'</option>';
		}
		$salida2.='</select>';
	}else{
		$salida2.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';
	}
	echo $salida2;
}
if(isset($_REQUEST['lugar'])){
$lugarD = (isset($_REQUEST['lugar'])) ? $_REQUEST['lugar'] : null;
$salida6="";
	$destinos = Destinos::buscarDestino($lugarD);
	if($destinos){
	$lugar = Destinos::buscarLugar($destinos);
		if(count($lugar)>0){
			$salida6.='<select class="form-control" name="lugarP" required><option value="">Selecciona</option>';
		foreach($lugar as $item){
			$salida6.='<option value="'.$item['lugar'].'">'.$item['lugar'].'</option>';
		}
		$salida6.='</select>';
	}else{
		$salida6.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';
	}
	}else{
		$salida6.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';	
	}
	echo $salida6;
}
if(isset($_REQUEST['respuestaNewVP'])){
	$respuestaNewVP = (isset($_REQUEST['respuestaNewVP'])) ? $_REQUEST['respuestaNewVP'] : null;
	$salida3="";
	if($respuestaNewVP == "si"){
		$salida3='<div class="form-group col-sm-4">
					<label class="control-label">Numero de adultos</label>
					<input class="form-control" type="number" onchange="asignarPersonas()" id="cantAdultos" min="0" name="adultos">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Numero de infantes</label>
					<input class="form-control" id="cantPeques" onchange="asignarPersonas()" type="number" min="0" name="infantes">
				</div>';
	}
	echo $salida3;
}
if(isset($_REQUEST['adultos']) || isset($_REQUEST['peques'])){
	$adultos = (isset($_REQUEST['adultos'])) ? $_REQUEST['adultos'] : null;
	$peques = (isset($_REQUEST['peques'])) ? $_REQUEST['peques'] : null;
	$salida4="";
	$salida5="";
	if($adultos >= 1){
		$salida4.='<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Información de los adultos</p>
				</div>';
		for ($i=0; $i < $adultos; $i++) { 
		$salida4.='<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del '.($i+1).'° adulto</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombres[]" required>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="apellidos[]" required>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Edad</label>
					<input class="form-control" type="number" min="18" name="edadesVP[]" required>
				</div>';
		}
	}
	if($peques >= 1){
		$salida5.='<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Información de los menores</p>
				</div>';
		for ($i=0; $i < $peques; $i++) { 
		$salida5.='<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del '.($i+1).'° menor</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombres[]" required>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="apellidos[]" required>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Edad</label>
					<input class="form-control" type="number" min="2" max="9" name="edadesVP[]" required>
				</div>';	
		}
	}

	if($salida4 && $salida5){
	echo $salida4."".$salida5;
	}else if($salida4){
		echo $salida4;
	}else if($salida5){
		echo $salida5;
	}
}
if(isset($_REQUEST['idViaje']) || isset($_REQUEST['cliente']) || isset($_REQUEST['cantA']) || isset($_REQUEST['cantN'])){
	$idViaje = (isset($_REQUEST['idViaje'])) ? $_REQUEST['idViaje'] : null;
	$cantCliente = (isset($_REQUEST['cliente'])) ? $_REQUEST['cliente'] : 1;
	$cantA = (isset($_REQUEST['cantA'])) ? $_REQUEST['cantA'] : 0;
	$cantN = (isset($_REQUEST['cantN'])) ? $_REQUEST['cantN'] : 0;
	$salida7="";
	$viaje = viajesG::buscarPorId($idViaje);
	$precioTotal = (($cantCliente + $cantA) * $viaje->getPrecioA()) + ($cantN * $viaje->getPrecioN());
	echo '<p>Precio total ahora <span style="color: green; font-size:150%; ">$'.$precioTotal.'</span></p><input type="hidden" name="precioT" value="'.$precioTotal.'">';
}
?>