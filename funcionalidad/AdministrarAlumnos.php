<?php
require_once '../cgi-bin/Conexion.php';
class AdministrarAlumnos{
	private $_idAlumno;
	private $_grado;
	private $_seccion;
	private $_curso;
	private $_con;
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();
	}
	
	public function verAlumno($idAlumno,$grado,$seccion,$curso){
		$sel = $this->_con->consulta("select alu.carnet_alumno as id_alumno, carnet_alumno, visibilidad_alumno, id_perfil, nombre_perfil, apellido_perfil, fecha_ingreso_perfil, nie_perfil, direccion_perfil, zona_perfil, telefonos_perfil, fecha_nacimineto_perfil, edad_perfil, partida_nacimineto_perfil, folio_partida_perfil, tomo_partida_perfil, libro_partida_perfil, nombre_institucion_perfil, anio_estudio_perfil, telefonos_institucion_perfil, institucoines_anteriores_perfil, carnet_perfil from alumno as alu inner join perfil_alumno as per on per.carnet_perfil = alu.carnet_alumno where alu.carnet_alumno = '".$idAlumno."'","Error al seleccionar al alumno");
		return ($sel)?$this->_con->valores($sel):false;
	}
	
	public function verAlumnosSeccion($seccion,$grado,$curso){
		$sel = $this->_con->consulta("SELECT * FROM alumno LEFT JOIN perfil_alumno ON alumno.carnet_alumno = perfil_alumno.carnet_perfil LEFT JOIN cursos ON perfil_alumno.carnet_perfil = cursos.carnet_curso WHERE cursos.grado_curso = '".$grado."' AND cursos.seccion_curso = '".$seccion."' AND cursos.anio_curso = '".$curso."'","Error al seleccionar la lista de alumnos");
		$resultado = array();
		while($row = $this->_con->valores($sel)){
			$resultado[] = $row;
		}
		return $resultado;
	}
	
	public function verAlumnosGrado($grado,$curso){
		$sel = $this->_con->consulta("SELECT * FROM alumno LEFT JOIN perfil_alumno ON alumno.carnet_alumno = perfil_alumno.carnet_perfil LEFT JOIN cursos ON perfil_alumno.carnet_perfil = cursos.carnet_curso WHERE cursos.grado_curso = '".$grado."' AND cursos.anio_curso = '".$curso."'","Error al seleccionar la lista de alumnos");
		$resultado = array();
		while($row = $this->_con->valores($sel)){
			$resultado[] = $row;
		}
		return $resultado;
	}
}