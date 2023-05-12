<?php
require_once '../class/Usuarios.php';
$idUsuario = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idUsuario){
	$usuario = Usuarios::buscarPorId($idUsuario);
	$usuario->eliminar();
	header('Location: index.php');
}

?>