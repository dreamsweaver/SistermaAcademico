<?php
/*
Clase pertenece a funcionalidad
Hereda de Usuuario e implementa una interfaz
*/
require_once 'Usuarios.php';
require_once 'Login-interface.php';
require_once '../cgi-bin/Conexion.php';

class Profesor extends Usuario implements Login {
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
	
//Metodo para iniciar sesión desde super admin, se inician las sesiones y se crean cookies
	public function iniciarSesion($email,$password,$tiempo) {
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
			return true;
		} else {
			throw new Exception('No se ha encontrado al usuario o no son correctos los datos ingresados'); 
		}
	}// Fin del metodo
	
//Metodo para cerrar sesion de super admin, se cierran las sesiones y se setean a nada las cookies
	public function cerrarSesion() {
		if(session_destroy()) {
			setcookie('nombreProfesor','',0);
			setcookie('idProfesor','',0);
			return true;
		} else {
			throw new Exception('No se ha podido cerrar la sesion, vuelva a intentarlo');
		}
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