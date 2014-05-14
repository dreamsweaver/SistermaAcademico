<?php
require_once '../cgi-bin/Conexion.php';
$con = new Conexion;
$con->conectar();
$sel = $con->consulta("select * from generales","Error al seleccionar los datos del sistema");
if($row = $con->valores($sel)){
	$nombre = $row['nombre_institucion'];
	$logo = $row['nombre_institucion'];
	$pie = $row['nombre_institucion'];
	$slogan = $row['nombre_institucion'];
	$redes = $row['nombre_institucion'];
	$contacto = $row['nombre_institucion'];
	
	define('INSTITUCION',$nombre);
	define('LOGO',$logo);
	define('PIE',$pie);
	define('SLOGAN',$slogan);
	define('REDES',$redes);
	define('CONTACTO',$contacto);
}