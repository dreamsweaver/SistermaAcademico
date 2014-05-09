<?php
/*pertenece a la capa de funcionalidad
Con esta clase administraremos lo que corresponda a la obtencion de informacion o guardarla en la base de datos para los mensajes entre usuarios
*/
require_once '../cgi-bin/Conexion.php';

class Mensajeria {
	private $_id;
	private $_de;
	private $_para;
	private $_contenido;
	private $_fecha;
	private $_visto;
	private $_hora;
	private $_relacion;
	private $_idCliente;
	private $_con;
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_con->conectar();
		date_default_timezone_set("America/El_Salvador");
	}
	
	public function verMensaje($id) {
		$this->_id = $id;
		$sel = $this->_con->consulta("select * from mensajeria where id_mensaje = '".$this->_id."'","Error al ver el mensaje con identificador: $id");
		if($sel){
			self::cambioEstado($this->_id);
			return $this->_con->valores($sel);
		} else return false;
	}
	
	public function verEnviados($idCLiente){
		$this->_idCliente = $idCliente;
		$sel = $this->_con->consulta("select * from mensajeria where de_mensaje = '".$this->_idCliente."'","Error al consultar la lista de mensajes enviados");
		$resultados = array();
		while($row = $this->_con->valores($sel)){
			$resultados[] = $row;
		}
		
		return $resultados;
	}
	
	public function verRecibidos($idCliente){
		$this->_idCliente = $idCliente;
		$sel = $this->_con->consulta("select * from mensajeria where para_mensaje = '".$this->_idCliente."'","Error al consultar la lista de mensajes recibidos");
		$resultados = array();
		while($row = $this->_con->valores($sel)){
			$resultados[] = $row;
		}
		
		return $resultados;
	}
	
	public function eliminarMensaje($id){
		$this->_id = $id;
		$del = $this->_con->consulta("delete from mensajeria where id_mensaje = '".$this->_id."'","Error al intentar eliminar el mensaje con identificador: $id");
		return ($del)?true:false;
	}
	
	public function enviarMensaje($de,$para,$motivo,$contenido,$relacion){
		$this->_de = $de;
		$this->_para = $para;
		$this->_motivo = $motivo;
		$this->_contenido = $contenido;
		$this->_relacion = $relacion;
		$this->_fecha = date("d/m/Y");
		$this->_hora = date("h:i:s A");
		$ins = $this->_con->consulta("insert into mensajeria(de_mensaje,para_mensaje,motivo_mensaje,contenido_mensaje,fecha_mensaje,visto_mensaje,hora_mensaje,relacion_mensaje) values('".$this->_de."','".$this->_para."','".$this->_motivo."','".$this->_contenido."','".$this->_fecha."','0','".$this->_hora."','".$this->_relacion."')","Error al enviar el mensaje para $para");
		return ($ins)?true:false;
	}
	
	public function cambioEstado($id){
		$this->_id = $id;
		$this->_con->consulta("update mesajeria set visto_mensaje='1' where id_mensaje='".$this->_id."'",NULL);
	}
}