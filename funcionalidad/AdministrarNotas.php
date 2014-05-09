<?php
require_once '../cgi-bin/Conexion.php';
class AdministrarNotas {
/*	private $_alumno;
	private $_profesor;
	private $_materia;
	private $_seccion;
	private $_nota;
	private $_tipo;
	private $_curso;*/
	private $_con;
/*	private $_trimestre;
	private $_orientador;*/
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();
	}
	
	public function agregarNota($alumno,$profesor,$materia,$seccion,$grado,$tipo,$nota,$curso,$trimester,$tipo,$orientador){
		$ins = $this->_con->consulta("insert into record_notas(materia_record, grado_record, seccion_record, alumno_record, trimeste_record, curso_record, profesor_record, orientador_record, tipo_evaluacion_record, nota_record) values('".$materia."', '".$grado."', '".$seccion."', '".$alumno."', '".$trimester."', '".$curso."', '".$profesor."', '".$orientador."', '".$tipo."', '".$nota."')","Error al ingresar la nota del alumno");
		return ($ins)?true:false;
	}
	
	public function eliminarNota($id){
		$del = $this->_con->consulta("delete from record_notas where id_record = '".$id."'","Error eliminar las notas");
		return ($del)?true:false;
	}
	
	public function editarNota($id,$nota,$materia,$seccion,$grado,$tipo,$curso,$trimestre){
		$edit = $this->_con->consulta("update record_notas set materia_record = '".$materia."', grado_record = '".$grado."', seccion_record = '".$seccion."', trimestre_record = '".$trimestre."', curso_record = '".$curso."', tipo_evaluacion_record = '".$tipo."', nota_record = '".$nota."' where id_record = '".$id."'","Error al editar la nota");
		return ($edit)?true:false;
	}
	
	public function verNotasTrimestre($alumno,$curso,$trimestre) {
		$sel = $this->_con->consulta("select * from record_notas where alumno_record = '".$alumno."' and curso_record = '".$curso."' and trimestre_record = '".$trimestre."'","Error al leer las notas de la base de datos");
		$resultado = array();
		while($row = $this->_con->valores($sel)){
			$resultado[] = $row;
		}
		
		return $resultado;
	}
	
	private function porcentajeNota($tipo,$curso) {
		$sel = $this->_con->consulta("select * from settings_calificaciones where tipo_settings = '".$tipo."' and curso_settings = '".$curso."'",NULL);
		$row = $this->_con->valores($sel);
		return ($sel)?$row['porcentaje_settings']:false;
	}
	
	public function evaluacionesPromediadas($tipo,$curso,$materia,$alumno,$trimestre){
		$sel = $this->_con->consulta("select sum(nota_record) as suma from record_notas where tipo_evaluacion_record = '".$tipo."' and curso_record = '".$curso."' and materia_record = '".$materia."' and alumno_record = '".$alumno."' and trimestre_record = '".$trimestre."' group by tipo_evaluacion_record",NULL);
		$cant = $this->_con->cuentaSQL($sel);
		$row = $this->_con->valores($sel);
		$valor = $row['suma'];
		$porcentaje = self::porcentajeNota($tipo,$curso);
		$porcentaje = ($porcentaje > 1)?$porcentaje/100:$porcentaje;
		return ($valor/$cant) * $porcentaje;
	}
}