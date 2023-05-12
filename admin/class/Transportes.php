<?php
require_once 'Conexion.php';

class Transportes{
	private $idTransporte;
	private $nombreT;
	private $tipoT;
	private $descripcionT;

	const TABLA = 'transportes';

	public function __construct($idTransporte = null, $nombreT = null, $tipoT = null, $descripcionT = null){
		$this->idTransporte = $idTransporte;
		$this->nombreT = $nombreT;
		$this->tipoT = $tipoT;
		$this->descripcionT = $descripcionT;
	}

	public function getIdTransporte(){
		return $this->idTransporte;
	}

	public function getNombreT(){
		return $this->nombreT;
	}

	public function getTipoT(){
		return $this->tipoT;
	}

	public function getDescripcionT(){
		return $this->descripcionT;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idTransporte){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET nombreT = :nombreT, tipoT = :tipoT, descripcionT = :descripcionT WHERE idTransporte = :idTransporte');
			$query->bindParam(':idTransporte', $this->idTransporte);
			$query->bindParam(':nombreT', $this->nombreT);
			$query->bindParam(':tipoT', $this->tipoT);
			$query->bindParam(':descripcionT', $this->descripcionT);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (nombreT, tipoT, descripcionT) VALUES (:nombreT, :tipoT, :descripcionT)');
			$query->bindParam(':nombreT', $this->nombreT);
			$query->bindParam(':tipoT', $this->tipoT);
			$query->bindParam(':descripcionT', $this->descripcionT);
			$query->execute();
			$this->idTransporte = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idTransporte = :idTransporte');
		$query->bindParam(':idTransporte', $this->idTransporte);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idTransporte){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT nombreT, tipoT, descripcionT FROM '.self::TABLA.' WHERE idTransporte = :idTransporte');
		$query->bindParam(':idTransporte', $idTransporte);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idTransporte, $row['nombreT'], $row['tipoT'], $row['descripcionT']); 
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idTransporte, nombreT, tipoT, descripcionT FROM ".self::TABLA." WHERE nombreT LIKE '%".$q."%' OR tipoT LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT idTransporte, nombreT, tipoT, descripcionT FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>