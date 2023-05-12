<?php 
require_once '../class/Comentarios.php';

	$idComentario = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
	if($idComentario){
		$coment = Comentarios::buscarPorId($idComentario);
		if($coment->getEstatus() == 0){
			$estatus = "1";
		}else{
			$estatus = "0";
		}
		$idComentario = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
		$nombre = $coment->getNombre();
		$emailComent = $coment->getEmailComentario();
		$msj = $coment->getMensaje();
		$fecha = $coment->getFecha();
		
		$coment = new Comentarios($nombre, $emailComent, $msj, $fecha, $estatus, $idComentario);
		$coment->guardar();
		//echo '<script> window.location.href="index.php"; </script>';
	}
?>