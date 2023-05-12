<?php
require_once '../class/Clientes.php';
$idCliente = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idCliente){
	$cliente = Clientes::buscarPorId($idCliente);
	$cliente->eliminar();
	header('Location: index.php');
}

?>