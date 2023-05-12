<?php
require_once 'Conexion.php';

class Usuarios{
	private $idUsuario;
	private $urlAvatarUser;
	private $nombreUser;
	private $apellidosUser;
	private $emailUser;
	private $passUser;
	private $privilegiosUser;

	const TABLA = 'usuarios';

	public function __construct($idUsuario = null, $urlAvatarUser = null, $nombreUser = null, $apellidosUser = null, $emailUser = null, $passUser = null, $privilegiosUser = null){
		$this->idUsuario = $idUsuario;
		$this->urlAvatarUser = $urlAvatarUser;
		$this->nombreUser = $nombreUser;
		$this->apellidosUser = $apellidosUser;
		$this->emailUser = $emailUser;
		$this->passUser = $passUser;
		$this->privilegiosUser = $privilegiosUser;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function geturlAvatarUser(){
		return $this->urlAvatarUser;
	}

	public function getNombreUser(){
		return $this->nombreUser;
	}

	public function getApellidosUser(){
		return $this->apellidosUser;
	}

	public function getEmailUser(){
		return $this->emailUser;
	}

	public function getPassUser(){
		return $this->passUser;
	}

	public function getPrivilegiosUser(){
		return $this->privilegiosUser;
	}

	public function setEmailUser($emailUser){
		$this->emailUser = $emailUser;
	}

	public function setPassUser($passUser){
		$this->passUser = $passUser;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idUsuario){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET urlAvatarUser = :urlAvatarUser, nombreUser = :nombreUser, apellidosUser = :apellidosUser, emailUser = :emailUser, passUser = :passUser, privilegiosUser = :privilegiosUser WHERE idUsuario = :idUsuario');
			$query->bindParam(':idUsuario', $this->idUsuario);
			$query->bindParam(':urlAvatarUser', $this->urlAvatarUser);
			$query->bindParam(':nombreUser', $this->nombreUser);
			$query->bindParam(':apellidosUser', $this->apellidosUser);
			$query->bindParam(':emailUser', $this->emailUser);
			$query->bindParam(':passUser', $this->passUser);
			$query->bindParam(':privilegiosUser', $this->privilegiosUser);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (urlAvatarUser, nombreUser, apellidosUser, emailUser, passUser, privilegiosUser) VALUES (:urlAvatarUser, :nombreUser, :apellidosUser, :emailUser, :passUser, :privilegiosUser)');
			$query->bindParam(':urlAvatarUser', $this->urlAvatarUser);
			$query->bindParam(':nombreUser', $this->nombreUser);
			$query->bindParam(':apellidosUser', $this->apellidosUser);
			$query->bindParam(':emailUser', $this->emailUser);
			$query->bindParam(':passUser', $this->passUser);
			$query->bindParam(':privilegiosUser', $this->privilegiosUser);
			$query->execute();
			$this->idUsuario = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idUsuario = :idUsuario');
		$query->bindParam(':idUsuario', $this->idUsuario);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idUsuario){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT urlAvatarUser, nombreUser, apellidosUser, emailUser, passUser, privilegiosUser FROM '.self::TABLA.' WHERE idUsuario = :idUsuario');
		$query->bindParam(':idUsuario', $idUsuario);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idUsuario, $row['urlAvatarUser'], $row['nombreUser'], $row['apellidosUser'], $row['emailUser'], $row['passUser'], $row['privilegiosUser']);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idUsuario, urlAvatarUser, nombreUser, apellidosUser, emailUser, passUser, privilegiosUser FROM ".self::TABLA." WHERE nombreUser LIKE '%".$q."%' OR apellidosUser LIKE '%".$q."%' OR emailUser LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT * FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public function logIn(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT idUsuario, urlAvatarUser, nombreUser, emailUser, privilegiosUser FROM '.self::TABLA.' WHERE emailUser = :emailUser AND passUser = :passUser');
		$query->bindParam(':emailUser', $this->emailUser);
		$query->bindParam(':passUser', $this->passUser);
		$query->execute();
		$row = $query->fetch();
		if($row){
			$_SESSION['id'] = $row[0];
			$_SESSION['urlAvatar'] = $row[1];
			$_SESSION['nombre'] = $row[2];
			$_SESSION['email'] = $row[3];
			$_SESSION['privilegios'] = $row[4];
			return true;
		}else{
			return false;
		}
	}
}
?>