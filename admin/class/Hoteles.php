<?php
require_once 'Conexion.php';

class Hoteles{

	private $idHotel;
	private $urlHotel;
	private $nombreHotel;
	private $estrellas;
	private $infoH;
	private $idDestino;
	
	const TABLA = 'hoteles';

	public function __construct($idHotel = null, $urlHotel = null, $nombreHotel = null, $estrellas = null, $infoH = null, $idDestino = null){

		$this->idHotel = $idHotel;
		$this->urlHotel = $urlHotel;
		$this->nombreHotel = $nombreHotel;
		$this->estrellas = $estrellas;
		$this->infoH = $infoH;
		$this->idDestino = $idDestino;
	}

	public function getIdHotel(){
		return $this->idHotel;
	}

	public function getUrlHotel(){
		return $this->urlHotel;
	}

	public function getHotel(){
		return $this->nombreHotel;
	}

	public function getEstrellas(){
		return $this->estrellas;
	}

	public function getInfoH(){
		return $this->infoH;
	}

	public function getIdDestino(){
		return $this->idDestino;
	}

	public function setUrlHotel($urlHotel){
		$this->urlHotel = $urlHotel;
	}

	public function setHotel($nombreHotel){
		$this->nombreHotel = $nombreHotel;
	}

	public function setEstrellas($estrellas){
		$this->estrellas = $estrellas;
	}

	public function setInfoH($infoH){
		$this->infoH = $infoH;
	}

	public function setIdDestino($idDestino){
		$this->idDestino = $idDestino;
	}

	public function guardar(){
		$conexion = new Conexion;
		if($this->idHotel){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET urlHotel = :urlHotel, nombreHotel = :nombreHotel, estrellas = :estrellas, infoH = :infoH, idDestino = :idDestino WHERE idHotel = :idHotel');
			$query->bindParam(':idHotel', $this->idHotel);
			$query->bindParam(':urlHotel', $this->urlHotel);
			$query->bindParam(':nombreHotel', $this->nombreHotel);
			$query->bindParam(':estrellas', $this->estrellas);
			$query->bindParam(':infoH', $this->infoH);
			$query->bindParam(':idDestino', $this->idDestino);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (urlHotel, nombreHotel, estrellas, infoH, idDestino) VALUES (:urlHotel, :nombreHotel, :estrellas, :infoH, :idDestino)');
			$query->bindParam(':urlHotel', $this->urlHotel);
			$query->bindParam(':nombreHotel', $this->nombreHotel);
			$query->bindParam(':estrellas', $this->estrellas);
			$query->bindParam(':infoH', $this->infoH);
			$query->bindParam(':idDestino', $this->idDestino);
			$query->execute();
			$this->idHotel = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idHotel = :idHotel');
		$query->bindParam(':idHotel', $this->idHotel);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idHotel){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT urlHotel, nombreHotel, estrellas, infoH, idDestino FROM '.self::TABLA.' WHERE idHotel = :idHotel');
		$query->bindParam(':idHotel', $idHotel);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idHotel, $row['urlHotel'], $row['nombreHotel'], $row['estrellas'], $row['infoH'], $row['idDestino']);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion =new Conexion();
		$query = $conexion->prepare("SELECT idHotel, urlHotel, nombreHotel, estrellas, infoH, idDestino FROM ".self::TABLA." WHERE nombreHotel LIKE '%".$q."%' OR estrellas LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public static function buscarHotel($id){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idHotel, nombreHotel, idDestino FROM ".self::TABLA." WHERE idDestino = '".$id."'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;			
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT idHotel, urlHotel, nombreHotel, estrellas, infoH, idDestino FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

}

?>