<?php
	require_once '../class/Usuarios.php';
	include('../template/header.php');

	$idUsuario = (isset($_REQUEST['idUsuario'])) ? $_REQUEST['idUsuario'] : null;
	if($idUsuario){
		$usuario = Usuarios::buscarPorId($idUsuario);
	}else{
		$usuario = new Usuarios();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : null;
			$nombreUsuario = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$email = (isset($_POST['email'])) ? $_POST['email'] : null;
			$password = (isset($_POST['password'])) ? $_POST['password'] : null;
			$privilegios = (isset($_POST['privilegios'])) ? $_POST['privilegios'] : null;
			if($password == $usuario->getPassUser()){ //Esto mantiene la contraseña actual del usuario si decide no cambiarla.
				$encrypt = $usuario->getPassUser();
			}else{
				$password;
				$encrypt = md5($password);
			}
			if($_FILES['urlAvatar']['type'] == 'image/jpeg' || $_FILES['urlAvatar']['type'] == 'image/png' || $_FILES['urlAvatar']['type'] == 'image/jpg'){
				$rutaServidor = 'uploads';
				$nombreImg = $_FILES['urlAvatar']['name'];
				$rutaTmp = $_FILES['urlAvatar']['tmp_name'];
				$rutaDestino = $rutaServidor."/".$nombreImg;
				move_uploaded_file($rutaTmp, $rutaDestino);
			/*if($_SESSION['email'] == $usuario->getEmail()){//Si editamos la img del usuario con el cual iniciamos sección, esto actualiza el avatar que se muestra en la barra lateral izquierda
				$_SESSION['urlAvatar'] = $rutaDestino;
			}*/
			if(isset($_REQUEST['idUsuario'])){
				if($usuario->getUrlAvatarUser() != "uploads/no_image.png"){
					$usuario = unlink($usuario->getUrlAvatarUser());
				}
			}
			}else{
				$rutaDestino = $usuario->getUrlAvatarUser();
			}
			//var_dump($rutaDestino, $nombreUsuario, $apellidos, $calle, $numero, $colonia, $cp, $ciudad, $estado, $referencia, $email, $encrypt, $estatus, $privilegios);
			$usuario = new Usuarios($idUsuario, $rutaDestino, $nombreUsuario, $apellidos, $email, $encrypt, $privilegios);
			$usuario->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-xs-12 main-chart">
        	<div class="col-xs-12">
			<h1><?php if(isset($_REQUEST['idUsuario'])){ echo 'Editar Usuario';}else{ echo 'Nuevo Usuario';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($usuario->getIdUsuario()): ?>
			<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>" />
		<?php endif; ?>
		<div class="form-group">
		<label class="control-label col-md-3">Avatar</label>
            <div class="col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="max-width: 120px; max-height: 200px; line-height: 20px;"><img src="<?php echo $usuario->getUrlAvatarUser() ?>" alt="" /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
                    </div>
                <div>
                <span class="btn btn-primary">
                    <input type="file" name="urlAvatar" class="" value="<?php echo $usuario->getUrlAvatarUser() ?>" />
                </span>
                </div>
                </div>
            </div>
        </div>
		<div class="form-group col-xs-4">
		<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $usuario->getNombreUser() ?>" required/>
		</div>
		<div class="form-group col-xs-4">
			<label>Apellidos</label>
			<input type="text" name="apellidos" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" onchange="validarEspacio()" id="validar" class="form-control" placeholder="Apellidos" value="<?php echo $usuario->getApellidosUser() ?>" required/>
		</div>
		<div class="form-group col-xs-5">	
		<label> Email </label>
		<input class="form-control" type="email"  name="email" onchange="validarEspacio()" id="validar" placeholder="mail@mail.com" value="<?php echo $usuario->getEmailUser() ?>" required />
		</div>
		<div class="form-group col-xs-3">
		<label> Password </label>
		<input type="password" name="password" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn0-9 ]+" class="form-control" onchange="validarEspacio()" id="validar" placeholder="********" value="<?php echo $usuario->getPassUser() ?>" required />
		</div>
		<div class="form-group col-xs-2">
		<label> Privilegios </label>
		<input type="number" max="2" min="1" <?php //if($usuario->getPrivilegiosUser() == 1 || $_SESSION['privilegiosUser'] == 2){ echo 'readonly';}?> name="privilegios" class="form-control" value="<?php if ($usuario->getIdUsuario()) { echo $usuario->getPrivilegiosUser(); }else{ echo '2'; }?>" required/>
		</div>
		<div class="form-group col-xs-12">
		<button class="btn btn-success">Guardar</button>
		<a href="index.php"><button class="btn btn-danger">Cancelar</button></a>
		</div>
	</form>	
	<?php }?>
</div>
</div>
</section>
</section>
<?php
include('../template/footer.php');
?>