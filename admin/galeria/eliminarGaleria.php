<?php 
	require_once '../class/GaleriaP.php';

	$idImagen = (isset($_REQUEST['idImagen'])) ? $_REQUEST['idImagen'] : null;

	if ($idImagen) {
		$galeria = GaleriaP::buscarPorId($idImagen);
		$galeria->eliminar();
		header('Location: index.php');
	}
?>