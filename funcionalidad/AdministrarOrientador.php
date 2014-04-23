<?php
require_once '../cgi-bin/Conexion.php';
class administrarOrientador{
	private $_sql;
	private $_con;
	
	public function __construct()
	{
		$this->_con = new Conexion();
	}
	
	public function agregarOrientador($grado_orientador, $profesor_orientador, $curso_orientador, $seccion_orientador)
	{
		$this->_con->conectar();
		$this->_sql ="INSERT INTO orientador( grado_orientador, profesor_orientador, curso_orientador, seccion_orientador) VALUES ( '".$grado_orientador."', '".$profesor_orientador."', '".$curso_orientador."', '".$seccion_orientador."' )";
		return ($this->_con->consulta($this->_sql, "de Profesor"))?true:false;
 
	}
}
?>