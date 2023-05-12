<?php
require_once '../class/Contacto.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$contacto = Contacto::buscar($q);
	if(count($contacto) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Nombre</td>
							<td>Mensaje</td>
							<td></td>
							<td></td>						
						</tr>
					</thead>
					<tbody>';
	foreach($contacto as $item){
		$salida.='<tr>
					<td>'.$item['nombre'].'</td>
					<td>'.$item['mensaje'].'</td>				
					<td>
						<form action="javascript: eliminar('.$item['idContacto'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idContacto" value="'.$item['idContacto'].'">
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