<?php
require_once 'Conexion.php';
require_once 'PassAleatorio.php';

class AdministracionSecretaria {
	private $_idSecretaria;
	private $_nombreSecretaria;
	private $_apellidoSecretaria;
	private $_cargoSecretaria;
	private $_emailSecretaria;
	private $_rolSecretaria;
	private $_password;
	private $_con;
	private $_sql;
	
	
	public function __construct()
	{
		$this->_con = new Conexion();
		$this->_password = new PassAleatorio();
	}
	
	public function agregarSecretaria($nombreSecretaria, $apellidoSecretaria, $emailSecretaria, $cargoSecretaria)
	{
		$this->_con->conectar();
		$pass = $this->_password->randomPass();
		$pass = md5($pass);
		$pass = sha1($pass);
		$this->_sql = "INSERT INTO secretaria(nombre_secretaria, apellido_secretaria, email_secretaria, password_secretaria, cargo_secretaria, visibilidad_secretaria)
VALUES ('".$nombreSecretaria."', '".$apellidoSecretaria."', '".$emailSecretaria."', '".$pass."', '".$cargoSecretaria."', '1')"	;
		if (!$this->_con->consulta($this->_sql, "de Secretaria")){
			return false;
   			//echo "Error al Grabar la Secretaria";
		}else{
			return true;
       		//echo "Secretaria Agregada";
		}
	}
	
	public function eliminarSecretaria($id)
	{
		$this->_con->conectar();
		$this->_sql = "DELETE FROM secretaria WHERE id_secretaria ='".$id."'";
		if (!$this->_con->consulta($this->_sql, "de Secretaria")) {
			return false;
     		//echo "Error al Eliminar a la Secretaria";
		} else {
			return true;
          	//echo "Secretaria Eliminada";
 		}
	}
	
	public function editarSecretaria($id, $nombreSecretaria, $apellidoSecretaria, $emailSecretaria, $passwordSecretaria, $cargoSecretaria, $visibilidadSecretaria)
	{
		$pass = $passwordSecretaria;
		$pass = md5($pass);
		$pass = sha1($pass);
		$this->_con->conectar();
		$this->_sql = "UPDATE secretaria SET nombre_secretaria='".$nombreSecretaria."', apellido_secretaria='".$apellidoSecretaria."', email_secretaria='".$emailSecretaria."', password_secretaria='".$pass."', cargo_secretaria='".$cargoSecretaria."', visibilidad_secretaria='".$visibilidadSecretaria."' WHERE id_secretaria = '".$id."'";
		
		if (!$this->_con->consulta($this->_sql, "de Secretaria")){
			return false;
    		//echo "Error al Editar a la Secretaria";
		} else {
			return true;
        	//echo "Secretaria Editada;
 		}
	}
}

/*
	//para probar el agregar secretaria
	$secretaria = new AdministracionSecretaria();
	$secretaria->agregarSecretaria("Juanita", "Cartagena", "juana@hotmail.com", 1);

	//para eliminar Secretaria
	$secretaria = new AdministracionSecretaria();
	$secretaria->eliminarSecretaria(1);

	//para editar Secretaria
	$secretaria = new AdministracionSecretaria();
	$secretaria->editarSecretaria(1, "Laura", "Cortez", "Laura@cortez.com", "1234","2","1");
*/


?>