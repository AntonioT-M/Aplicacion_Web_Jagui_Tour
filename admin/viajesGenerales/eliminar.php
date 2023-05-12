<?php
require_once '../class/ViajesG.php';
$idViajeG = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idViajeG){
	$viajeG = ViajesG::buscarPorId($idViajeG);
	$viajeG->eliminar();
	header('Location: index.php');
}

?>