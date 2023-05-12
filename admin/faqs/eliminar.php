<?php
require_once '../class/Faq.php';
$idFaq = (isset($_REQUEST['idFaqs'])) ? $_REQUEST['idFaqs'] : null;


if($idFaq){
	$faq = Faq::buscarPorId($idFaq);
	$faq->eliminar();
	header('Location: index.php');
}

?>