<?php
require_once 'Conexion.php';

class Destinos{
	private $idDestino;
	private $urlDestino;
	private $destino;
	private $lugar;
	private $infoD;

	const TABLA = 'destinos';

	public function __construct($idDestino = null, $urlDestino = null, $destino = null, $lugar = null, $infoD = null){
		$this->idDestino = $idDestino;
		$this->urlDestino = $urlDestino;
		$this->destino = $destino;
		$this->lugar = $lugar;
		$this->infoD = $infoD;
	}

	public function getIdDestino(){
		return $this->idDestino;
	}

	public function getUrlDestino(){
		return $this->urlDestino;
	}

	public function getDestino(){
		return $this->destino;
	}

	public function getLugar(){
		return $this->lugar;
	}

	public function getInfoD(){
		return $this->infoD;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idDestino){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET urlDestino = :urlDestino, destino = :destino, lugar = :lugar, infoD = :infoD WHERE idDestino = :idDestino');
			$query->bindParam(':idDestino', $this->idDestino);
			$query->bindParam(':urlDestino', $this->urlDestino);
			$query->bindParam(':destino', $this->destino);
			$query->bindParam(':lugar', $this->lugar);
			$query->bindParam(':infoD', $this->infoD);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (urlDestino, destino, lugar, infoD) VALUES (:urlDestino, :destino, :lugar, :infoD)');
			$query->bindParam(':urlDestino', $this->urlDestino);
			$query->bindParam(':destino', $this->destino);
			$query->bindParam(':lugar', $this->lugar);
			$query->bindParam(':infoD', $this->infoD);
			$query->execute();
			$this->idDestino = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idDestino = :idDestino');
		$query->bindParam(':idDestino', $this->idDestino);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idDestino){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT urlDestino, destino, lugar, infoD FROM '.self::TABLA.' WHERE idDestino = :idDestino');
		$query->bindParam(':idDestino', $idDestino);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idDestino, $row['urlDestino'], $row['destino'], $row['lugar'], $row['infoD']);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idDestino, urlDestino, destino, lugar, infoD FROM ".self::TABLA." WHERE destino LIKE '%".$q."%' OR lugar LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public static function buscarDestino($id){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT destino FROM ".self::TABLA." WHERE idDestino = '".$id."'");
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return $row[0];
		}else{
			return false;
		}
	}

	public static function buscarLugar($destino){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT lugar FROM ".self::TABLA." WHERE destino LIKE '%".$destino."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;		
	}	

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT idDestino, urlDestino, destino, lugar, infoD FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>