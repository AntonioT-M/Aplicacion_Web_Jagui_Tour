<?php
require_once '../class/Comentarios.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$comentario = Comentarios::buscar($q);
	if(count($comentario) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Nombre</td>
							<td>Email</td>
							<td>Mensaje</td>
							<td>Fecha</td>
							<td>Estatus</td>
							<td></td>
							<td></td>						
						</tr>
					</thead>
					<tbody>';
	foreach($comentario as $item){
		$salida.='<tr>
					<td>'.$item['nombre'].'</td>
					<td>'.$item['emailComentario'].'</td>
					<td>'.$item['mensaje'].'</td>
					<td>'.$item['fecha'].'</td>
					<td>'.$item['estatus'].'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idComentario'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="gestionComentario.php" method="GET">
							<input type="hidden" name="idComentario" value="'.$item['idComentario'].'">
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
?>