<?php
require_once '../class/Contacto.php';
$idContacto = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idContacto){
	$Contacto = Contacto::buscarPorId($idContacto);
	$Contacto->eliminar();
	header('Location: index.php');
}

?>