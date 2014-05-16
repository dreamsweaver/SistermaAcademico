<?php
require_once '../funcionalidad/GeneralesSistema.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/imprimir.css" media="print" />
<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
<link type="text/css" rel="stylesheet" href="css/animations.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/hideShowPassword.min.js"></script>
<script src="js/jquery.superLabels.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script src="js/ion.sound.js"></script>
<title>Template Sistema CCE</title>
<meta name="viewport" content="width=device-width, maximum-scale=2"/>
</head>

<body>
<div id="page">
<header>
	<div id="cabeza">
    	<div id="logo">
        	<img src="imagenes/logo.png" />
            <h1><?php echo INSTITUCION; ?></h1>
            <span><?php echo SLOGAN; ?></span>
        </div>
        <div id="user" class="visible">
        	<img src="../uploads/imagenes/alumnos/alumno.jpg" width="90" height="90" />
            <ul>
            	<li>Bienvenido</li>
                <li>Juan Perez</li>
                <li><a href="?salir=<?php echo base64_encode("TRUE"); ?>" title="Salir de tu cuenta">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</header>
	<div class="contenedor">
    	<a href="#menu-left" class="btn-opciones clear"><img src="imagenes/opciones-boton.png" style="vertical-align:middle; position:relative; left:-10px; margin-right:1px;" /> Opciones</a>
        <div class="panel nuevo">
        	<h2>Asamblea General</h2>
            <p>Lorem ipsumThis is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut <a href="">imperdiet nisi</a>. Proin condimentum fermentum nunc.</p>
            <img src="../uploads/images/67041_4748682554815_2005990924_n.jpg" />
            <p>Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
            <a href="" class="boton derecha">Leer noticia completa</a>
        </div>
        
        <div class="panel">
        	<h2>Campeones de liga intercolegial</h2>
            <p>Lorem ipsumThis is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut <a href="">imperdiet nisi</a>. Proin condimentum fermentum nunc.</p>
            <p>Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
            <a href="" class="boton derecha">Leer noticia completa</a>
             <div class="alerta basealto">
                <span class="cerrar-ventana derecha"><img src="imagenes/boton-cerrar-mensajes.png" alt="X" /></span>
                <h2>Titulo de la alerta</h2>
                <div class="contenido-mensaje">
                	<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                </div>
            	<a href="" class="boton derecha cancelar">Cancelar</a> <a href="" class="boton derecha imprimir">Imprimir</a>
            </div>
        </div>
        <div class="panel">
        	<h2>Forma</h2>
            <form action="" method="post">
            	<ul>
                	<li class="izquierda"><label for="nombre">Escribe tu Nombre</label><input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" /></li>
                    <li class="izquierda"><label for="password">Escribe tu contraseña</label><input type="password" id="password" name="password" /></li>
                </ul>
                <ul>
                    <li class="izquierda">
                        <div class="login-option">
                            <input type="checkbox" name="show-password" id="show-password">
                            <label for="show-password">Ver contraseña</label>
                        </div>
                    </li>
                    <li class="izquierda">
                        <div class="login-option">
                            <input type="checkbox" id="recordarme" name="recordarme">
                            <label for="recordarme">Recordar mis datos por 1 semana</label>
                        </div>
                    </li>
                </ul>
                <input type="submit" class="boton" value="Enviar nombre" />
            </form>
        </div>
        
        <div class="panel">
        	<ul class="botones-accion derecha">
            	<li><a href="" class="btn-printer" title="Puedes imprimir este contenido">&nbsp;</a></li>
                <li><a href="" class="btn-pdf" title="Puedes crear una version PDF de este contenido"></a></li>
                <li><a href="" class="btn-subcat" title="Puedes ver los detalles de este contenido"></a></li>
            </ul>
            <table class="tabla" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<th>Titulo 1</th>
                    <th>Titulo 2</th>
                    <th>Titulo 3</th>
                    <th>Titulo 4</th>
                </tr>
                <tr>
                	<td>Este es el texto del titulo 1</td>
                    <td>Este es el texto del titulo 2</td>
                    <td>Este es el texto del titulo 3</td>
                    <td>Este es el texto del titulo 4</td>
                </tr>
                <tr>
                	<td>Este es el texto del titulo 1</td>
                    <td>Este es el texto del titulo 2</td>
                    <td>Este es el texto del titulo 3</td>
                    <td>Este es el texto del titulo 4</td>
                </tr>
                <tr>
                	<td>Este es el texto del titulo 1</td>
                    <td>Este es el texto del titulo 2</td>
                    <td>Este es el texto del titulo 3</td>
                    <td>Este es el texto del titulo 4</td>
                </tr>
                <tr>
                	<td>Este es el texto del titulo 1</td>
                    <td>Este es el texto del titulo 2</td>
                    <td>Este es el texto del titulo 3</td>
                    <td>Este es el texto del titulo 4</td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
    	<div class="contenedor">
        	<p><?php echo PIE.' '.date("Y");?> | <?php echo INSTITUCION; ?></p>
            <ul class="derecha">
            	<?php echo REDES; ?>
            </ul>
        </div>
    </footer>
</div>
<nav id="menu-left">
	<ul>
       	<li><span class="config">Menu principal</span></li>
		<li class="noticias"><a href="">Noticias <span class="burbuja">2</span></a></li>
        <li class="perfil"><a href="">Perfil</a></li>
		<li class="academico"><a href="">Record Academico</a></li>
		<li class="pagos"><a href="">Record de pagos</a></li>
		<li class="ayuda"><a href="">Ayuda</a></li>
		<li class="cerrar"><a href="">Cerrar Sesion</a></li>
		<li class="app"><a href="">Descargar App</a></li>
		<li class="accesos"><a href="">Registro de accesos</a></li>
		<li class="rendimiento"><a href="">Mi rendimiento academico</a></li>
   	</ul>
</nav>   
</body>
</html>