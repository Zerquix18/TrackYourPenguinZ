<?php
/**
* logout.php | Archivo de cierre de sesión.
*
* Acá cierras la sesión...
* 
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
if( sesion_iniciada() ) {
 
	header("Location: ?p=acceso");

	session_destroy();
	session_unset();

}else {
 
	header("Location: ?p=acceso&sesion=no_iniciada");
}

?>
