<?php
require_once '../class/ViajesP.php';
require_once '../class/Hoteles.php';
require_once '../class/Destinos.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$s = (isset($_REQUEST['s'])) ? $_REQUEST['s'] : null;
$r = (isset($_REQUEST['r'])) ? $_REQUEST['r']: null;
$salida = "";
//echo $q." ".$s." ".$r;
if($q || $s || $r){
	$viajeP = ViajesP::buscar($q, $s, $r);
	if(count($viajeP) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Destino</td>
							<td>Lugar</td>							
							<td>Salida</td>
							<td>Regreso</td>
							<td>Cliente</td>
							<td>Estado</td>
							<td></td>
							<td></td>														
						</tr>
					</thead>
					<tbody>';
	foreach($viajeP as $item){
		$salida.='<tr>
					<td>'.$item['destino'].'</td>
					<td>'.$item['lugarP'].'</td>
					<td>'.date('d-m-Y', strtotime($item['fechaSP'])).'</td>
					<td>'.date('d-m-Y', strtotime($item['fechaRP'])).'</td>
					<td>'.$item['nombreC']." ".$item['apellidosC'].'</td>
					<td>';
		if($item['estado'] == 2){ $salida.= "En revisión";}else{ $salida.= "Revisado";};
		$salida.=	'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idViajeP'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idViajeP" value="'.$item['idViajeP'].'">
							<button class="btn btn-primary">Gestionar</button>
						</form>
					</td
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
$idViajeP = (isset($_REQUEST['idViajeG'])) ? $_REQUEST['idViajeG'] : null;
$salida2="";
	$hotel = Hoteles::buscarHotel($destino);
		if(count($hotel)>0){
			$salida2.='<select class="form-control" name="hotelP" required><option value="">Selecciona</option>';
			if($idViajeP){ $viajeP = viajesP::buscarHotel($idViajeP);}
		foreach($hotel as $item){
			$salida2.='<option value="'.$item['nombreHotel'].'"';
				if($idViajeP){if($item['nombreHotel'] == $viajeP){ $salida2.='selected';}} 
			$salida2.='>'.$item['nombreHotel'].'</option>';
		}
		$salida2.='</select>';
	}else{
		$salida2.='<select class="form-control" name="hotelP" disabled required><option value="">Selecciona</option></select>';
	}
	echo $salida2;
}
if(isset($_REQUEST['lugar'])){
$lugarD = (isset($_REQUEST['lugar'])) ? $_REQUEST['lugar'] : null;
$idViajeVP = (isset($_REQUEST['idViajeP'])) ? $_REQUEST['idViajeP'] : null;
$salida3="";
	$destinos = Destinos::buscarDestino($lugarD);
	if($destinos){
	$lugar = Destinos::buscarLugar($destinos);
		if(count($lugar)>0){
			$salida3.='<select class="form-control" name="lugarP" required><option value="">Selecciona</option>';
			if($idViajeVP){ $viajeVP = viajesP::buscarLugar($idViajeVP);}
		foreach($lugar as $item){
			$salida3.='<option value="'.$item['lugar'].'"';
				if($idViajeVP){if($item['lugar'] == $viajeVP){ $salida3.='selected';}} 
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