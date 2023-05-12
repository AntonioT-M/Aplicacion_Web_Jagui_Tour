<?php
require_once '../class/GaleriaPU.php';

$p = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$galeriaPU = GaleriaPU::buscar($p);
	if(count($galeriaPU) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Imagen</td>
							<td>Nombre</td>
							<td>descripcion</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>';
	foreach($galeriaPU as $item){
		$salida.='<tr>
					<td>'.$item['ubicacion'].'</td>
					<td>'.$item['nombre'].'</td>
					<td>'.$item['descripcion'].'</td>
					<td>
						<form action="javascript: eliminar('.$item['idImagen'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="" method="POST">
							<input type="hidden" name="idHotel" value="'.$item['idImagen'].'">
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