<?php
require_once 'Conexion.php';

class Faq{

	private $idFaqs;
	private $nombre;
	private $pregunta;
	private $respuesta;

	const TABLA = 'faqs';

	public function __construct($nombre = null, $pregunta = null, $respuesta = null, $idFaqs = null){
		$this->nombre = $nombre;
		$this->pregunta = $pregunta;
		$this->respuesta = $respuesta;
		$this->idFaqs = $idFaqs;
	}

	public function getIdFaq(){
		return $this->idFaqs;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function getPregunta(){
		return $this->pregunta;
	}

	public function getRespuesta(){
		return $this->respuesta;
	}

	public function setIdFaqs($idFaqs){
		$this->idFaqs = $idFaqs;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setPregunta($pregunta){
		$this->pregunta = $pregunta;
	}

	public function setRespuesta($respuesta){
		$this->respuesta = $respuesta;
	}

	public function guardar(){
		$conexion = new Conexion();
		if($this->idFaqs){
			$query = $conexion->prepare('UPDATE '.self::TABLA.' SET nombre =:nombre, pregunta = :pregunta, respuesta = :respuesta WHERE idFaqs = :idFaqs');
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':idFaqs', $this->idFaqs);
			$query->bindParam(':pregunta', $this->pregunta);
			$query->bindParam(':respuesta', $this->respuesta);
			$query->execute();
		}else{
			$query = $conexion->prepare('INSERT INTO '.self::TABLA.' (nombre, pregunta, respuesta) VALUES (:nombre, :pregunta, :respuesta)');
			$query->bindParam(':nombre', $this->nombre);
			$query->bindParam(':pregunta', $this->pregunta);
			$query->bindParam(':respuesta', $this->respuesta);
			$query->execute();
			$this->idFaqs = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$query = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE idFaqs = :idFaqs');
		$query->bindParam(':idFaqs', $this->idFaqs);
		$query->execute();
		$conexion = null;
	}

	public static function buscarPorId($idFaqs){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT nombre, pregunta, respuesta FROM '.self::TABLA.' WHERE idFaqs = :idFaqs');
		$query->bindParam(':idFaqs', $idFaqs);
		$query->execute();
		$row = $query->fetch();
		$conexion = null;
		if($row){
			return new self($row['nombre'], $row['pregunta'], $row['respuesta'], $idFaqs);
		}else{
			return false;
		}
	}

	public static function buscar($q){
		$conexion = new  Conexion();
		$query = $conexion->prepare("SELECT idFaqs, nombre, pregunta, respuesta FROM ".self::TABLA." WHERE nombre LIKE '%".$q."%' OR pregunta LIKE '%".$q."%'");
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$query = $conexion->prepare('SELECT nombre, pregunta, respuesta, idFaqs FROM '.self::TABLA);
		$query->execute();
		$rows = $query->fetchAll();
		$conexion = null;
		return $rows;
	}
}
?>