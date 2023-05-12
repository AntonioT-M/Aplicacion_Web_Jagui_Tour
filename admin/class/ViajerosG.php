<?php
require_once 'Conexion.php';

class ViajerosG{
	private $adultosG;
	private $infantesG;
	private $nombresApVG;
	private $edadesVG;
	private $estadoVG;
	private $pagoTG;
	private $idCliente;
	private $idViajeG;
	private $idViajerosG;

	const TABLA = 'viajerosg';

	public function __construct($adultosG = null, $infantesG = null, $nombresApVG = null, $edadesVG = null, $estadoVG = null, $pagoTG = null, $idCliente = null, $idViajeG = null, $idViajerosG = null){
		$this->adultosG = $adultosG;
		$this->infantesG = $infantesG;
		$this->nombresApVG = $nombresApVG;
		$this->edadesVG = $edadesVG;
		$this->estadoVG = $estadoVG;
		$this->pagoTG = $pagoTG;
		$this->idCliente = $idCliente;
		$this->idViajeG = $idViajeG;
		$this->idViajerosG = $idViajerosG;		
	}

	public function getAdultosG(){
		return $this->adultosG;
	}

	public function getInfantesG(){
		return $this->infantesG;
	}

	public function getNombresApVG(){
		return $this->nombresApVG;
	}

	public function getEdadesVG(){
		return $this->edadesVG;
	}

	public function getEstadoVG(){
		return $this->estadoVG;
	}

	public function getPagoTG(){
		return $this->pagoTG;
	}

	public function getIdCliente(){
		return $this->idCliente;
	}

	public function getIdViajeG(){
		return $this->idViajeG;
	}

	public function getIdViajeros(){
		return $this->$idViajerosG;
	}

	public function setEstadoVG($estadoVG){
		$this->estadoVG = $estadoVG;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idViajerosG){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET adultosG = :adultosG, infantesG = :infantesG, nombresApVG = :nombresApVG, edadesVG = :edadesVG, estadoVG = :estadoVG, pagoTG = :pagoTG, idCliente = :idCliente, idViajeG = :idViajeG WHERE idViajerosG = :idViajerosG');
			$query->bindParam(':idViajerosG', $this->idViajerosG);
			$query->bindParam(':adultosG', $this->adultosG);
			$query->bindParam(':infantesG', $this->infantesG);
			$query->bindParam(':nombresApVG', $this->nombresApVG);
			$query->bindParam(':edadesVG', $this->edadesVG);
			$query->bindParam(':estadoVG', $this->estadoVG);
			$query->bindParam(':pagoTG', $this->pagoTG);
			$query->bindParam(':idCliente', $this->idCliente);
			$query->bindParam(':idViajeG', $this->idViajeG);
			//var_dump($this->estadoVG, $this->idViajerosG);
			var_dump($this->idViajerosG, $this->adultosG, $this->infantesG, $this->nombresApVG, $this->edadesVG, $this->estadoVG, $this->pagoTG, $this->idCliente, $this->idViajeG);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, idCliente, idViajeG) VALUES (:adultosG, :infantesG, :nombresApVG, :edadesVG, :estadoVG, :pagoTG, :idCliente, :idViajeG)');
			$query->bindParam(':adultosG', $this->adultosG);
			$query->bindParam(':infantesG', $this->infantesG);			
			$query->bindParam(':nombresApVG', $this->nombresApVG);
			$query->bindParam(':edadesVG', $this->edadesVG);
			$query->bindParam(':estadoVG', $this->estadoVG);
			$query->bindParam(':pagoTG', $this->pagoTG);
			$query->bindParam(':idCliente', $this->idCliente);
			$query->bindParam(':idViajeG', $this->idViajeG);
			//var_dump($this->adultosG, $this->infantesG, $this->nombresApVG, $this->edadesVG, $this->estadoVG, $this->pagoTG, $this->idCliente, $this->idViajeG);
			$query->execute();
			$this->idViajerosG = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idViajerosG = :idViajerosG');
		$query->bindParam(':idViajerosG', $this->idViajerosG);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idViajerosG){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, idCliente, idViajeG, idViajerosG FROM '.self::TABLA.' WHERE idViajerosG = :idViajerosG');
		$query->bindParam(':idViajerosG', $idViajerosG);
		$query->execute();
		$conexion = null;
		$row = $query->fetch();
		if($row){
			return new self($row['adultosG'], $row['infantesG'], $row['nombresApVG'], $row['edadesVG'], $row['estadoVG'], $row['pagoTG'], $row['idCliente'], $row['idViajeG'], $idViajerosG);
		}else{
			return false;
		}
	}

	public static function buscarPorIdViajeVG($idViajeG){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, idCliente, idViajeG, idViajerosG FROM ".self::TABLA." WHERE idViajeG = '".$idViajeG."'");
		$query->execute();
		$conexion = null;
		$row = $query->fetch();
		if($row){
			return new self($row['adultosG'], $row['infantesG'], $row['nombresApVG'], $row['edadesVG'], $row['estadoVG'], $row['pagoTG'], $row['idCliente'], $row['idViajeG'], $idViajeG);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, nombreC, apellidosC, emailC, lugarG, idViajerosG FROM ".self::TABLA." JOIN clientes ON viajerosg.idCliente = clientes.idCliente JOIN viajeg ON viajerosg.idViajeG = viajeg.idViajeG WHERE nombreC LIKE '%".$q."%' OR emailC LIKE '%".$q."%' OR lugarG LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
	}

	public static function buscarViajeros($idViajeG){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, clientes.idCliente, nombreC, apellidosC, edadC, emailC, numTelefono, idViajerosG, idViajeG FROM ".self::TABLA." JOIN clientes ON viajerosg.idCliente = clientes.idCliente WHERE idViajeG = '".$idViajeG."'");
		$query->execute();
		$conexion = null;
		$rows = $query->fetchAll();
		return $rows;
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT adultosG, infantesG, nombresApVG, edadesVG, estadoVG, pagoTG, nombreC, apellidosC, emailC, lugarG, idViajerosG FROM ".self::TABLA." JOIN clientes ON viajerosg.idCliente = clientes.idCliente JOIN viajeg ON viajerosg.idViajeG = viajeg.idViajeG");
		$query->execute();
		$rows = $query->fetchAll();
		return $rows;
	}	
}
?>