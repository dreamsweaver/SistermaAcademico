<?php
/*
Clase pertenece a funcionalidad y hereda de Usuuario e implementa una interfaz
*/
require_once 'Usuarios.php';
require_once 'Login-interface.php';
require_once '../cgi-bin/Conexion.php';

class SuperAdmin extends Usuario implements Login {
	private $_password;
	private $_cargo;
	private $_nombre;
	private $_apellido;
	private $_email;
	private $_id;
	private $_con;
	
	public function __construct($cargo,$pass) {
		$this->_cargo = $cargo;
		$this->_password = $pass;
		$this->_con = new Conexion();
		date_default_timezone_set("America/El_Salvador");
		parent::__construct($nombre,$apellido,$email,$id);
		$this->_con->conectar();
	}
	
//Metodo para iniciar sesión desde super admin, se inician las sesiones y se crean cookies
	public function iniciarSesion($email,$password) {
		$this->_password = $password;
		$this->_email = $email;
		$res = $this->_con->consulta("select * from superadmin where email_puseradmin='".$this->_email."' and password_puseradmin = '".$this->_password."'",'Error al verificar el usuario en la base de datos');
		if($row = $this->_con->valores($res)) {
			session_start();
			$name = $row['nombre_superadmin'];
			$id = $row['id_superadmin'];
			$_SESSION['superadmin']['nombre'] = $name;
			$_SESSION['superadmin']['id'] = $id;
			setcookie('nombreSuper',$name,60*60,'/');
			setcookie('idSuper',$id,60*60,'/');
			$fecha = date("d/m/Y");
			$hora = date("h:i:s A");
			$ip = $_SERVER['REMOTE_ADDR'];
			$this->_con->consulta("insert into log_superadmin(fecha_logsuperadmin,hora_logsuperadmin,ip_logsuperadmin,id_director_logsuperadmin) values('".$fecha."','".$hora."','".$ip."','".$id."')","No se pudo guardar el registro de inicio de sesión en la base de datos");
			return true;
		} else {
			throw new Exception('No se ha encontrado al usuario o no son correctos los datos ingresados'); 
		}
	}// Fin del metodo
	
//Metodo para cerrar sesion de super admin, se cierran las sesiones y se setean a nada las cookies
	public function cerrarSesion() {
		if(session_destroy()) {
			setcookie('nombreSuper','',0);
			setcookie('idSuper','',0);
			return true;
		} else {
			throw new Exception('No se ha podido cerrar la sesion, vuelva a intentarlo');
		}
	}
	
	public function getSuperadmin($id){
		$sel = $this->_con->consulta("select * from superadmin where id_superadmin = '".$id."'","Error al consultar al Administrador");
		return ($sel)?$sel:false;
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