<?php 
	require_once '../class/GaleriaPU.php';

	$idImagen = (isset($_REQUEST['idImagen'])) ? $_REQUEST['idImagen'] : null;

	if ($idImagen) {
		$galeria2 = GaleriaPU::buscarPorId($idImagen);
		$galeria2->eliminar();
		header('Location: index.php');
	}
?>