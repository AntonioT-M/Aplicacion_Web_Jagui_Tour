<?php
require_once '../class/Transportes.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$transporte = Transportes::buscar($q);
	if(count($transporte) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Nombre</td>
							<td>Tipo</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>';
	foreach($transporte as $item){
		$salida.='<tr>
					<td>'.$item['nombreT'].'</td>
					<td>'.$item['tipoT'].'</td>
					<td>
						<form action="javascript: eliminar('.$item['idTransporte'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idTransporte" value="'.$item['idTransporte'].'">
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