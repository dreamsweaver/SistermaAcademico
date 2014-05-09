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
	
	public function reporteTrimestral($trimestre,$grado,$seccion,$curso,$alumno){
		
	}
	
	public function reporteFinal($grado,$seccion,$curso){
		
	}
	
	public function reporteTrimestralIndividual($alumno,$trimestre,$curso,$grado,$seccion){
		
	}
	
	public function reporteFinalIndividual($alumno,$curso){
		
	}
	
	public function cuadroHonor($curso,$grado,$seccion,$tiempo = 0){
		
	}
}