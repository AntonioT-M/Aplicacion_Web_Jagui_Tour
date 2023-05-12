<?php
require_once '../class/Hoteles.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$hotel = Hoteles::buscar($q);
	if(count($hotel) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Imagen</td>
							<td>Nombre</td>
							<td>Estrellas</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>';
	foreach($hotel as $item){
		$salida.='<tr>
					<td><img height="50" width="50" src="'.$item['urlHotel'].'"></td>
					<td>'.$item['nombreHotel'].'</td>
					<td>'.$item['estrellas'].'</td>
					<td>
						<form action="javascript: eliminar('.$item['idHotel'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idHotel" value="'.$item['idHotel'].'">
							<button class="btn btn-primary">Actualizar</button>
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
$myr = (isset($_REQUEST['myr'])) ? $_REQUEST['myr'] : null;
$mnr = (isset($_REQUEST['mnr'])) ? $_REQUEST['mnr'] : null;
$inf = (isset($_REQUEST['inf'])) ? $_REQUEST['inf'] : null;
$jnr = (isset($_REQUEST['jnr'])) ? $_REQUEST['jnr'] : null;
$salida2 = "";
$salida3 = "";
if($myr || $mnr || $inf || $jnr){
	$salida2.='<div class="col-sm-12"><p>Precios</p></div>';
	$mayor='<div class="col-sm-2"><label class="control-label">Precio Myr</label>
					<input class="form-control" name="pMyr" pattern="[.0-9]+" required></div>';
	$menor='<div class="col-sm-2"><label class="control-label">Precio Mnr</label>
					<input class="form-control" name="pMnr" pattern="[.0-9]+" required></div>';
	$infante='<div class="col-sm-2"><label class="control-label">Precio Inf</label>
					<input class="form-control" name="pInf" pattern="[.0-9]+" required></div>';
	$junior='<div class="col-sm-2"><label class="control-label">Precio Jnr</label>
					<input class="form-control" name="pJnr" pattern="[.0-9]+" required></div>';
	$salida3.='<div class="col-sm-12"><p>Rango de edades</p></div>';
	$mayor2 ='<div class="col-sm-1"><label class="control-label">Edad Myr</label></div>
					<div class="col-sm-1"><input class="form-control" name="rIMyr" pattern="[0-9]+" maxlength="3" required></div><div class="col-sm-1"><input class="form-control" name="rFMyr" pattern="[0-9]+" maxlength="3" required></div>';
	$menor2 ='<div class="col-sm-1"><label class="control-label">Edad Mnr</label></div>
					<div class="col-sm-1"><input class="form-control" name="rIMnr" pattern="[0-9]+" maxlength="3" required></div><div class="col-sm-1"><input class="form-control" name="rFMnr" pattern="[0-9]+" maxlength="3" required></div>';
	$infante2 ='<div class="col-sm-1"><label class="control-label">Edad Inf</label></div>
					<div class="col-sm-1"><input class="form-control" name="rIInf" pattern="[0-9]+" maxlength="3" required></div><div class="col-sm-1"><input class="form-control" name="rFInf" pattern="[0-9]+" maxlength="3" required></div>';
	$junior2 ='<div class="col-sm-1"><label class="control-label">Edad Jnr</label></div>
					<div class="col-sm-1"><input class="form-control" name="rIJnr" pattern="[0-9]+" maxlength="3" required></div><div class="col-sm-1"><input class="form-control" name="rFJnr" pattern="[0-9]+" maxlength="3" required></div>';
	if($myr && $mnr && $inf && $jnr){
		echo $salida2.= $mayor."".$menor."".$infante."".$junior;
		echo $salida3.= $mayor2."".$menor2."".$infante2."".$junior2;
	}else if($myr && $mnr && $inf){
		echo $salida2.= $mayor."".$menor."".$infante;
		echo $salida3.= $mayor2."".$menor2."".$infante2;
	}else if($myr && $mnr && $jnr){
		echo $salida2.= $mayor."".$menor."".$junior;
		echo $salida3.= $mayor2."".$menor2."".$junior2;
	}else if($myr && $inf && $jnr){
		echo $salida2.= $mayor."".$infante."".$junior;
		echo $salida3.= $mayor2."".$infante2."".$junior2;
	}else if($mnr && $inf && $jnr){
		echo $salida2.= $menor."".$infante."".$junior;
		echo $salida3.= $mayor2."".$infante2."".$junior2;
	}else if($myr && $mnr){
		echo $salida2.= $mayor."".$menor;
		echo $salida3.= $mayor2."".$menor2;
	}else if($myr && $inf){
		echo $salida2.= $mayor."".$infante;
		echo $salida3.= $mayor2."".$infante2;
	}else if($myr && $jnr){
		echo $salida2.= $mayor."".$junior;
		echo $salida3.= $mayor2."".$junior2;
	}else if($mnr && $inf){
		echo $salida2.= $menor."".$infante;
		echo $salida3.= $menor2."".$infante2;
	}else if($mnr && $jnr){
		echo $salida2.= $menor."".$junior;
		echo $salida3.= $menor2."".$junior2;
	}else if($inf && $jnr){
		echo $salida2.= $infante."".$junior;
		echo $salida3.= $infante2."".$junior2;
	}else if($myr){
		echo $salida2.= $mayor;
		echo $salida3.= $mayor2;
	}else if($mnr){
		echo $salida2.= $menor;
		echo $salida3.= $menor2;
	}else if($inf){
		echo $salida2.= $infante;
		echo $salida3.= $infante2;
	}else if($jnr){
		echo $salida2.= $junior;
		echo $salida3.= $junior2;
	}
	//echo $salida = $myr.", ".$mnr.", ".$inf.", ".$jnr;
}
?>