<?php
/*
==== Pertenece a la Capa de funcionalidad ===
Clase creada para dar seguridad al sistema, esta seguridad se la brinda para los datos pasados por URL e introducidos por Formulario.
Hay que tener en cuenta que la mayoría se usarán para los usuarios externos, en nuestro caso los padres y alumnos.
Por seguridad utilizaremos siempre el metodo scanGET.
*/

class Seguridad {
		
//ScanGET funcion, sirve para escapar los datos introducidos en la URL (vía Get), usar siempre, se sepa o no que se vallan a pasar datos por url, esto es para evitar ataques vía url
	public function scanGET(){
		if(!empty($_GET)) {
			$numero = count($_GET);
			$tags = array_keys($_GET);
			$valores = array_values($_GET);
			
			for($i=0;$i<$numero;$i++){
				$valores[$i] = self::antiXSS($valores[$i]);
				return $valores[$i];
			}
		}
	}
	
/* Escapa los datos para prevenir ataques de tipo XSS por medio de GET y POST */
	public function antiXSS($input){
		$value = htmlspecialchars(rawurldecode(trim($input)),ENT_QUOTES,'UTF-8');
		return $value;
	}
	
/* Escapa los datos introducidos para pasarlos por MySQL */
	public function validarInputASQL($input) {
		$value = trim($input);
		
		if(get_magic_quotes_gpc()){$value = stripslashes($input);}
			
		$value = mysql_real_escape_string($input);
		return $value;
	}
	
}