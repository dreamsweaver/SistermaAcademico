<?php
require_once 'Conexion.php';


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
		if (!$this->_con->consulta($this->_sql, "de Profesor")){
			return false;
     		//echo "Error al Agregar al Profesor";
		} else {
			return true;
        	//echo "Profesor Editado";
 		}
	}
}

/*
	//probar para Agregar Orientador
	$profesor = new administrarOrientador();
	$profesor->agregarOrientador("3","4","2015","3");
*/

?>