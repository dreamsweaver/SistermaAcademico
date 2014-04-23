<?php
/*
==== Pertenece a la Capa de funcionalidad ===
Clase creada para capturar los errores del sistema y mostrarlos con un formato adecuado.
*/
require_once '../cgi-bin/Conexion.php';
class Error {
	private $_error;
	private $_mensaje;
	private $_fichero;
	private $_linea;
	private $_con;
	
	public function __contruct($error,$mensaje,$fichero,$linea){
		$this->_error = $error;
		$this->_mensaje = $mensaje;
		$this->_fichero = $fichero;
		$this->_linea = $linea;
		$this->_con = new Conexion;
		set_error_handler("errores");
		date_default_timezone_set("America/El_Salvador");
	}

//la variabler 'error' es el código que devuelve el objeto Exception, 'Mensaje' es el mensaje que devuelve el throw Exception, 'clase' es la clase CSS que llevará para darle formato
	public function errores($error,$mensaje,$clase,$fichero,$linea) {
		self::guardarLogError($error,$mensaje,$fichero,$linea);
		return "
		<div class='$clase'>
			<h2>ERROR</h2>
			<p>Sentimos comunicarle que se ha producido un error de tipo de error: $error<br />
			Servidor dice: $mensaje</p>
		</div>";
	}
	
//Crea el mensaje de log para enviarlo a la funcion que almacenará en la base de datos
	public function guardarLogError($error,$mensaje,$fichero,$linea){
		$fecha = date("d/m/Y h:i:s A");
		$data = "Error generado en: $fichero, error: $error, en la linea: $linea, mensaje del servidor: $mensaje. Generado el: $fecha";
		$this->_con->conectar();
		$this->_con->consulta("insert into errores(datos_error) values('".$data."')",NULL);
	}
	
	public function __tostring(){
		return 'Manejo de errores de este sistema';
	}
}