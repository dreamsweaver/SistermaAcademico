<?php
require_once 'funcionalidad/GeneralesSistema.php';
class TemplateUsuario {
	
	public function head($titulo,$path = './'){
		return '<!doctype html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="0">
		<link rel="stylesheet" type="text/css" href="'.$path.'css/reset.css" />
		<link rel="stylesheet" type="text/css" href="'.$path.'css/default.css" />
		<link rel="stylesheet" type="text/css" href="'.$path.'css/imprimir.css" media="print" />
		<link type="text/css" rel="stylesheet" href="'.$path.'css/jquery.mmenu.all.css" />
		<link type="text/css" rel="stylesheet" href="'.$path.'css/animations.css" />
		<script type="text/javascript" src="'.$path.'js/jquery.js"></script>
		<script type="text/javascript" src="'.$path.'js/jquery.mmenu.min.all.js"></script>
		<script src="'.$path.'js/modernizr.custom.js"></script>
		<script src="'.$path.'js/hideShowPassword.min.js"></script>
		<script src="'.$path.'js/jquery.superLabels.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="'.$path.'js/scripts.js"></script>
		<title>'.$titulo.'</title>
		<meta name="viewport" content="width=device-width, maximum-scale=2"/>
		</head>
		<body>
		<div id="page">';
		
	}

	public function foot($path='./') {
		return '<footer>
				<div class="contenedor">
					<p>Todos los derechos reservados &copy; '.date("Y").'  | '.INSTITUCION.'</p>
					<ul class="derecha">
						'.REDES.'
					</ul>
				</div>
			</footer>
		</div>
		<nav id="menu-left">
			<ul>
				<li><span class="config">Menu principal</span></li>
				<li class="noticias"><a href="'.$path.'">Noticias <span class="burbuja">2</span></a></li>
				<li class="perfil"><a href="'.$path.'">Perfil</a></li>
				<li class="academico"><a href="'.$path.'">Record Academico</a></li>
				<li class="pagos"><a href="'.$path.'">Record de pagos</a></li>
				<li class="ayuda"><a href="'.$path.'">Ayuda</a></li>
				<li class="cerrar"><a href="'.$path.'">Cerrar Sesion</a></li>
				<li class="app"><a href="'.$path.'">Descargar App</a></li>
				<li class="accesos"><a href="'.$path.'">Registro de accesos</a></li>
				<li class="rendimiento"><a href="'.$path.'">Mi rendimiento academico</a></li>
			</ul>
		</nav>   
		</body>
		</html>';
	}
}