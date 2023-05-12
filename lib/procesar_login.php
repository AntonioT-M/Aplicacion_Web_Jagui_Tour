<?php
session_start();
require_once '../admin/class/Clientes.php';
require_once '../admin/class/Usuarios.php';
if($_POST){
	$email = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : null;
	$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : null;
	$encrypt = md5($password);
	$cliente = Clientes::buscar($email);
	$usuario = Usuarios::buscar($email);
	$login="";
if($cliente){
	$cliente = new Clientes();
	$cliente->setEmailC($email);
	$cliente->setPassCliente($encrypt);
	$login = $cliente->logIn();
}else if($usuario){
	$usuario = new Usuarios();
	$usuario->setEmailUser($email);
	$usuario->setPassUser($encrypt);
	$login = $usuario->logIn();
}
//print_r($login);

if($login == false){
	echo '<script>
			alert("Correo o password incorrectos");
			window.location.href="../login.php";
		</script>';
}

/*if($_SESSION['estatus'] == 2){
	echo '<script> alert("Tu cuenta ha sido suspendida por infringir nuestras politicas");
			window.location.href="../logout.php";
			</script>';
	/*session_start();
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['urlAvatar']);
	unset($_SESSION['nombre']);
	unset($_SESSION['privilegios']);
	unset($_SESSION['estatus']);
	session_destroy();
}*/

if($_SESSION['privilegios'] == 1){
	echo '<script>
			alert("Bienvenido Super administrador...");
			window.location.href="../admin/index.php";
		</script>';
}else if($_SESSION['privilegios'] == 2){
	echo '<script>
			alert("Bienvenido administrador");
			window.location.href="../usuarios/admin/index.php";
		</script>';
}else{
	echo '<script> alert("Bienvenido '.$_SESSION['nombre'].' '.$_SESSION['apellidos'].'");
			window.location.href="../cliente/index.php";
			</script>';
}

}else{
	//echo '<h1>Access Denied</h1>';
	header('Location: ../index.php');
}
?>