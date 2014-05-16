<?php
require_once '../cgi-bin/Conexion.php';
class AtencionCliente{
	
private $_idAlumno;
private $_con;
private $_idProfesor;



public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();		
	}

public function verPerfilAlumno($idAlumno){
	$sel =  $this->_con->consulta("SELECT * FROM perfil_alumno WHERE id_perfil='".$idAlumno."';", "visto");
		while($row= $this->_con->valores($sel)){
				$nombre = $row['nombre_perfil'];
				$apellido = $row['apellido_perfil'];
				$fechaIngreso = $row['fecha_ingreso_perfil'];
				$nie = $row['nie_perfil'];
				$direccion = $row['direccion_perfil'];
				$zona = $row['zona_perfil'];
				$telefono = $row['telefonos_perfil'];
				$fechaNacimiento = $row['fecha_nacimineto_perfil'];
				$edad = $row['edad_perfil'];
				$anioEstudio = $row['anio_estudio_perfil'];
				$carnet =$row['carnet_perfil'];				
		}
		//concatenar datos para mostrar 
		$resultado = $nombre." ".$apellido." ".$telefono;
		return $resultado;	
	}
public function verPerfilProfesor($idProfesor){
	$sel =  $this->_con->consulta("SELECT * FROM profesores WHERE id_profesor='".$idProfesor."';","visto");
	while($row= $this->_con->valores($sel)){
				$nombre = $row['nombre_profesor'];
				$apellido = $row['apellido_profesor'];	
				$email = $row['email_profesor'];
				$cargo = $row['cargo_profesor'];
		
		}
		//concatenar datos para mostrar 
		$resultado = $nombre." ".$apellido." ".$email;
		return $resultado;		
	}		
}

/*
$_obje = new AtencionCliente();
echo $_obje->verPerfilAlumno(14);
*/

?>
