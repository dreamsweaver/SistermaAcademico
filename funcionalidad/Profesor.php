<?php
/*
Clase pertenece a funcionalidad
Hereda de Usuuario e implementa una interfaz
*/
require_once 'Usuarios.php';
require_once 'Login-interface.php';
require_once '../cgi-bin/Conexion.php';

class Profesor extends Usuario {
	private $_password;
	private $_cargo;
	private $_nombre;
	private $_apellido;
	private $_email;
	private $_id;
	private $_con;
	
	public function __construct($cargo,$pass,$nombre,$apellido,$email,$id) {
		$this->_cargo = $cargo;
		$this->_password = $pass;
		$this->_con = new Conexion();
		date_default_timezone_set("America/El_Salvador");
		parent::__construct($nombre,$apellido,$email,$id);
		$this->_con->conectar();
	}
	
	public function getProfesor($id){
		$sel = $this->_con->consulta("select * from profesores where id_profesor = '".$id."'","Error al consultar el profesor");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function getProfesores(){
		$sel = $this->_con->consulta("select * from profesores","Error al consultar la lista de Profesores");
		$resultado = array();
		while($row = $this->_con->valores($sel)){
			$resultado[] = $row;
		}
		return $resultado;
	}
}