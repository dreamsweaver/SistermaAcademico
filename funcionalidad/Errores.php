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
	public function errores($error,$mensaje,$clase,$fichero,$linea,$opciones = array('Cancelar','derecha cancelar','','Aceptar','derecha acptar','')) {
		$boton1    = $opciones[0];
		$clasebtn1 = $opciones[1];
		$urlbtn1   = $opciones[2];
		$boton2    = $opciones[3];
		$clasebtn2 = $opciones[4];
		$urlbtn2   = $opciones[5];
		
		self::guardarLogError($error,$mensaje,$fichero,$linea);
		self::errorATxt($error,$mensaje,$fichero,$linea);
		return "
		<div class='".$clase."'>
            <span class='cerrar-ventana derecha'><img src='/template/imagenes/boton-cerrar-mensajes.png' alt='X' /></span>
            <h2>Error</h2>
            <div class='contenido-mensaje'>
            	<p>".$mensaje."</p>
            </div>
			<a href='".$urlbtn1."' class='boton ".$clasebtn1."'>".$boton1."</a> <a href='".$urlbtn2."' class='boton ".$clasebtn2."'>".$boton2."</a>
		</div>";
	}
	
//Crea el mensaje de log para enviarlo a la funcion que almacenará en la base de datos
	public function guardarLogError($error,$mensaje,$fichero,$linea){
		$fecha = date("d/m/Y h:i:s A");
		$data = "Error generado en: ".$fichero.", error: ".$error.", en la linea: ".$linea.", mensaje del servidor: ".$mensaje.". Generado el: ".$fecha;	
		$this->_con->conectar();
		$this->_con->consulta("insert into errores(datos_error) values('".$data."')",NULL);
	}

//Crea un log de errores en un archivo txt
	public function errorATxt($error,$mensaje,$fichero,$linea){
		$archivo = "errores-sistema.txt";
		$fecha = date("d/m/Y h:i:s A");
		if($open = fopen($archivo,"a")){
			$data = "Error generado en: ".$fichero.", error: ".$error.", en la linea: ".$linea.", mensaje del servidor: ".$mensaje.". Generado el: ".$fecha;
			
			fwrite($open,$data);
			fclose($open);
		}
	}
	
	public function __tostring(){
		return 'Manejo de errores de este sistema';
	}
}