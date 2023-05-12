<?php
	require_once '../class/Contacto.php';

	$idContact = (isset($_REQUEST['idContact'])) ? $_REQUEST['idContact'] : null;

	if($idContact){
		$contacto = Contacto::buscarPorId($idContact);
		$contacto->eliminar();
		header('Location: index.php');
	}

?>