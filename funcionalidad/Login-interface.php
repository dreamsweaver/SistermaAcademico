<?php
/*
Interfaz de la capa de funcionalidad
*/
interface Login {
	public function iniciarSesion($usuario,$pass);
	public function cerrarSesion($usario);
}