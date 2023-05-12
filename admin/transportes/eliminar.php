<?php
require_once '../class/Transportes.php';
$idTransporte = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idTransporte){
	$transporte = Transportes::buscarPorId($idTransporte);
	$transporte->eliminar();
	header('Location: index.php');
}

?>