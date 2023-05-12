<?php
require_once 'Conexion.php';	

	class Comentarios{

		private $idComentario;
		private $nombre;
		private $emailComentario;
		private $mensaje;
		private $fecha;
		private $estatus;
	

		const TABLA = 'comentario';

		public function __construct($nombre= null, $emailComentario = null, $mensaje = null, $fecha = null, $estatus = null, $idComentario = null){
			$this->nombre = $nombre;
			$this->emailComentario = $emailComentario;
			$this->mensaje = $mensaje;
			$this->fecha = $fecha;
			$this->estatus = $estatus;
			$this->idComentario = $idComentario;
		}

		public function getIdComentario(){
			return $this->idComentario;
		}

		public function getNombre(){
			return $this ->nombre;
		}

		public function getEmailComentario(){
			return $this->emailComentario;
		}

		public function getMensaje(){
			return $this->mensaje;
		}

		public function getFecha(){
			return $this->fecha;
		}

		public function getEstatus(){
			return $this->estatus;
		}

		
		public function setIdComentario($idComentario){
			$this->idComentario = $idComentario;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function setEmailComentario($emailComentario){
			$this->emailComentario = $emailComentario;
		}

		public function setMensaje($mensaje)	{
			$this->mensaje = $mensaje;
		}

		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}

		public function guardar(){
			$conexion = new Conexion();
			if($this->idComentario){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET nombre = :nombre, emailComentario = :emailComentario, mensaje = :mensaje, fecha =:fecha, estatus = :estatus WHERE idComentario = :idComentario');
			$query->bindParam(':idComentario', $this->idComentario);
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':emailComentario', $this->emailComentario);
			$query->bindParam(':mensaje', $this->mensaje);
			$query->bindParam(':fecha', $this->fecha);
			$query->bindParam(':estatus', $this->estatus);
			$query->execute();
			}else{
				try{
					$query = $conexion->prepare('INSERT INTO '.self::TABLA.'  VALUES(:nombre, :emailComentario, :mensaje, :fecha, :estatus)');
					$query->bindParam(':mensaje', $this->mensaje);
					$query->bindParam(':emailComentario', $this->emailComentario);
					$query->bindParam(':nombre', $this->nombre);
					$query->bindParam(':fecha', $this->fecha);
					$query->bindParam(':estatus', $this->estatus);
					$reg=$query->execute();
					//var_dump($query);
					$this->idComentario = $conexion->lastInsertId();	
				}catch(PDOException $ex){
					$ex->getMessage();
				}				
			}
			$conexion = null;
		}

		public function eliminar(){
			$conexion = new Conexion();
			$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idComentario = :idComentario');
			$query->bindParam(':idComentario', $this->idComentario);
			$query->execute();
			$conexion = null;
		}

		public static function buscarPorId($idComentario){
			$conexion = new Conexion();
			$query = $conexion->prepare('SELECT nombre, emailComentario, mensaje, fecha, estatus FROM '.self::TABLA.' WHERE idComentario = :idComentario');
			$query->bindParam(':idComentario', $idComentario);
			$query->execute();
			$row = $query->fetch();
			$conexion = null;
			if($row){
				return new self($row['nombre'], $row['emailComentario'], $row['mensaje'], $row['fecha'], $row['estatus'], $idComentario);
			}else{
				return false;
			}
		}

		public static function buscar($q){
			$conexion = new Conexion();
			$query = $conexion->prepare("SELECT idComentario, mensaje, emailComentario, nombre, fecha, estatus FROM ".self::TABLA." WHERE nombre LIKE '%".$q."%' OR emailComentario LIKE '%".$q."%'");
			$query->execute();
			$rows = $query->fetchAll();
			$conexion = null;
			return $rows;
		}

		public static function recuperarTodos(){
			$conexion = new Conexion();
			$query = $conexion->prepare('SELECT idComentario, nombre, emailComentario, mensaje, fecha, estatus FROM '.self::TABLA);
			$query->execute();
			$rows = $query->fetchAll(); 
			$conexion = null;
			return $rows;
		}

	}
?>