<?php
/*
Clase pertenece a funcionalidad y hereda de Usuuario e implementa una interfaz
*/
require_once 'Usuarios.php';
require_once '../cgi-bin/Conexion.php';

class SuperAdmin extends Usuario {
	private $_password;
	private $_cargo;
	private $_nombre;
	private $_apellido;
	private $_email;
	private $_id;
	private $_con;
	
	public function __construct($cargo,$nombre,$apellido,$email,$id) {
		$this->_cargo = $cargo;
		$this->_password = $pass;
		$this->_con = new Conexion();
		date_default_timezone_set("America/El_Salvador");
		parent::__construct($nombre,$apellido,$email,$id);
		$this->_con->conectar();
	}
	
	public function getSuperadmin($id){
		$sel = $this->_con->consulta("select * from superadmin where id_superadmin = '".$id."'","Error al consultar al Administrador");
		$val = $this->_con->valores($sel);
		return ($sel)?$val:false;
	}
	
	public function getSuperadmins(){
		$sel = $this->_con->consulta("select * from superadmin","Error al consultar la lista de Administradores");
		$resultado = array();
		while($row = $this->_con->valores($sel)){
			$resultado[] = $row;
		}
		return $resultado;
	}
}