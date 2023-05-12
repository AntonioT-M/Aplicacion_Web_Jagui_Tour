<?php
require_once '../class/Usuarios.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$usuario = Usuarios::buscar($q);
	if(count($usuario) > 0){
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
	foreach($usuario as $item){
		$salida.='<tr>
					<td><img height="50" width="50" src="'.$item['urlAvatarUser'].'"></td>
					<td>'.$item['nombreUser'].'</td>
					<td>'.$item['apellidosUser'].'</td>
					<td>'.$item['emailUser'].'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idUsuario'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idUsuario" value="'.$item['idUsuario'].'">
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