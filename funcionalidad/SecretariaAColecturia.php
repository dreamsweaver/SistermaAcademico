<?php
require_once '../cgi-bin/Conexion.php';

class Colecturia {
	private $_idAlumno;
	private $_con;
	private $_curso;
		
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();		
		date_default_timezone_set("America/El_Salvador");
	}
	public function generarTalonariosElectronicos($curso, $grado){
		$sel = $this->_con->consulta("SELECT anio_curso, carnet_curso, grado_curso, seccion_curso FROM cursos WHERE anio_curso = '".$curso."' and grado_curso='".$grado."';");
		
		while($row= $this->_con->valores($sel)){
			$anio = $row['anio_curso'];
			$carnet = $row['carnet_curso'];
			$grado = $row['grado_curso'];
			$seccion = $row['seccion_curso'];
			$dia = '23';
			$mes = 0;
	
			for($i=1; $i<=12; $i++){
				$mes++;						
				$codigo = self::codigoTalonario($dia, $mes, $anio, $carnet, $grado, $seccion, $i);
				$this->_con->consulta("INSERT INTO pagos(carnet_pago, periodo_pago, estado_pago, fecha_limite_pago, codigo_pago) VALUES('".$carnet."', '".$i."', 'No pagado', '".$dia."/".$i."/".$anio."', '".$codigo."')","Error al insertar talonario a la base de datos");
			}
		}
		return $resultados;
		}
	public function codigoTalonario($dia,$mes,$anio,$carnet,$grado,$seccion,$cuota){ 
		$mes = ($mes <= 9)? '0'.$mes:$mes; 
		$cuota = ($cuota <= 9)? '0'.$cuota:$cuota;
    	$anio = substr($anio,2);
		$letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'); 
		$numeros = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','23','24','25','26');
		$codigo = str_replace($letras,$numeros,$carnet); $talonario = $dia.$mes.$anio.'-'.$codigo.'-'.$grado.$seccion.$cuota; 
		return $talonario; 
	}
	
	public function verPagos($idAlumno, $curso){
		$sel = $this->_con->consulta("SELECT * FROM pagos WHERE carnet_pago='".$idAlumno."' and fecha_limite_pago LIKE '%".$curso."%'" );
		
		$resultados = array();
		while($row = $this->_con->valores($sel)){
			$resultados[] = $row;
		}
		
		return $resultados;
		}
		
	public function aprobarPago($idAlumno, $idpago){
		$fecha = date("d/m/Y h:i:s A"); 
		$actualizar=$this->_con->consulta("UPDATE pagos SET estado_pago = 'Pagado', fecha_pagada_pago = '".$fecha."' WHERE id_pago = '".$idpago."'");
		return ($actualizar)?true:false;		
		}
		
	public function generarComprobantepago($idpago){
		$comprobante = $this->_con->consulta("SELECT * FROM pagos WHERE id_pago='".$idpago."'" );
		return($comprobante)?true:false;
		
		}

}

