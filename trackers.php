<?php
/**
* trackers.php | Archivo que require a otros archivos
*
* Esto sólo require a otros archivos, el archivo del Inicio es este... :)
*
* @author Zerquix18
* @version 1.1.0
* @link http://zerquix18.com.ar/trackers-php/
* @category Club Penguin
* @package Trackers by Zer!
*
**/


session_start();
ob_start();

if(! defined("INC") ) { 
define("INC", "incluye"); 
}

if( ZER_TRACKERS !== false ) {
require_once( INC . '/funciones.php');
require_once("./config.php");
$pagina = $_GET['p'];
switch($pagina) {
	case 'acceso':
	require_once(INC. '/login.php');
break;
	case 'logout':
	require_once(INC.'/logout.php');
break;
	default:
require_once( INC. "/actualizar.php");
	}
}

/**
*
* @since 1.1.0
*
**/

$qs = (!empty($_SERVER['QUERY_STRING']) ) ? $_SERVER['QUERY_STRING'] : '';
$phpself = $_SERVER['PHP_SELF'];
$path = dirname($phpself) . '/';
$host = $_SERVER['HTTP_HOST'];



if( strpos($phpself, 'trackers.php') ) {
	header("Location: index.php");
}

?>