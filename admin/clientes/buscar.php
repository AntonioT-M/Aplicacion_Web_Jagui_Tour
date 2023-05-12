<?php
require_once '../class/Clientes.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$cliente = Clientes::buscar($q);
	if(count($cliente) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Avatar</td>
							<td>Nombre</td>
							<td>Apellidos</td>
							<td>Email</td>
							<td></td>
							<td></td>							
						</tr>
					</thead>
					<tbody>';
	foreach($cliente as $item){
		$salida.='<tr>
					<td><img height="50" width="50" src="'.$item['urlAvatarC'].'"</td>
					<td>'.$item['nombreC'].'</td>
					<td>'.$item['apellidosC'].'</td>
					<td>'.$item['emailC'].'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idCliente'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idCliente" value="'.$item['idCliente'].'">
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