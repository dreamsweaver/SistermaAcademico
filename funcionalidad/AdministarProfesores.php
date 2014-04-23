<?php
/* capa funcionalidad */
require_once("../cgi-bin/Conexion.php");
require_once("PassAleatorio.php");
 
class AdministrarProfesores
{
	private $_idProfesor;
	private $_nombreProfesor;
	private $_apellidoProfesor;
	private $_emailProfesor;
	private $_cargoProfesor;
	private $_con;
	private $_password;
  
    public function __construct()
  	{
		$this->_con= new Conexion;
		$this->_password = new PassAleatorio();
	}
 	
	
	public function verPerfil($idProfesor)
	{
		$this->_con->conectar();
		$res = $this->_con->consulta("SELECT * FROM profesores WHERE id_profesor='".$idProfesor."'", "Ver Perfil de Profesor");
		$fila = $this->_con->valores($res);
		($fila)?$fila:false;
	}
	
	public function listarProfesores(){
		$this->_con->conectar();
		$resultados = array();
		
		$res = $this->_con->consulta("selet * from profesores");
		while($fila = $this->_con->valores($res)){
			$resultados[] = $fila;
		}
		
		return $resultados;
	}
	
	public function agregarProfesor($nombre, $apellido, $email, $cargo)
	{
		$this->_con->conectar();
		$pass = $this->_password->randomPass();
		$pass = md5($pass);
		$pass = sha1($pass);
		$this->_sql = "INSERT INTO profesores(nombre_profesor, apellido_profesor, email_profesor, password_profesor, cargo_profesor, visibilidad_profesor)
VALUES ('".$nombre."', '".$apellido."', '".$email."', '".$pass."', '".$cargo."', '1')";
		return ($this->_con->consulta($this->_sql, "Agregar Profesor"))?true:false;
	}
	
	public function eliminarProfesor($idProfesor)
	{
		$this->_con->conectar();
		$this->_sql = "DELETE FROM profesores WHERE id_profesor ='".$idProfesor."'";
		return ($this->_con->consulta($this->_sql, "Eliminar Profesor"))? true:false;
	}
	
	public function editarProfesor($nombre, $apellido, $pass, $cargo, $visibilidad, $idProfesor)
	{
		$this->_con->conectar();
		$res = $this->_con->consulta("UPDATE profesores SET nombre_profesor='".$nombre."', apellido_profesor='".$apellido."', password_profesor='".$pass."', cargo_profesor='".$cargo."', visibilidad_profesor='".$visibilidad."' WHERE id_profesor='".$idProfesor."'", "editar al profesor ".$nombre);
		return ($res)?true:false;
	}
 }