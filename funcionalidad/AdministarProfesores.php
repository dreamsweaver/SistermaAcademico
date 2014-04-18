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
  
    public function __construct($nombre, $apellido, $email, $cargo)
  {
   $this->_nombreProfesor=$nombre;
   $this->_apellidoProfesor=$apellido;
   $this->_emailProfesor=$email;
   $this->_cargoProfesor=$cargo;
   $this->_con= new Conexion;
   $this->_password = new PassAleatorio();
  }
 	public function verPerfil($idProfesor)
	{
		$this->_con->conectar();
		$res= $this->_con->consulta("SELECT * FROM profesores WHERE id_profesor='".$idProfesor."'", "Ver Perfil de Profesor");
		if ($fila=$this->_con->valores($res)){
			$nombre=$fila['nombre_profesor'];
			$apellido=$fila['apellido_profesor'];
			$email=$fila['email_profesor'];
			$cargo=$fila['cargo_profesor'];
			}else{
				echo "No hay datos que mostrar!";
			}
			return $nombre." ".$apellido." ".$email." ".$cargo;
	}
	
	public function agregarProfesor($nombre, $apellido, $email, $cargo)
	{
		$this->_con->conectar();
		$pass = $this->_password->randomPass();
		$pass = md5($pass);
		$pass = sha1($pass);
		$this->_sql = "INSERT INTO profesores(nombre_profesor, apellido_profesor, email_profesor, password_profesor, cargo_profesor, visibilidad_profesor)
VALUES ('".$nombre."', '".$apellido."', '".$email."', '".$pass."', '".$cargo."', '1')";
		if (!$this->_con->consulta($this->_sql, "Agregar Profesor")){
			return false;
			//echo "Error al agregar Profesor";
 		} else {
			return true;
			//echo "Profesor Agregado";
 		}
	}
	
	public function eliminarProfesor($idProfesor)
	{
		$this->_con->conectar();
		$this->_sql = "DELETE FROM profesores WHERE id_profesor ='".$idProfesor."'";
		if (!$this->_con->consulta($this->_sql, "Eliminar Profesor"))
			{

				//return false;
     			echo "Error al Eliminar Profesor";

 			}else{
				//return true;
          		echo "Profesor Eliminado";
 			}
	}
	
	public function editarProfesor($nombre, $apellido, $pass, $cargo, $visibilidad, $idProfesor)
	{
		$this->_con->conectar();
		if($res= $this->_con->consulta("UPDATE profesores SET nombre_profesor='".$nombre."', apellido_profesor='".$apellido."', password_profesor='".$pass."', cargo_profesor='".$cargo."', visibilidad_profesor='".$visibilidad."' WHERE id_profesor='".$idProfesor."'", "aprobar publicación"))
		{
			 $this->_con->cerrarConexion();
			 return true;
		}
	}
 }

/* $obj2= new AdministrarProfesores("", "", "","");
 //echo $obj2->verPerfil(1);
 //$obj2->agregarProfesor("luis", "murillo", "gay.com", 3);
 //$obj2->eliminarProfesor(3);
 $obj2->editarProfesor("luis","molina", "huehue", 3, 1, 1);
*/