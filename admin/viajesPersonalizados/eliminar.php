<?php
require_once '../class/ViajesP.php';
$idViajeP = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idViajeP){
	$viajeP = ViajesP::buscarPorId($idViajeP);
	$viajeP->eliminar();
	header('Location: index.php');
}

?>