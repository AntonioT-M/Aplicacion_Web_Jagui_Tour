<?php 
	require_once '../class/GaleriaI.php';

	$idImagen = (isset($_REQUEST['idImagen'])) ? $_REQUEST['idImagen'] : null;

	if ($idImagen) {
		$galeria = GaleriaI::buscarPorId($idImagen);
		$galeria->eliminar();
		header('Location: index.php');
	}
?>