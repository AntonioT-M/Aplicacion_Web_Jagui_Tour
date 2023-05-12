<?php
require_once '../class/Hoteles.php';
$idHotel = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idHotel){
	$hotel = Hoteles::buscarPorId($idHotel);
	$hotel->eliminar();
	header('Location: index.php');
}

?>