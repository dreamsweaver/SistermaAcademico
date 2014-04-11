<?php
/*
==== Pertenece a la Capa de acceso a datos ===
Clase que crea la conexion a la base de datos
*/

class Conexion {
	private $_usuario = 'root';
	private $_password = 'mio';
	private $_server = 'localhost';
	private $_base = 'colegio_emanuel';
	private $_con;
	
	public function conectar() {
		$this->_con = mysqli_connect($this->_server,$this->_usuario,$this->_password,$this->_base);
		if(!$this->_con) {
			throw new Exception('No se puede conectar con la base de datos');
		} else return $this->_con;
	}
	
	public function getConexion() {
		$conerxion = self::conectar();
		return $conexion;
	}
	
	public function __tostring(){
		return $this->_base." - ".$this->_password." - ".$this->_server." - ".$this->_usuario;
	}
	
	public function cerrarConexion() {
		mysqli_close(self::getConexion());
	}
	
}

//Para hacer la prueba descomentar las líenas de abajo

require_once('Errores.php');
try {
	$conexion = new Conexion;
	echo $conexion->conectar();
} catch(Exception $ex) {
	$error = new Error();
	$mensaje = $ex->getMessage();
	$codigo = $ex->getCode();
	$fichero = $ex->getFile();
	$linea = $ex->getLine();
	$clase = 'error-grave';
	$fecha = date('d/m/Y h:i:s A');
//	$log = $error->guardarLogError($codigo,$mensaje,$fichero,$linea,$fecha);
	echo $error->errores($codigo,$mensaje,$linea,$clase);
}