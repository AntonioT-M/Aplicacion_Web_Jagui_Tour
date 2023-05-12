<?php
require_once '../class/ViajesG.php';
require_once '../class/Hoteles.php';
require_once '../class/Destinos.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$s = (isset($_REQUEST['s'])) ? $_REQUEST['s'] : null;
$r = (isset($_REQUEST['r'])) ? $_REQUEST['r']: null;
$salida = "";
//echo $q." ".$s." ".$r;
if($q || $s || $r){
	$viajeG = ViajesG::buscar($q, $s, $r);
	if(count($viajeG) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Destino</td>
							<td>Lugar</td>
							<td>Transporte</td>
							<td>Espacio</td>
							<td>Salida</td>
							<td>Regreso</td>
							<td></td>
							<td></td>
							<td></td>														
						</tr>
					</thead>
					<tbody>';
	foreach($viajeG as $item){
		$salida.='<tr>
					<td><img height="50" width="50" src="../destinos/'.$item['urlDestino'].'"></td>
					<td>'.$item['lugarG'].'</td>
					<td>'.$item['nombreT'].'</td>
					<td>'.$item['nPersonasAdd'].'</td>
					<td>'.date('d-m-Y', strtotime($item['fechaSG'])).'</td>
					<td>'.date('d-m-Y', strtotime($item['fechaRG'])).'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idViajeG'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idViajeG" value="'.$item['idViajeG'].'">
							<button class="btn btn-primary">Actualizar</button>
						</form>
					</td>
					<td>
						<form action="viajeros.php" method="GET">
							<input type="hidden" name="idViajeG" value="'.$item['idViajeG'].'">
							<button class="btn btn-primary">Viajeros</button>
						</form>
					</td>					
					</tr>';
	}
		$salida.='</tbody></table>';
	}else{
		$salida.='<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay datos</p></div>';
	}
	echo $salida;
}
if(isset($_REQUEST['destino'])){
$destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : null;
$idViajeG = (isset($_REQUEST['idViajeG'])) ? $_REQUEST['idViajeG'] : null;
$salida2="";
	$hotel = Hoteles::buscarHotel($destino);
		if(count($hotel)>0){
			$salida2.='<select class="form-control" name="hotel" required><option value="">Selecciona</option>';
			if($idViajeG){ $viajeG = viajesG::buscarHotel($idViajeG);}
		foreach($hotel as $item){
			$salida2.='<option value="'.$item['idHotel'].'"';
				if($idViajeG){if($item['idHotel'] == $viajeG){ $salida2.='selected';}} 
			$salida2.='>'.$item['nombreHotel'].'</option>';
		}
		$salida2.='</select>';
	}else{
		$salida2.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';
	}
	echo $salida2;
}
if(isset($_REQUEST['lugar'])){
$lugarD = (isset($_REQUEST['lugar'])) ? $_REQUEST['lugar'] : null;
$idViajeVG = (isset($_REQUEST['idViajeP'])) ? $_REQUEST['idViajeP'] : null;
$salida3="";
	$destinos = Destinos::buscarDestino($lugarD);
	if($destinos){
	$lugar = Destinos::buscarLugar($destinos);
		if(count($lugar)>0){
			$salida3.='<select class="form-control" name="lugarG" required><option value="">Selecciona</option>';
			if($idViajeVG){ $viajeVG = viajesG::buscarLugar($idViajeVG);}
		foreach($lugar as $item){
			$salida3.='<option value="'.$item['lugar'].'"';
				if($idViajeVG){if($item['lugar'] == $viajeVG){ $salida3.='selected';}} 
			$salida3.='>'.$item['lugar'].'</option>';
		}
		$salida3.='</select>';
	}else{
		$salida3.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';
	}
	}else{
		$salida3.='<select class="form-control" name="hotel" disabled required><option value="">Selecciona</option></select>';	
	}
	echo $salida3;
}
?>