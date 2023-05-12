<?php
require_once '../class/Comentarios.php';
$idComentario = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;


if($idComentario){
	$comentario = Comentarios::buscarPorId($idComentario);
	$comentario->eliminar();
	header('Location: index.php');
}

?>