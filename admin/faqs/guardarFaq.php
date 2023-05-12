<?php
session_start();

	require_once '../class/Faq.php';
	

	$idFaqs = (isset($_REQUEST['idFaqs'])) ? $_REQUEST['idFaqs'] : null;

	if ($idFaqs) {

		$faq = Faq::buscarPorId($idFaqs);
		

	}else{

		$faq = new Faq();
		
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$pregunta = (isset($_POST['pregunta'])) ? $_POST['pregunta'] : null;
		$respuesta = (isset($_POST['respuesta'])) ? $_POST['respuesta'] : null;
		$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
		$faq->setPregunta($pregunta);
		$faq->setRespuesta($respuesta);
		$faq->setNombre($nombre);
		$faq->guardar();

			echo '<script> 
					alert("Registro exitoso"); 
					window.location.href="index.php";
				</script>';
	}
?>


<script type="text/javascript">

	function validarEspacio(){

		 var txtPregunta = document.getElementById('pregunta').value;
		 var txtRespuesta = document.getElementById('respuesta').value;
		 var txtNombre = document.getElementById('nombre').value;
	    if(txtPregunta == null || txtPregunta.length == 0 || /^\s*$/.test(txtPregunta)){
	      
	      alert('ERROR: El campo pregunta no debe ir vacío o lleno de solamente espacios en blanco');
	      
		return false;

 		}
 		 if(txtNombre == null || txtNombre.length == 0 || /^\s*$/.test(txtNombre)){
	      
	      alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
	      
		return false;

 		}

    	if(txtRespuesta == null || txtRespuesta.length == 0 || /^\s*$/.test(txtRespuesta)){
	      
	      alert('ERROR: El campo respuesta no debe ir vacío o lleno de solamente espacios en blanco');
	      
		return false;

 		}	
    		
	}
</script>

<center>
<div class="row">
	<div class="col-xs-12">
		<h1>Guardar FAQ</h1>
	</div>
</div>
</center>

		<form method="POST" action="guardarFaq.php">
			<?php if ($faq->getIdFaq()): ?>
				<input type="hidden" name="idFaqs" value="<?php echo $faq->getIdFaq() ?>"/>
			<?php endif; ?>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group" style="margin: 15px;">
					<label for="nombre">Nombre:</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $faq->getNombre() ?>">
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group" style="margin: 15px;">
					<label for="pregunta">Pregunta:</label>
					<input type="text" class="form-control" id="pregunta" name="pregunta" value="<?php echo $faq->getPregunta() ?>">
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group" style="margin: 15px;">
					<label for="respuesta">Respuesta:</label>
					<input type="text" class="form-control" id="respuesta" name="respuesta" value="<?php echo $faq->getRespuesta() ?>"> 
					<br>
					</div>
				</div>
			</div>

			<input type="hidden" name="fecha" value="<?php echo date('Y-m-d') ?>"/>
			<center><div>
				<input type="submit" value="Guardar" class="btn btn-success" onclick="return validarEspacio()" />
				<a href="index.php" class="btn btn-danger">Cancelar</a>
			</div></center>
		</form>

<?php 

	include_once '../template/footer.php';

	
	?>