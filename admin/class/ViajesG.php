<?php
require_once 'Conexion.php';

class viajesG{
	private $idViajeG;
	private $idDestino;
	private $lugarG;
	private $idHotel;
	private $idTransporte;
	private $nPersonasAdd;
	private $precioA;
	private $precioN;
	private $infoVG;
	private $fechaSG;
	private $fechaRG;

	const TABLA = 'viajeg';

	public function __construct($idViajeG = null, $idDestino = null, $lugarG = null, $idHotel = null, $idTransporte = null, $nPersonasAdd = null, $precioA = null, $precioN = null, $infoVG = null, $fechaSG = null, $fechaRG = null){
		$this->idViajeG = $idViajeG;
		$this->idDestino = $idDestino;
		$this->lugarG = $lugarG;
		$this->idHotel = $idHotel;
		$this->idTransporte = $idTransporte;
		$this->nPersonasAdd = $nPersonasAdd;
		$this->precioA = $precioA;
		$this->precioN = $precioN;
		$this->infoVG = $infoVG;
		$this->fechaSG = $fechaSG;
		$this->fechaRG = $fechaRG;
	}

	public function getIdViajeG(){
		return $this->idViajeG;
	}

	public function getIdDestino(){
		return $this->idDestino;
	}

	public function getLugarG(){
		return $this->lugarG;
	}

	public function getIdHotel(){
		return $this->idHotel;
	}

	public function getIdTransporte(){
		return $this->idTransporte;
	}

	public function getNPersonasAdd(){
		return $this->nPersonasAdd;
	}

	public function getPrecioA(){
		return $this->precioA;
	}

	public function getPrecioN(){
		return $this->precioN;
	}

	public function getInfoVG(){
		return $this->infoVG;
	}

	public function getFechaSG(){
		return $this->fechaSG;
	}

	public function getFechaRG(){
		return $this->fechaRG;
	}

	public function setNPersonasAdd($nPersonasAdd){
		$this->nPersonasAdd = $nPersonasAdd;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idViajeG){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET idDestino = :idDestino, lugarG = :lugarG, idHotel = :idHotel, idTransporte = :idTransporte, nPersonasAdd = :nPersonasAdd, precioA = :precioA, precioN = :precioN, infoVG = :infoVG, fechaSG = :fechaSG, fechaRG = :fechaRG WHERE idViajeG = :idViajeG');
			$query->bindParam(':idViajeG', $this->idViajeG);
			$query->bindParam(':idDestino', $this->idDestino);
			$query->bindParam(':lugarG', $this->lugarG);
			$query->bindParam(':idHotel', $this->idHotel);
			$query->bindParam(':idTransporte', $this->idTransporte);
			$query->bindParam(':nPersonasAdd', $this->nPersonasAdd);
			$query->bindParam(':precioA', $this->precioA);
			$query->bindParam(':precioN', $this->precioN);
			$query->bindParam(':infoVG', $this->infoVG);
			$query->bindParam(':fechaSG', $this->fechaSG);
			$query->bindParam(':fechaRG', $this->fechaRG);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (idDestino, lugarG, idHotel, idTransporte, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG) VALUES (:idDestino, :lugarG, :idHotel, :idTransporte, :nPersonasAdd, :precioA, :precioN, :infoVG, :fechaSG, :fechaRG)');
			$query->bindParam(':idDestino', $this->idDestino);
			$query->bindParam(':lugarG', $this->lugarG);
			$query->bindParam(':idHotel', $this->idHotel);
			$query->bindParam(':idTransporte', $this->idTransporte);
			$query->bindParam(':nPersonasAdd', $this->nPersonasAdd);
			$query->bindParam(':precioA', $this->precioA);
			$query->bindParam(':precioN', $this->precioN);
			$query->bindParam(':infoVG', $this->infoVG);
			$query->bindParam(':fechaSG', $this->fechaSG);
			$query->bindParam(':fechaRG', $this->fechaRG);
			$query->execute();
			$this->idViajeG = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idViajeG = :idViajeG');
		$query->bindParam(':idViajeG', $this->idViajeG);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idViajeG){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT idDestino, lugarG, idHotel, idTransporte, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM '.self::TABLA.' WHERE idViajeG = :idViajeG');
		$query->bindParam(':idViajeG', $idViajeG);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($idViajeG, $row['idDestino'], $row['lugarG'], $row['idHotel'], $row['idTransporte'], $row['nPersonasAdd'], $row['precioA'], $row['precioN'], $row['infoVG'], $row['fechaSG'], $row['fechaRG']);
		}else{
			return false;
		}
	}

	public static function buscar($q, $s, $r){
		$conexion = new Conexion();
		if($q != null && $s != null && $r != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE destino LIKE '%".$q."%' AND fechaSG >='".$s."' AND fechaRG <='".$r."' OR lugarG LIKE '%".$q."%' AND fechaSG >='".$s."' AND fechaRG <='".$r."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($q != null && $s != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE destino LIKE '%".$q."%' AND fechaSG >='".$s."' OR lugarG LIKE '%".$q."%' AND fechaSG >='".$s."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($q != null && $r != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE destino LIKE '%".$q."%' AND fechaRG <='".$r."' OR lugarG LIKE '%".$q."%' AND fechaRG <='".$r."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($s != null && $r != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE fechaSG  >='".$s."' AND fechaRG <='".$r."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($s != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE fechaSG >='".$s."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($r != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE fechaRG <='".$r."'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}else if($q != null){
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel WHERE destino LIKE '%".$q."%' OR lugarG LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
		}
		$conexion = null;
	}

	public static function buscarLugar($id){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT lugarG FROM ".self::TABLA." WHERE idViajeG = '".$id."'");
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
		return $row[0];
		}else{
			return false;
		}
	}	

	public static function buscarHotel($id){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idHotel FROM ".self::TABLA." WHERE idViajeG = '".$id."'");
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return $row[0];	
		}else{
			return false;
		}			
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT idViajeG, urlDestino, destino, lugarG, nombreHotel, nombreT, nPersonasAdd, precioA, precioN, infoVG, fechaSG, fechaRG FROM ".self::TABLA." JOIN destinos ON viajeG.idDestino = destinos.idDestino JOIN transportes ON viajeG.idTransporte = transportes.idTransporte JOIN hoteles ON viajeG.idHotel = hoteles.idHotel");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>