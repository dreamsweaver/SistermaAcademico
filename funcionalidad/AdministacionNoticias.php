<?php
/* capa funcionalidad*/
require_once("../cgi-bin/Conexion.php");

class AdministracionNoticias
{
	private $_idNoticia;
	private $_con;
		
		
	public function __construct($idNoticia)	
	{	$this->_idNoticia=$idNoticia;
		$this->_con= new Conexion;
	}
		

	public function aprobarPublicacion($idNoticia)
	{
		$this->_con->conectar();
		if($res= $this->_con->consulta("UPDATE noticias SET visivilidad_noticia='1' WHERE id_noticia='".$idNoticia."'", "aprobar publicación"))
		{
			 $this->_con->cerrarConexion();
			 return true;
		}
	}
}
/*consulta de prueba
$_obje = new AdministracionNoticias(3);
if($_obje->aprobarPublicacion(3)){
	echo "Exito!";
	}else{echo "La cagaste!";}
*/