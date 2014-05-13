<?php
if($_SERVER['HTTP_REFERER'] =! $_SERVER['PHP_SELF']){
	$uri = $_SERVER['HTTP_REFERER'];
} else $uri = '/';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<link rel="stylesheet" type="text/css" href="template/css/reset.css" />
<link rel="stylesheet" type="text/css" href="template/css/default.css" />
<link rel="stylesheet" type="text/css" href="template/css/imprimir.css" media="print" />
<script type="text/javascript" src="template/js/jquery.js"></script>
<script type="text/javascript" src="template/js/scripts.js"></script>
<title>Contenido no encontrado</title>
<meta name="viewport" content="width=device-width, maximum-scale=2"/>
</head>

<body>
<div id="page">
<header>
	<div id="cabeza">
    	<div id="logo">
        	<img src="template/imagenes/logo.png" />
            <h1>Colegio Cristiano Emanuel</h1>
        </div>
    </div>
</header>
	<div class="contenedor">
        <div class="panel">.
            <img src="template/imagenes/error404.png" class="izquierda no-img" />
            <img src="template/imagenes/link.png" class="derecha no-img tem" />
            <p>La página solicitada no existe o ha sido movida a otro lugar, verifique la dirección URL para saber si está bien escrita, de estar seguro de que la URL está bien escrita y el error persiste, notificar a las autoridades del colegio sobre el error.</p>
            <img src="template/imagenes/pagina-rota.jpg" class="no-img" />
            <a href="<?php echo $uri; ?>" class="boton">Regresar por donde vine</a>
        </div>
    </div>
    <footer>
    	<div class="contenedor">
        	<p>Todos los derechos reservados © 2014  | Colegio Cristiano Emanuel</p>
            <ul class="derecha">
            	<li><a href="" class="twitter" title="Ir a nuestra cuenta de Twitter">Twitter</a></li>
                <li><a href="" class="facebook" title="Ir a nuestra fan page de Facebook">Facebook</a></li>
            </ul>
        </div>
    </footer>
</div>  
</body>
</html>