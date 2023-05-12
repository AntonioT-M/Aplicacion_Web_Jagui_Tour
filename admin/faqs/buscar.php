<?php
require_once '../class/Faq.php';

$q = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : null;
$salida = "";
if($q){
	$faq = Faq::buscar($q);
	if(count($faq) > 0){
		$salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
					<thead>
						<tr>
							<td>Nombre</td>
							<td>Pregunta</td>
							<td>Respuesta</td>
							<td></td>
							<td></td>						
						</tr>
					</thead>
					<tbody>';
	foreach($faq as $item){
		$salida.='<tr>
					<td>'.$item['nombre'].'</td>
					<td>'.$item['pregunta'].'</td>
					<td>'.$item['respuesta'].'</td>					
					<td>
						<form action="javascript: eliminar('.$item['idFaqs'].')" method="POST">
							<input type="hidden" name="" value="">
							<button class="btn btn-danger">Eliminar</button>
						</form>
					</td>
					<td>
						<form action="guardar.php" method="GET">
							<input type="hidden" name="idFaqs" value="'.$item['idFaqs'].'">
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