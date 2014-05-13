<?php
require_once '../cgi-bin/Conexion.php';
class Orientador {
	private $_grado;
	private $_seccion;
	private $_curso;
	private $_idProfesor;
	private $_con;
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();
	}
	
	public function reporteTrimestral($trimestre,$grado,$seccion,$curso){
		$sel = $this->_con->consulta("SELECT * FROM record_notas LEFT JOIN settings_calificaciones ON record_notas.tipo_evaluacion_record = settings_calificaciones.tipo_settings WHERE record_notas.trimestre_record = '".$trimestre."' AND record_notas.grado_record = '".$grado."' AND record_notas.seccion_record = '".$seccion."' and record_notas.curso_record = '".$curso."'","Error al seleccionar los datos de los alumnos");
		
		$datos = array();
		while($row = $this->_con->valores($sel)){
			$datos[] = $row;
		}
		
		return $datos;
	}
	
	public function reporteFinal($grado,$seccion,$curso){
		
	}
	
	public function reporteTrimestralIndividual($alumno,$trimestre,$curso,$grado,$seccion){
		$sel = $this->_con->consulta("SELECT * FROM record_notas LEFT JOIN settings_calificaciones ON record_notas.tipo_evaluacion_record = settings_calificaciones.tipo_settings WHERE record_notas.trimestre_record = '".$trimestre."' AND record_notas.grado_record = '".$grado."' AND record_notas.seccion_record = '".$seccion."' and record_notas.curso_record = '".$curso."' and record_notas.alumno_record = '".$alumno."'","Error al seleccionar los datos de los alumnos");
		
		
		return ($datos)?$this->_con->valores($sel) : false;
	}
	
	public function reporteFinalIndividual($alumno,$curso){
		
	}
	
	public function cuadroHonor($curso,$grado,$seccion,$tiempo = 0){
		
	}
}