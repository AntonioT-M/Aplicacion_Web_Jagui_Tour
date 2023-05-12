<?php
require_once 'Conexion.php';

class ViajesP{
	private $destinoP;
	private $lugarP;
	private $fechaSP;
	private $fechaRP;
	private $hotelP;
	private $transporteP;
	private $adultos;
	private $infantes;
	private $nombresApVP;
	private $edadesVP;
	private $infoVP;
	private $precioT;
	private $estado;
	private $idCliente;
	private $idViajeP;

	const TABLA = 'viajep';

	public function __construct($destinoP = null, $lugarP = null,$fechaSP = null, $fechaRP = null, $hotelP = null, $transporteP = null, $adultos = null, $infantes = null, $nombresApVP = null, $edadesVP = null, $infoVP = null, $precioT = null, $estado = null, $idCliente = null, $idViajeP = null){
		$this->destinoP = $destinoP;
		$this->lugarP = $lugarP;
		$this->fechaSP = $fechaSP;
		$this->fechaRP = $fechaRP;
		$this->hotelP = $hotelP;
		$this->transporteP = $transporteP;
		$this->adultos = $adultos;
		$this->infantes = $infantes;
		$this->nombresApVP = $nombresApVP;
		$this->edadesVP = $edadesVP;
		$this->infoVP = $infoVP;
		$this->precioT = $precioT;
		$this->estado =$estado;
		$this->idCliente = $idCliente;
		$this->idViajeP = $idViajeP;		
	}

	public function getDestinoP(){
		return $this->destinoP;
	}

	public function getLugarP(){
		return $this->lugarP;
	}

	public function getFechaSP(){
		return $this->fechaSP;
	}

	public function getFechaRP(){
		return $this->fechaRP;
	}

	public function getHotelP(){
		return $this->hotelP;
	}

	public function getTransporteP(){
		return $this->transporteP;
	}

	public function getAdultos(){
		return $this->adultos;
	}

	public function getInfantes(){
		return $this->infantes;
	}

	public function getNombresApVP(){
		return $this->nombresApVP;
	}

	public function getEdadesVP(){
		return $this->edadesVP;
	}

	public function getInfoVP(){
		return $this->infoVP;
	}

	public function getPrecioT(){
		return $this->precioT;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getIdCliente(){
		return $this->idCliente;
	}

	public function getIdViajeP(){
		return $this->idViajeP;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idViajeP){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET destinoP = :destinoP, lugarP = :lugarP, fechaSP = :fechaSP, fechaRP = :fechaRP, hotelP = :hotelP, transporteP = :transporteP, adultos = :adultos, infantes = :infantes, nombresApVP = :nombresApVP, edadesVP = :edadesVP, infoVP = :infoVP, precioT = :precioT, estado = :estado, idCliente = :idCliente WHERE idViajeP = :idViajeP');
			$query->bindParam(':idViajeP', $this->idViajeP);
			$query->bindParam(':lugarP', $this->lugarP);
			$query->bindParam(':destinoP', $this->destinoP);
			$query->bindParam(':fechaSP', $this->fechaSP);
			$query->bindParam(':fechaRP', $this->fechaRP);
			$query->bindParam(':hotelP', $this->hotelP);
			$query->bindParam(':transporteP', $this->transporteP);
			$query->bindParam(':adultos', $this->adultos);
			$query->bindParam(':infantes', $this->infantes);
			$query->bindParam(':nombresApVP', $this->nombresApVP);
			$query->bindParam(':edadesVP', $this->edadesVP);
			$query->bindParam(':infoVP', $this->infoVP);
			$query->bindParam(':precioT', $this->precioT);
			$query->bindParam(':estado', $this->estado);
			$query->bindParam(':idCliente', $this->idCliente);
			//var_dump($this->idViajeP, $this->destinoP, $this->fechaSP, $this->fechaRP, $this->hotelP, $this->transporteP, $this->adultos, $this->infantes, $this->nombresApVP, $this->edadesVP, $this->infoVP, $this->precioT, $this->estado, $this->idCliente);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (destinoP, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, idCliente) VALUES (:destinoP, :lugarP, :fechaSP, :fechaRP, :hotelP, :transporteP, :adultos, :infantes, :nombresApVP, :edadesVP, :infoVP, :precioT, :estado, :idCliente)');
			$query->bindParam(':destinoP', $this->destinoP);
			$query->bindParam(':lugarP', $this->lugarP);
			$query->bindParam(':fechaSP', $this->fechaSP);
			$query->bindParam(':fechaRP', $this->fechaRP);
			$query->bindParam(':hotelP', $this->hotelP);
			$query->bindParam(':transporteP', $this->transporteP);
			$query->bindParam(':adultos', $this->adultos);
			$query->bindParam(':infantes', $this->infantes);
			$query->bindParam(':nombresApVP', $this->nombresApVP);
			$query->bindParam(':edadesVP', $this->edadesVP);
			$query->bindParam(':infoVP', $this->infoVP);
			$query->bindParam(':precioT', $this->precioT);
			$query->bindParam(':estado', $this->estado);
			$query->bindParam(':idCliente', $this->idCliente);
			//var_dump($this->idViajeP, $this->destinoP, $this->fechaSP, $this->fechaRP, $this->hotelP, $this->transporteP, $this->adultos, $this->infantes, $this->nombresApVP, $this->edadesVP, $this->infoVP, $this->precioT, $this->estado, $this->idCliente);
			$query->execute();
			$this->idViajeP = $conexion->lastInsertId();			
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idViajeP = :idViajeP');
		$query->bindParam(':idViajeP', $this->idViajeP);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idViajeP){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT destinoP, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, idCliente, idViajeP FROM '.self::TABLA.' WHERE idViajeP = :idViajeP');
		$query->bindParam(':idViajeP', $idViajeP);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($row['destinoP'], $row['lugarP'], $row['fechaSP'], $row['fechaRP'], $row['hotelP'], $row['transporteP'], $row['adultos'], $row['infantes'], $row['nombresApVP'], $row['edadesVP'], $row['infoVP'], $row['precioT'], $row['estado'], $row['idCliente'], $idViajeP);
		}else{
			return false;
		}
	}

	public static function buscar($q, $s, $r){
		$conexion = new Conexion();
		if($q != null && $s != null && $r != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE destino LIKE '%".$q."%' AND fechaSP >= '".$s."' AND fechaRP <= '".$r."' OR nombreC LIKE '%".$q."%' AND fechaSP >= '".$s."' AND fechaRP <= '".$r."' OR apellidosC LIKE '%".$q."%' AND fechaSP >= '".$s."' AND fechaRP <= '".$r."' OR lugarP LIKE '%".$q."%' AND fechaSP >= '".$s."' AND fechaRP <= '".$r."' OR estado LIKE '%".$q."%' AND fechaSP >= '".$s."' AND fechaRP <= '".$r."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;
		}else if($q != null && $s != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE destino LIKE '%".$q."%' AND fechaSP >= '".$s."' OR nombreC LIKE '%".$q."%' AND fechaSP >= '".$s."' OR apellidosC LIKE '%".$q."%' AND fechaSP >= '".$s."' OR lugarP LIKE '%".$q."%' AND fechaSP >= '".$s."' OR estado LIKE '%".$q."%' AND fechaSP >= '".$s."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}else if($q != null && $r != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE destino LIKE '%".$q."%' AND fechaRP <= '".$r."' OR nombreC LIKE '%".$q."%' AND fechaRP <= '".$r."' OR apellidosC LIKE '%".$q."%' AND fechaRP <= '".$r."' OR lugarP LIKE '%".$q."%' AND fechaRP <= '".$r."' OR estado LIKE '%".$q."%' AND fechaRP <= '".$r."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}else if($s != null && $r != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE fechaSP >= '".$s."' AND fechaRP <= '".$r."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}else if($s != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE fechaSP >= '".$s."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}else if($r != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE fechaRP <= '".$r."'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}else if($q != null){
			$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente WHERE destino LIKE '%".$q."%' OR nombreC LIKE '%".$q."%' OR apellidosC LIKE '%".$q."%' OR lugarP LIKE '%".$q."%' OR estado LIKE '%".$q."%'");
			$query->execute();
			$rows = $query->fetchAll();
			return $rows;			
		}
		$conexion = null;
	}

	public static function buscarLugar($id){
		$conexion = new Conexion();
		$query = $conexion->prepare("SELECT lugarP FROM ".self::TABLA." WHERE idViajeP = '".$id."'");
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
		$query = $conexion->prepare("SELECT hotelP FROM ".self::TABLA." WHERE idViajeP = '".$id."'");
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
		$query = $conexion->prepare("SELECT idViajeP, destino, lugarP, fechaSP, fechaRP, hotelP, transporteP, adultos, infantes, nombresApVP, edadesVP, infoVP, precioT, estado, nombreC, apellidosC, emailC FROM ".self::TABLA." JOIN destinos ON viajep.destinoP = destinos.idDestino JOIN clientes ON viajep.idCliente = clientes.idCliente");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>