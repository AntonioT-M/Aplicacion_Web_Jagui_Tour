<?php
session_start();
unset($_SESSION['idCliente']);
unset($_SESSION['emailC']);
unset($_SESSION['urlAvatar']);
unset($_SESSION['nombreC']);
unset($_SESSION['privilegiosC']);
unset($_SESSION['apellidosC']);
session_destroy();
header('Location: login.php');
?>