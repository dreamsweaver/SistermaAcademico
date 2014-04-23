<?php
//pertenece a la capa de funcionalidad, con esta clase administraremos lo que corresponda a la obtener informacion o guardarla en la base de datos
require_once '../cgi-bin/Conexion.php';
class AdministrarNoticias {
	private $_id;
	private $_titulo;
	private $_conenido;
	private $_tags;
	private $_hora;
	private $_fecha;
	private $_visibilidad;
	private $_publicador;
	private $_fechaHoraAprovacion;
	private $_con;
	
	public function __construct(){
		$this->_con = new Conexion();
		$this->_con->conectar();
		date_default_timezone_set("America/El_Salvador");
	}
	
	public function verNoticia($id){
		$this->_id = $id;
		$sel = $this->_con->consulta("select * from noticias where id_noticia='".$this->_id."'","Error al consultar la noticia solicitada");
		return $this->_con->valores($sel);
	}
	
	public function verNoticias(){
		$sel = $this->_con->consulta("select * from noticias","Error al consultar la lista de noticias");
		$resultados = array();
		while($row = $this->_con->valores($sel)){
			$resultados[] = $row;
		}
		
		return $resultados;
		//El objetivo de retornar un array de arrays es recorrerlo en la capa de interfaz con un foreach
	}
	
	public function agregarNoticia($titulo,$contenido,$tags,$visibilidad,$publicador){
		$fecha = date("d/m/Y");
		$hora = date("h:i:s A");
		$ins = $this->_con->consulta("insert into noticias(titulo_noticia,contenido_noticia,tags_noticia,hora_noticia,fecha_noticia,visibilidad_noticia,publicador_noticia) values('".$titulo."','".$contenido."','".$tags."','".$hora."','".$fecha."','".$visibilidad."','".$publicador."')","Error al agregar la noticia");
		$this->_con->cerrarConexion();
		return ($ins)?true:false;
	}
	
	public function eliminarNoticia($id){
		$del = $this->_con->consulta("delete from noticias where id_noticia = '".$id."'","Error al eliminar la noticia con identificador: $id");
		return ($del)?true:false;
	}
	
	public function editarNoticia($id,$titulo,$contenido,$tags,$visibilidad){
		$edit = $this->_con->consulta("","Error al editar la noticia con título ".$titulo);
		return ($edit)?true:false;
	}
	
	public function aprobarPublicacion($id){
		$fechaHora = date("d/m/Y h:i:s A");
		$res = $this->_con->consulta("update noticias set visivilidad_noticia='1', fecha_hora_aprovacion='".$fechaHora."' where id_noticia='".$id."'", "aprobar publicación");
		$this->_con->cerrarConexion();
		return ($ins)?true:false;
	}
}