<?php
include_once ('template/header.php');
?>

<div class="row">
	<center><div class="col-xs-12"><h3>Formulario de contacto</h3></div></center>
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		<form action="lib/procesar_contacto.php" method="post">
			<label for="nombre"><h4>Nombre:</h4></label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
			<br>
			<label for="mensaje"><h4>Mensaje:</h4></label><br>
			<textarea name="mensaje" id="mensaje" placeholder="Escriba aquí el mensaje..." class="form-control"></textarea>
			<br>
			<center><input type="submit" class="btn btn-primary"></center>
		</form>
	</div>
	<div class="col-xs-3"></div>
</div>
<div class="row">
	<div class="col-xs-12">
		<br>
		<center><h3>Visitanos en nuestras instalaciones</h3>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.370327888585!2d-100.72659258560866!3d20.034925426336837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd66e8ce0199b%3A0x2471381703f24719!2sAgencia+de+Viajes+Jagui+Tour!5e0!3m2!1ses!2smx!4v1564530687136!5m2!1ses!2smx" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></center>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<br>
		<center><h3>Te dejamos nuestro Facebook</h3>
			<h2> Ponte en contacto con nosotros </h2>
			<a href="https://es-la.facebook.com/jagui.tour/"><img src="images/icono-face.png" class="imagen2" style="width:25%; height:25%;"></a>
		</center>
		
	</div>
	<div class="col-xs-6">
		<br>
		<center><h3>Contactanos por WhatsApp</h3>
			<h2> +52 417 177 07 92 </h2>

			<img src="images/whatss.png" style="width:25%; height:25%;">
		</center>
		
	</div>
	

	
</div>

<div class="row">
	


<?php 
include('template/footer.php');
?>