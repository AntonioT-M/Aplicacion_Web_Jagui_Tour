<?php
	require_once '../class/Usuarios.php';
	include('../template/header.php');

	$idUsuario = (isset($_SESSION['id']));
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
			if($password == $usuario->getPassUser()){
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
			$usuario = new Usuarios($idUsuario, $rutaDestino, $nombreUsuario, $apellidos, $email, $encrypt, $privilegios);
			$usuario->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_SESSION['id'])){ echo 'Mi perfil';}else{ echo '////';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($usuario->getIdUsuario()): ?>
			<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-4">
		<label class="control-label col-sm-4">Avatar</label>
            <div class="col-sm-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="max-width: 120px; max-height: 200px; line-height: 20px;"><img width="120" height="200" src="<?php echo $usuario->getUrlAvatarUser() ?>" alt="" /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
                    </div>
                <div>
                <span class="">
                    <input type="file" name="urlAvatar" class="btn btn-primary" value="<?php echo $usuario->getUrlAvatarUser() ?>" />
                </span>
                </div>
                </div>
            </div>
        </div>
		<div class="form-group col-sm-4">
		<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $usuario->getNombreUser() ?>" required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Apellidos</label>
			<input type="text" name="apellidos" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" onchange="validarEspacio()" id="validar" class="form-control" placeholder="Apellidos" value="<?php echo $usuario->getApellidosUser() ?>" required/>
		</div>
		<div class="form-group col-sm-4">	
		<label> Email </label>
		<input class="form-control" type="email"  name="email" onchange="validarEspacio()" id="validar" placeholder="mail@mail.com" value="<?php echo $usuario->getEmailUser() ?>" required />
		</div>
		<div class="form-group col-sm-4">
		<label> Password </label>
		<input type="password" name="password" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn0-9 ]+" class="form-control" onchange="validarEspacio()" id="validar" placeholder="********" value="<?php echo $usuario->getPassUser() ?>" required />
		</div>
		<div class="form-group col-sm-4 pull-right">
		<label> Privilegios </label>
		<select class="form-control" name="privilegios" required>
			<?php $privilegios = $usuario->getPrivilegiosUser()?> 
			<option value="">Selecciona</option>
			<?php if($privilegios == 1){?>
			<option value="1" <?php if($privilegios == 1){echo "selected";}?>>Super administrador</option>
			<?php } if ($privilegios != 1){?>
			<option value="2" <?php if($privilegios == 2){echo "selected";}?>>Administrador</option>
			<?php }?>
		</select>
		</div>
		<div class="form-group col-sm-12">
		<a href="index.php"><button class="btn btn-danger pull-right">Cancelar</button></a>
		<button class="btn btn-success pull-right">Guardar</button>
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