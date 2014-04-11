<?php
/*
==== Pertenece a la Capa de funcionalidad ===
Clase creada para capturar los errores del sistema y mostrarlos con un formato adecuado.
*/

class Error {
	private $_error;
	private $_mensaje;
	private $_fichero;
	private $_linea;
	
	public function __contruct($error,$mensaje,$fichero,$linea){
		$this->_error = $error;
		$this->_mensaje = $mensaje;
		$this->_fichero = $fichero;
		$this->_linea = $linea;
		set_error_handler("errores");
	}

//la variabler 'error' es el código que devuelve el objeto Exception, 'Mensaje' es el mensaje que devuelve el throw Exception, 'clase' es la clase CSS que llevará para darle formato
	public function errores($error,$mensaje,$linea,$archivo,$clase='') {
		return "
		<div class='$clase'>
			<h2>ERROR</h2>
			<p>Sentimos comunicarle que se ha producido un error de tipo de error: $error<br />
			Servidor dice: $mensaje<br>
			Linea: $linea<br>
			Archivo: $archivo</p>
		</div>";
	}
	
//Crea el mensaje de log para enviarlo a la funcion que almacenará en la base de datos
	public function guardarLogError($error,$mensaje,$fichero,$linea,$fecha){
		return "Error generado en: $fichero, error: $error, en la linea: $linea, mensaje del servidor: $mensaje";
	}
	
	public function __tostring(){
		return 'Manejo de errores de este sistema';
	}
}