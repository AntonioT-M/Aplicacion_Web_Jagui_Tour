<?php
require_once 'Conexion.php';

class Clientes{
	private $idCliente;
	private $urlAvatarC;
	private $nombreC;
	private $apellidosC;
	private $edadC;
	private $tipoTelefono;
	private $numTelefono;
	private $emailC;
	private $passCliente;
	private $numTarjeta;
	private $passPort;
	private $privilegios;

	const TABLA = 'clientes';

	public function __construct($idCliente = null, $urlAvatarC = null, $nombreC = null, $apellidosC = null, $edadC = null, $tipoTelefono = null, $numTelefono = null, $emailC = null, $passCliente = null, $numTarjeta = null, $passPort = null, $privilegios = null){
		$this->idCliente = $idCliente;
		$this->urlAvatarC = $urlAvatarC;
		$this->nombreC = $nombreC;
		$this->apellidosC = $apellidosC;
		$this->edadC = $edadC;
		$this->tipoTelefono = $tipoTelefono;
		$this->numTelefono = $numTelefono;
		$this->emailC = $emailC;
		$this->passCliente = $passCliente;
		$this->numTarjeta = $numTarjeta;
		$this->passPort = $passPort;
		$this->privilegios = $privilegios;
	}

	public function getIdCliente(){
		return $this->idCliente;
	}

	public function getUrlAvatarC(){
		return $this->urlAvatarC;
	}

	public function getNombreC(){
		return $this->nombreC;
	}

	public function getApellidosC(){
		return $this->apellidosC;
	}

	public function getEdadC(){
		return $this->edadC;
	}

	public function getTipoTelefono(){
		return $this->tipoTelefono;
	}

	public function getNumTelefono(){
		return $this->numTelefono;
	}

	public function getEmailC(){
		return $this->emailC;
	}

	public function getPassCliente(){
		return $this->passCliente;
	}

	public function getNumTarjeta(){
		return $this->numTarjeta;
	}

	public function getPassPort(){
		return $this->passPort;
	}

	public function getPrivilegios(){
		return $this->privilegios;
	}

	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}

	public function setUrlAvatarC($urlAvatarC){
		$this->urlAvatarC = $urlAvatarC;
	}

	public function setNombreC($nombreC){
		$this->nombreC = $nombreC;
	}

	public function setApellidosC(){
		$this->apellidosC = $apellidosC;
	}

	public function setEdadC($edadC){
		$this->edadC = $edadC;
	}

	public function setTipoTelefono($tipoTelefono){
		$this->tipoTelefono = $tipoTelefono;
	}

	public function setNumTelefono($numTelefono){
		$this->numTelefono = $numTelefono;
	}

	public function setEmailC($emailC){
		$this->emailC = $emailC;
	}

	public function setPassCliente($passCliente){
		$this->passCliente = $passCliente;
	}

	public function setNumTarjeta($numTarjeta){
		$this->numTarjeta = $numTarjeta;
	}

	public function setPassPort($passPort){
		$this->passPort = $passPort;
	}

	public function setPrivilegios($privilegios){
		$this->privilegios = $privilegios;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idCliente){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET urlAvatarC = :urlAvatarC, nombreC = :nombreC, apellidosC = :apellidosC, edadC = :edadC, tipoTelefono = :tipoTelefono, numTelefono = :numTelefono, emailC = :emailC, passCliente = :passCliente, numTarjeta = :numTarjeta, passPort = :passPort, privilegios = :privilegios WHERE idCliente = :idCliente');
			$query->bindParam(':idCliente', $this->idCliente);
			$query->bindParam(':urlAvatarC', $this->urlAvatarC);
			$query->bindParam(':nombreC', $this->nombreC);
			$query->bindParam(':apellidosC', $this->apellidosC);
			$query->bindParam(':edadC', $this->edadC);
			$query->bindParam(':tipoTelefono', $this->tipoTelefono);
			$query->bindParam(':numTelefono', $this->numTelefono);
			$query->bindParam(':emailC', $this->emailC);
			$query->bindParam(':passCliente', $this->passCliente);
			$query->bindParam(':numTarjeta', $this->numTarjeta);
			$query->bindParam(':passPort', $this->passPort);
			$query->bindParam(':privilegios', $this->privilegios);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (urlAvatarC, nombreC, apellidosC, edadC, tipoTelefono, numTelefono, emailC, passCliente, numTarjeta, passPort, privilegios) VALUES (:urlAvatarC, :nombreC, :apellidosC, :edadC, :tipoTelefono, :numTelefono, :emailC, :passCliente, :numTarjeta, :passPort, :privilegios)');
			$query->bindParam(':urlAvatarC', $this->urlAvatarC);
			$query->bindParam(':nombreC', $this->nombreC);
			$query->bindParam(':apellidosC', $this->apellidosC);
			$query->bindParam(':edadC', $this->edadC);
			$query->bindParam(':tipoTelefono', $this->tipoTelefono);
			$query->bindParam(':numTelefono', $this->numTelefono);
			$query->bindParam(':emailC', $this->emailC);
			$query->bindParam(':passCliente', $this->passCliente);
			$query->bindParam(':numTarjeta', $this->numTarjeta);
			$query->bindParam(':passPort', $this->passPort);
			$query->bindParam(':privilegios', $this->privilegios);
			$query->execute();
			$this->idCliente = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idCliente = :idCliente');
		$query->bindParam(':idCliente', $this->idCliente);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idCliente){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT urlAvatarC, nombreC, apellidosC, edadC, tipoTelefono, numTelefono, emailC, passCliente, numTarjeta, passPort, privilegios FROM '.self::TABLA.' WHERE idCliente = :idCliente');
		$query->bindParam(':idCliente', $idCliente);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idCliente, $row['urlAvatarC'], $row['nombreC'], $row['apellidosC'], $row['edadC'], $row['tipoTelefono'], $row['numTelefono'], $row['emailC'], $row['passCliente'], $row['numTarjeta'], $row['passPort'], $row['privilegios']);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idCliente, urlAvatarC, nombreC, apellidosC, edadC, tipoTelefono, numTelefono, emailC, passCliente, numTarjeta, passPort, privilegios FROM ".self::TABLA." WHERE nombreC LIKE '%".$q."%' OR apellidosC LIKE '%".$q."%' OR emailC LIKE '%".$q."%'");
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
		$query = $conexion->prepare('SELECT idCliente, urlAvatarC, nombreC, apellidosC, emailC, privilegios FROM '.self::TABLA.' WHERE emailC = :emailC AND passCliente = :passCliente');
		$query->bindParam(':emailC', $this->emailC);
		$query->bindParam(':passCliente', $this->passCliente);
		$query->execute();
		$row = $query->fetch();
		if($row){
			$_SESSION['id'] = $row[0];
			$_SESSION['urlAvatar'] = $row[1];
			$_SESSION['nombre'] = $row[2];
			$_SESSION['apellidos'] = $row[3];
			$_SESSION['email'] = $row[4];
			$_SESSION['privilegios'] = $row[5];
			return true;
		}else{
			return false;
		}
	}
}
?>