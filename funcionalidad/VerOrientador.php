<?php
/*
Esta clase pertenece a la capa de funcionalidad
Esta clase devuelve información básica de un orientadir en especifico o una lista de orientadores
*/
require_once '../cgi-bin/Conexion.php';
class VerOrientador {
	private $_grado;
	private $_seccion;
	private $_curso;
	private $_orientador;
	private $_con;
	
	public function __construct($grado,$seccion,$curso,$orientador){
		$this->_grado = $grado;
		$this->_seccion = $seccion;
		$this->_curso = $curso;
		$this->_orientador = $orientador;
		$this->_con = new Conexion;
		$this->_con->conectar();
	}
	
	public function verOrientador($grado,$seccion,$curso,$id){
		$sel = $this->_con->consulta("select * from orientador where id_orientador = '".$this->_orientador."'","Error al consultar al orientador solicitado");
		if($sel){
			return $this->_con->valores($sel);
		} else false;
	}
	
	public function verOrientadores($curso){
		$sel = $this->_con->consulta("select * from orientador where curso_orientador = '".$curso."'","Error al consultar la lista de orientadores");
		$resultados = array();
		while($row = $this->_con->valores($sel)){
			$resultados[] = $row;
		}
		return $resultados;
	}
}