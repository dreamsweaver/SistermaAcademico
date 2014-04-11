<?php
require_once 'Conexion.php';

class PersistenciaDatos {
	private $_sql;
	private $_resultado;
	private $_query;
	
	public function __construct($sql){
		$this->_sql = $sql;
	}
	
	public function consulta($sql, $consulta = ''){
		$conexion = new Conexion;
		$this->_query = mysqli_query($conexion->getConexion(),$sql);
		
		if(!$this->_query) {
			throw new Exception("Error al realizar la consulta $consulta");
		} else { 
			return $this->_query;
		}
	}
	
	public function cuentaSQL($resultado){
		return mysqli_num_rows($resultado);
	}
	
}

$persistencia = new PersistenciaDatos;
try {
	$var = $persistencia->consulta('select * from errores','consultar tablar errores');
	echo $persistencia->cuentaSQL($var);
} catch(Exception $ex){
	require_once 'Errores.php';
	$error = new Error();
	$mensaje = $ex->getMessage();
	$codigo = $ex->getCode();
	$fichero = $ex->getFile();
	$linea = $ex->getLine();
	$clase = 'error-grave';
	$fecha = date('d/m/Y h:i:s A');
//	$log = $error->guardarLogError($codigo,$mensaje,$fichero,$linea,$fecha);
	echo $error->errores($codigo,$mensaje,$linea,$fichero,$clase);
}