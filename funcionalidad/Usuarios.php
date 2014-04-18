<?php
/*
Pertenece a la capa de funcionalidad, será una clase abstracta
*/
class Usuario {
	private $_nombre;
	private $_apellido;
	private $_email;
	private $_id;
	
	public function __construct($nombre,$apellido,$email,$id) {
		$this->_nombre = $nombre;
		$this->_apellido = $apellido;
		$this->_email = $email;
		$this->_id = $id;
	}
	
	public function getNombre() {
		return $this->_nombre;
	}
	
	public function getApellido() {
		return $this->_apellido;
	}
	
	public function getEmail() {
		return $this->_email;
	}
	
	public function getId() {
		return $this->_id;
	}
	
	public function __toString() {
		return 'Usuario '.$this->_nombre.' '.$this->_apellido;
	}
}