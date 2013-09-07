<?php
/**
* login.php | Archivo de Acceso
*
* 
* Aquí accedes...
*
*
* @author Zerquix18
* @version 1.1.0
* @link http://zerquix18.com.ar/trackers-php/
* @category CLub Penguin
* @package Trackers by Zer!
*
*
*/
if( sesion_iniciada() ){
	header("Location: index.php");
}

	construir_cabecera();
if(!defined("ACTUALIZAR") ) {
define("ACTUALIZAR", false);
}
	if('POST' == $_SERVER['REQUEST_METHOD']) {

	if(empty($_POST['usuario_acceso']) || empty($_POST['clave_acceso'])) {
		echo agregar_error('Los campos de usuario y/o contraseña no pueden estar vacíos.',
			true, true);
	}else{
		$u = strtolower($_POST['usuario_acceso']); // pasa el user a minúscula
		$p = $_POST['clave_acceso'];
	if(existe_usuario($u, $p) ) {
	$_SESSION['usuario'] = $_POST['usuario_acceso'];
header("Location: index.php");
		}else { 
			echo agregar_error('El usuario y la contraseña no coinciden...', true, true);
	}
     }
  }elseif( isset($_GET['sesion']) && $_GET['sesion'] == 'no_iniciada') {
  	echo agregar_info('Para cerrar sesión... Debes iniciarla...', true, true);
  }

?>
<hr>
<div class="hero-unit"><h1><u><?php if( defined("MENSAJE_ACCESO") ) { echo MENSAJE_ACCESO; }else{ ?>Bienvenido al acceso... <?php } ?></u></h1> <br><br>

<form action="<?php echo $_SERVER['PHP_SELF']. '?p=acceso' ?>" method="post" class="form-horizontal">
<div class="control-group"><label class="control-label" for="inputEmail">
 Nombre de Usuario:</label> <div class="controls"><input type="text" name="usuario_acceso" placeholder="Tu usuario" class="input-medium search-query" id="inputEmail">
 </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="inputPassword">
Contrase&ntilde;a: </label> <div class="controls"> <input type="password" name="clave_acceso" placeholder="Tu clave" class="input-medium search-query"><br>
  </div>
  </div>

<hr><button type="submit" name="enviar-acceso" value="Enviar datos" class="btn btn-primary" data-loading-text="Cargando..." >Enviar </button>
</form>
</div>
<?php 
construir_pies();