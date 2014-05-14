<?php
require_once '../cgi-bin/Conexion.php';
require_once 'SuperAdmin.php';
require_once 'Profesor.php';
class Sesiones {
	private $_con;
	private $_dir;
	private $_sec;
	private $_prof;
	private $_alu;
	private $_res;
	
	public function __construct() {
		$this->_con = new Conexion();
		date_default_timezone_set("America/El_Salvador");
		$this->_con->conectar();
	}
	
	//Metodo para iniciar sesión desde super admin, se inician las sesiones y se crean cookies
	public function iniciarSesionSA($email,$password) {
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
			$this->_dir = new SuperAdmin($row['cargo_superadmin'],$name,$row['apellido_superadmin'],$row['email_superadmin'],$id);
			return $this->_dir;
		} else {
			throw new Exception('No se ha encontrado al usuario o no son correctos los datos ingresados'); 
		}
	}// Fin del metodo
	
//Metodo para cerrar sesion de super admin, se cierran las sesiones y se setean a nada las cookies
	public function cerrarSesionSA() {
		if(session_destroy()) {
			setcookie('nombreSuper','',0);
			setcookie('idSuper','',0);
			unset($this->_dir);
			return true;
		} else {
			throw new Exception('No se ha podido cerrar la sesion, vuelva a intentarlo');
		}
	}
	
	//Metodo para iniciar sesión desde super admin, se inician las sesiones y se crean cookies
	public function iniciarSesionProf($email,$password,$tiempo) {
		$this->_password = $password;
		$this->_email = $email;
		$res = $this->_con->consulta("select * from profesores where email_profesor='".$this->_email."' and password_profesor = '".$this->_password."'",'para verificar el usuario');
		if($row = $this->_con->valores($res)) {
			session_start();
			$name = $row['nombre_profesor'];
			$id = $row['id_profesor'];
			$_SESSION['profesor']['nombre'] = $name;
			$_SESSION['profesor']['id'] = $id;
			$tiempo = ($iempo == true)?setcookie('nombreProfesor',$name,60*60*24*7,'/'):setcookie('nombreProfesor',$name,60*60,'/');
			$tiempo = ($iempo == true)?setcookie('idProfesor',$id,60*60*24*7,'/'):setcookie('idProfesor',$id,60*60,'/');
			$fecha = date("d/m/Y");
			$hora = date("h:i:s A");
			$ip = $_SERVER['REMOTE_ADDR'];
			$this->_con->consulta("insert into log_profesor(fecha_logprofesor,hora_logprofesor,ip_logprofesor,id_profesor_logprofesor) values('".$fecha."','".$hora."','".$ip."','".$id."')","No se pudo guardar el registro de inicio de sesión en la base de datos");
			$this->_prof = new Profesor($row['cargo_profesor'],$row['password_profesor'],$name,$row['apellido_profesor'],$row['email_profesor'],$id);
			return $this->_prof;
		} else {
			throw new Exception('No se ha encontrado al usuario o no son correctos los datos ingresados'); 
		}
	}// Fin del metodo
	
//Metodo para cerrar sesion de super admin, se cierran las sesiones y se setean a nada las cookies
	public function cerrarSesionProf() {
		if(session_destroy()) {
			setcookie('nombreProfesor','',0);
			setcookie('idProfesor','',0);
			unset($this->_prof);
			return true;
		} else {
			throw new Exception('No se ha podido cerrar la sesion, vuelva a intentarlo');
		}
	}
}