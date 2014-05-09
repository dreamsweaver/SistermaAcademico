<?php
/*
Pertenece a la capa de funcionalidad
Esta clase obtine la informacion básica de las tablas que alimentan a otras tablas con información de soporte.
Pero es de observar que obtiene información generalizada, no especifica. Si se necesita saber información de un tipo de usuario la cclase de ese tipo tendrá que brindar dicha información.
Por el me¿omento se brinda información institucional:
- secion
- grado
- cargo
- curso
- rol
*/
require_once '../cgi-bin/Conexion.php';
class ConsultasGenerales {
	private $_con;
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();
	}
	
	public function getSeccion($id){
		$sel = $this->_con->consulta("select * from secciones where id_seccion = '".$id."'","Error al consultar la seción");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function getGrado($id){
		$sel = $this->_con->consulta("select * from grados where id_grado = '".$id."'","Error al consultar el grado");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function getCargo($id){
		$sel = $this->_con->consulta("select * from cargos where id_cargo = '".$id."'","Error al consultar el cargo");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function getCurso($id){
		$sel = $this->_con->consulta("select * from aniocursos where id_aniocurso = '".$id."'","Error al consultar el curso");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function getRol($id){
		$sel = $this->_con->consulta("select * from roles where id_rol = '".$id."'","Error al consultar el rol");
		return ($sel)?$this->_con->valores($sel):false;
	}
}