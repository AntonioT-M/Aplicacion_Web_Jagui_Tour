<?php
require_once '../class/Destinos.php';
$idDestino = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idDestino){
	$destino = Destinos::buscarPorId($idDestino);
	$destino->eliminar();
	header('Location: index.php');
}

?>