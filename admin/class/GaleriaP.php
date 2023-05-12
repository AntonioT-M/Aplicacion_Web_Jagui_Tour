<?php
require_once 'Conexion.php';

class GaleriaP{

	private $idImagen;
	private $nombre;
	private $descripcion;
	private $ubicacion;

	const TABLA = 'galeriap';

	public function __construct($nombre = null, $descripcion = null, $ubicacion = null, $idImagen = null ){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->ubicacion = $ubicacion;
		$this->idImagen = $idImagen;
	}

	public function getIdImagen(){
		return $this->idImagen;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getUbicacion(){
		return $this->ubicacion;
	}

	public function setIdImagen($idImagen){
		$this->idImagen = $idImagen;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idImagen){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET  nombre = :nombre, descripcion = :descripcion, ubicacion = :ubicacion WHERE idImagen = :idImagen');
			$query->bindParam(':idImagen', $this->idImagen);
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':descripcion', $this->descripcion);
			$query->bindParam(':ubicacion', $this->ubicacion);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (nombre, descripcion, ubicacion) VALUES (:nombre, :descripcion, :ubicacion)');
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':descripcion', $this->descripcion);
			$query->bindParam(':ubicacion', $this->ubicacion);
			$query->execute();
			$this->idImagen = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idImagen = :idImagen');
		$query->bindParam(':idImagen', $this->idImagen);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idImagen){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT nombre, descripcion, ubicacion FROM '.self::TABLA.' WHERE idImagen = :idImagen');
		$query->bindParam(':idImagen', $idImagen);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($row['nombre'], $row['descripcion'], $row['ubicacion'], $idImagen);
		}else{
			return false;
		}
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT nombre, descripcion, ubicacion , idImagen FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>