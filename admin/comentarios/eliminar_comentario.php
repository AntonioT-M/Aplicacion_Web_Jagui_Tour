<?php
	require_once '../class/Comentario.php';

	$idComentario = (isset($_REQUEST['idComentario'])) ? $_REQUEST['idComentario'] : null;


	if($idComentario){
		$comentario = Comentarios::buscarPorId($idComentario);
		$comentario->eliminar();
		header('Location: index.php');
	}

?>