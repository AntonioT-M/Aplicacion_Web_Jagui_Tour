<?php 
require_once '../class/viajerosG.php';
$idViajeros = isset($_REQUEST['idViajeros']) ? $_REQUEST['idViajeros'] : null;
$estadoVG = isset($_REQUEST['estadoVG']) ? $_REQUEST['estadoVG'] : null;
var_dump($idViajeros, $estadoVG);
if($idViajeros){
	$viajeros = ViajerosG::buscarPorId($idViajeros);
	var_dump($viajeros);
	$viajeros->setEstadoVG($estadoVG);
	$viajeros->guardar();
}
?>