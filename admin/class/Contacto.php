<?php
	require_once 'Conexion.php';

	class Contacto{

		private $idContacto;
		private $nombre;
		private $mensaje;


		const TABLA = 'contacto';

		public function __construct($idContacto = null, $nombre = null, $mensaje = null){
			$this->idContacto = $idContacto;
			$this->nombre = $nombre;
			$this->mensaje = $mensaje;
		}

		public function getIdContacto(){
			return $this->idContacto;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getMensaje(){
			return $this->mensaje;
		}

		public function setIdContact($idContacto){
			$this->idContact = $idContacto;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function setMensaje($mensaje){
			$this->mensaje = $mensaje;
		}

		public function guardar(){
			$conexion = new Conexion();
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (nombre, mensaje) VALUES (:nombre, :mensaje)');
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':mensaje', $this->mensaje);
			$query->execute();
			$this->idContacto = $conexion->lastInsertId();
			$conexion = null;
		}

		public function eliminar(){
			$conexion = new Conexion();
			$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idContacto = :idContacto');
			$query->bindParam(':idContacto', $this->idContacto);
			$query->execute();
			$conexion = null;
		}

		public static function buscarPorId($idContacto){
			$conexion = new Conexion();
			$query = $conexion->prepare('SELECT nombre, mensaje FROM '.self::TABLA.' WHERE idContacto = :idContacto');
			$query->bindParam(':idContacto', $idContacto);
			$query->execute();
			$row = $query->fetch();
			$conexion = null;
			if($row){
				return new self($idContacto, $row['nombre'], $row['mensaje']);
			}else{
				return false;
			}
		}

		public static function buscar($q){
			$conexion = new Conexion();
			$query = $conexion->prepare("SELECT idContacto, nombre, mensaje FROM ".self::TABLA." WHERE nombre LIKE '%".$q."%'");
			$query->execute();
			$rows = $query->fetchAll();
			$conexion = null;
			return $rows;
		}

		public static function recuperarTodos(){
			$conexion = new Conexion();
			$query = $conexion->prepare('SELECT idContacto, nombre, mensaje FROM '.self::TABLA);
			$query->execute();
			$rows = $query->fetchAll(); 
			$conexion = null;
			return $rows;
		}

	}
?>