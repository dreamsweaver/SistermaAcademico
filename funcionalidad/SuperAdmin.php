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
		parent::__construct($nombre,$apellido,$email,$id);
	}
	
//Metodo para iniciar sesión desde super admin, se inician las sesiones y se crean cookies
	public function iniciarSesion($email,$password) {
		$this->_con->conectar();
		$res = $this->_con->consulta("select * from super_admin where email='".$email."' and password = '".$password."'",'para verificar el usuario');
		if($row = $this->_con->valores($res)) {
			session_start();
			$name = $row['nombre_superadmin'];
			$id = $row['id_superadmin'];
			$_SESSION['superadmin']['nombre'] = $name;
			$_SESSION['superadmin']['id'] = $id;
			setcookie('nombreSuper',$name,60*60,'/');
			setcookie('idSuper',$id,60*60,'/');
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
}