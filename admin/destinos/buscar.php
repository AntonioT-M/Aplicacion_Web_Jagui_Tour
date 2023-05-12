<?php
require_once '../class/Destinos.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$destino = Destinos::buscar($q);
	if(count($destino) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Imagen</td>
							<td>Destino</td>
							<td>Lugar</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>';
	foreach($destino as $item){
		$salida.='<tr>
					<td><img height="50" width="50" src="'.$item['urlDestino'].'"></td>
					<td>'.$item['destino'].'</td>
					<td>'.$item['lugar'].'</td>
					<td>
						<form action="javascript: eliminar('.$item['idDestino'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idDestino" value="'.$item['idDestino'].'">
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
?>