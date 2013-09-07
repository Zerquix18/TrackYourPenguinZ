<?php
/**
* actualizar.php | Archivo de functiones.
*
*
* Este archivo tiene el cuerpo del documento y las funciones adicionales...
*
*
* @author Zerquix18
* @version 1.1.0
* @link http://zerquix18.com.ar/trackers-php/
* @category Club Penguin
* @package Trackers by Zer!
*
*
*/

$v = '1.1.0';

/**
*
* titulo() - Esta función carga el título de la página
* @return El título
* @param string $a Título personalizado desde la función
* @see ../config.php
*
**/

function titulo($a = 'Trackers by Zer') {
$titulo = EL_TITULO;
if(isset($titulo) && $titulo != "TITULO ACÁ") {
  return $titulo;
}elseif($titulo = "TITULO ACÁ" or !isset($titulo)) {
  return $a;
}
}

/**
* construir_cabecera() - Construye la cabecera de la página...
*
*
**/

	function construir_cabecera() {
?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8">
<meta name="Robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo titulo(); ?> </title>
<style type="text/css">
body {
padding-top: 60px; 
}
</style>
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">
	</head>
<body>
    <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><?php echo titulo(); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/index.php">Inicio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<?php if( sesion_iniciada() ) {
?>
<p class="pull-left">&iexcl;Hola <b><?php echo $_SESSION['usuario']; ?></b>!</p>
<ul class="pager">
  <li class="next">
	<a href="index.php?p=logout"> Cerrar sesi&oacute;n &rarr; </a>
  </li>
</ul>
<?php
	}
} 

/**
* construir_pies() - Construye los pies de la página
**/

function construir_pies() {
?>

<?php copyright(); ?></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>
</script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
	</body>
	</html>
<?php
}


function zer_error($texto) {
  /**
  * @deprecated 1.1.0
  * @return Un error, sin significado...
  **/
if( is_null($texto) ) {
    $returnar = false;
	return $returnar;
}else{
	echo $texto;
}
}

/**
* sesion_iniciada() - Comprueba si la sesión fue iniciada...
* @see session_start() - ../trackers.php | ob_start() ../trackers.php
* @return true - Si la sesión fue iniciada... | false - Si no lo fue...
*
**/

function sesion_iniciada() { 
if(isset($_SESSION['usuario'])) {

return true;

}else{

return false;

}

}

/**
* copyright() - Pone el copyright al final de la página...
*
* @param string $v - La versión del string, arriba...
* @see construir_pies()
* @since 1.0.0
*
**/

function copyright() {
?><hr>
<footer>
<a href="//zerquix18.com.ar/trackers-php/" target="_blank">&copy; Trackers by Zer!</a>
<?php if( ACTUALIZAR ) { ?>
<p class="pull-right"><b>Versi&oacute;n <?php echo $v; ?></b></p>
<?php } ?> </footer>
<?php } 

$usuarios = array();

/**
*
* agregar_usuario() - Agrega un usuario a la lista...
*
* @param string $usuarios
* @since 1.1.0
*
**/

function agregar_usuario( $usuario = null, $clave = null) {
  global $usuarios;
  if( is_null($usuario) or is_null($clave) ) {
    return;
  }
  $u = $usuarios[ strtolower($usuario) ] = $clave; //Pasa el usuario a minus...
  return $u;
}

/**
*
* usuario_existe() - Comprueba si existe el usuario...
*
* @param string $usuarios
* @since 1.1.0
* @return TRUE - Si existe el usuario
* @return FALSE - Si no existe el usuario
*
**/

function existe_usuario($usuario = null, $clave = null) {
  global $usuarios;
  if( is_null($usuario) or is_null($clave) ) {
    return;
  }
  if( isset($usuarios[$usuario]) && $usuarios[$usuario] == $clave) {
    return TRUE;
  }else{
    return FALSE;
  }
}

/**
* existen_usuarios() - Esta función comprueba que existan usuarios...
*
* @param string $usuarios
* @return Los usuarios
*
*
**/

function existen_usuarios() {
  global $usuarios;
  if( isset($usuarios) ) {
    return true;
  }
  return false;
}

/**
*
* devolver_usuarios() - Devuelve todos los usuarios en un array ordenado...
*
* @param string $usuarios
*
* ESTA FUNCIÓN SÓLO FUNCIONA SI LA TIRAS TÚ EN ALGÚN SITIO... con devolver_usuarios();
* Podrá ser molesto y lo quitarás... Sólo programadores...
*
**/

function devolver_usuarios() {
  global $usuarios;
  if( ! existen_usuarios() ) {
    echo 'No existen usuarios';
    return false;
  }
  echo '<div class="alert alert-info"><h1>Usuarios:</h1><br>';
  foreach($usuarios as $u => $p) {
    echo sprintf('<b>Usuario:</b> <i>%s</i> | <b>Clave:</b> <i>%s</i><br>',
      $u,
      $p);
    }
  echo '</div>';
}

/**
* agregar_error() - Tira mensaje de error de bootstrap en color rojo...
*
* @param string $error - El error ha tirar...
* @param bol $cerrar - false = No sale el botón de cerrar - true Sale el botón de cerrar
* @param bol $mensaje - false = Sale mensaje: 'Error: ' - No sale mensaje antes...
* @since 1.1.0
*
**/

function agregar_error( $error = null, $cerrar = false, $mensaje = true) {
  if( is_null($error) ){
    return false;
  }
  $close = ($cerrar == true) ? '<a class="close" data-dismiss="alert" href="#">&times;</a>' : '';
  $msg = ($mensaje == true) ? '<i class="icon-remove"></i> <b>Error:</b> ' : '';
  return '<div class="alert alert-error">' . $close . ' ' . $msg . $error . '</div>';
}

/**
* agregar_info() - Tira mensaje de info de bootstrap en color azul...
*
* @param string $error - La info a tirar...
* @param bol $cerrar - false = No sale el botón de cerrar - true Sale el botón de cerrar
* @param bol $mensaje - false = Sale mensaje: 'Info: ' - No sale mensaje antes...
* @since 1.1.0
*
**/

function agregar_info( $info = null, $cerrar = false, $mensaje = true ) {
  if( is_null($info) ) {
    return false;
  }
  $close = ($cerrar == true) ? '<a class="close" data-dismiss="alert" href="#">&times;</a>' : '';
  $msg = ($mensaje == true) ? '<i class="icon-ok"></i> <b>Info:</b> ' : '';
  echo '<div class="alert alert-info">'. $close  . $info . '</div>';
}

