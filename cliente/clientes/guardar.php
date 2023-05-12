<?php
	require_once '../../admin/class/Clientes.php';
	include('../template/header.php');

	$idCliente = (isset($_SESSION['id']));
	if($idCliente){
		$cliente = Clientes::buscarPorId($idCliente);
	}else{
		$cliente = new Clientes();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : null;
			$nombreCliente = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$edad = (isset($_REQUEST['edad'])) ? $_POST['edad'] : null;
			$tipoTelefono = (isset($_REQUEST['tipoT'])) ? $_POST['tipoT'] : null;
			$numTelefono = (isset($_REQUEST['numero'])) ? $_POST['numero'] : null;
			$numTarjeta = (isset($_REQUEST['tarjeta'])) ? $_POST['tarjeta'] : null;
			$passPort = (isset($_REQUEST['passPort'])) ? $_POST['passPort'] : null;
			$email = (isset($_POST['email'])) ? $_POST['email'] : null;
			$password = (isset($_POST['password'])) ? $_POST['password'] : null;
			$privilegios = $cliente->getPrivilegios();
			if($password == $cliente->getPassCliente()){
				$encrypt = $cliente->getPassCliente();
			}else{
				$password;
				$encrypt = md5($password);
			}
			if($_FILES['urlAvatar']['type'] == 'image/jpeg' || $_FILES['urlAvatar']['type'] == 'image/png' || $_FILES['urlAvatar']['type'] == 'image/jpg'){
				$rutaServidor = '../../admin/clientes/uploads';
				$nombreImg = $_FILES['urlAvatar']['name'];
				$rutaTmp = $_FILES['urlAvatar']['tmp_name'];
				$rutaDestino = $rutaServidor."/".$nombreImg;
				move_uploaded_file($rutaTmp, $rutaDestino);
			if($_SESSION['email'] == $cliente->getEmailC()){//Si editamos la img del usuario con el cual iniciamos sección, esto actualiza el avatar que se muestra en la barra lateral izquierda
				$_SESSION['urlAvatar'] = $rutaDestino;
			}
			if(isset($_REQUEST['idCliente'])){
				if($cliente->getUrlAvatarC() != "../../admin/clientes/uploads/no_image.png"){
					$cliente = unlink($cliente->getUrlAvatarC());
				}
			}
			}else{
				$rutaDestino = $cliente->getUrlAvatarC();
			}
			$cliente = new Clientes($idCliente, $rutaDestino, $nombreCliente, $apellidos, $edad, $tipoTelefono, $numTelefono, $email, $encrypt, $numTarjeta, $passPort, $privilegios);
			$cliente->guardar();
			echo '<script> window.location.href="guardar.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_SESSION['id'])){ echo 'Mi perfil';}else{ echo '////';}?></h1>
			</div>
		<form method="POST" id="miPerfil" action="guardar.php" enctype="multipart/form-data">
		<?php if ($cliente->getIdCliente()): ?>
			<input type="hidden" name="idCliente" value="<?php echo $cliente->getIdCliente() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-12">
		<label class="control-label col-sm-3">Avatar</label>
            <div class="col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="max-width: 120px; max-height: 200px; line-height: 20px;"><img width="120" height="200" src="<?php echo $cliente->getUrlAvatarC() ?>" alt="" /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
                    </div>
                <div>
                <span class="">
                    <input id="imagen" type="hidden" name="urlAvatar" class="btn btn-primary" value="<?php echo $cliente->getUrlAvatarC() ?>" />
                </span>
                </div>
                </div>
            </div>
        </div>
        <div>
		<div class="form-group col-sm-4">
		<label>Nombre</label>
			<input type="text" name="nombre" class="form-control lectura" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $cliente->getNombreC() ?>" readOnly required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Apellidos</label>
			<input type="text" name="apellidos" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" onchange="validarEspacio()" id="validar" class="form-control lectura" placeholder="Apellidos" value="<?php echo $cliente->getApellidosC() ?>" readOnly required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Edad</label>
			<input class="form-control lectura" type="number" name="edad" min="18" readOnly required value="<?php echo $cliente->getEdadC() ?>">
		</div>
		<div class="form-group col-sm-4">
			<label>Tipo Telefono</label>
			<select class="form-control lectura selectores" name="tipoT" readOnly disabled required>
				<option value="">Selecciona</option>
				<?php $tipoTel = $cliente->getTipoTelefono()?>
				<option value="Casa" <?php if($tipoTel == "Casa"){ echo "selected";}?>>Casa</option>
				<option value="Celular" <?php if($tipoTel == "Celular"){ echo "selected";}?>>Celular</option>
			</select>
		</div>
		<div class="form-group col-sm-4">
			<label>Numero de telefono</label>
			<input class="form-control lectura" type="text" name="numero" readOnly required pattern="[0-9]+" minlength="15" maxlength="15" onchange="validarEspacio()" id="validar" placeholder="numero de telefono" title="17 Digitos" value="<?php echo $cliente->getNumTelefono()?>">
		</div>
		<div class="form-group col-sm-4">
			<label>Pasaporte</label>
			<?php $pasaporte = $cliente->getPassPort()?>
			<select class="form-control lectura selectores" name="passPort" readOnly disabled required>
				<option value="">Selecciona</option>
				<option value="1" <?php if($pasaporte == 1){echo "selected";}?>>Si</option>
				<option value="2" <?php if($pasaporte == 2){echo "selected";}?>>No</option>
			</select>
		</div>
		<div class="form-group col-sm-4">
			<label>Numero de tarjeta</label>
			<input class="form-control lectura" type="text" name="tarjeta" onchange="validarEspacio()" id="validar" pattern="[0-9]+" minlength="16" maxlength="16" placeholder="número de tarjeta" readOnly value="<?php echo $cliente->getNumTarjeta()?>">
		</div>
		<div class="form-group col-sm-4">	
		<label>Email</label>
		<input class="form-control lectura" type="email" name="email" onchange="validarEspacio()" id="validar" placeholder="mail@mail.com" value="<?php echo $cliente->getEmailC() ?>" readOnly required />
		</div>
		<div class="form-group col-sm-4">
		<label>Password</label>
		<input type="password" name="password" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn0-9 ]+" class="form-control lectura" onchange="validarEspacio()" id="validar" placeholder="********" value="<?php echo $cliente->getPassCliente() ?>" readonly required />
		</div>
		<div class="form-group col-sm-12" style="display: none;">
			<button class="btn btn-success pull-right" id="guardar">Guardar</button>
		</div>
		</div>
	</form>
		<div class="form-group col-sm-12">
		<button class="btn btn-primary pull-right" id="editar" onclick="editar()">Editar</button>
		<button class="btn btn-danger pull-right" id="eliminar" onclick="eliminarCuenta()">Eliminar cuenta</button>
		</div>
		<div class="form-group col-sm-12">
			
		</div>
	<?php }?>
</div>
</div>
</section>
</section>
<?php
include('../template/footer.php');
?>