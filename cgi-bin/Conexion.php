<?php
/*
==== Pertenece a la Capa de acceso a datos ===
Clase que crea la conexion a la base de datos y las consultas a la base de datos
*/

class Conexion {
	private $_usuario = 'cemanuel';
	private $_password = 'cemanuel';
	private $_server = 'localhost';
	private $_base = 'colegio_emanuel';
	private $_con;
	private $_sql;
	private $_resultado;
	
	
	public function __construct(){
		$this->_con = new mysqli();
	
	}
	
//Establece la conexion con la base de datos
	public function conectar() {
		$this->_con->connect($this->_server,$this->_usuario,$this->_password,$this->_base);

		if($this->_con->connect_errno) {
			throw new Exception('No se puede conectar con la base de datos');
		}
		
		return $this->_con;
	}

//Obtiene la conexcion de ser necesario
	public function getConexion() {
		return self::conectar();
	}
	
//COnvierte en cadena de texto el objeto
	public function __tostring(){
		return $this->_base." - ".$this->_password." - ".$this->_server." - ".$this->_usuario;
	}
	
//Cierra la conesccion de la base de datos
	public function cerrarConexion() {
		$this->_con->close();
	}

//Sirve para crear las consultas de todo tipo a la base de datos
	public function consulta($sql, $errorMensaje){
		$this->_resultado = $this->_con->query($sql);
		
		if(!$this->_resultado) {
			throw new Exception("No se ha realizado la consulta $errorMensaje");
		}
		
		return $this->_resultado;
	}
	
//Devuelve el numero de filas que tiene una consulta
	public function cuentaSQL($resultado){
		$this->_resultado = $resultado;
		return $this->_resultado->num_rows;
	}
	
//Crea un array asociativo y lo devuelve para el control de los datos obtenidos en la consulta
	public function valores($resultado) {
		$this->_resultado = $resultado;
		return $this->_resultado->fetch_array(MYSQLI_ASSOC);
	}
	
//Aprovará los cambios hechos en una transaccion
	public function realizarTransaccion() {
		return $this->_con->commit();
	}
	
//Revertirá los cambios hecho en una transaccion
	public function deshacerTransaccion() {
		return $this->_con->rollback();
	}
	
}