<?php
/**
* config.php | Archivo de configuración.
*
* Aquí pones los usuarios para el acceso, el título de la página, las claves de Twitter
* y los tweets para twittear...
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
/*En los "define" no quites la primera opción, o estropearás el código... */

/*Define el título de la página*/
define("EL_TITULO", "Mis trackers"); 

/* Define tu usuario :) */

agregar_usuario('Tu usuario', 'Tu clave');

/*Define la imagen de fondo, sobre la que escribiremos... */
define("IMG_BG","trackerbg.png");
/*Define la imagen del resultado escrito en la de fondo por el PHP... */
define("IMG", "tracker.png"); 
/*El Consumer Key de tu aplicación... */
$ConsumerKey = "Tucosumerkey"; 
/* El Consumer Secret de tu aplicación... */
$ConsumerSecret = "Tuconsumersecret";
/* El oAuth Token de tu aplicación... */
$oAuthToken = "TuOAuthtoken";
/* El oAuth Secret de tu aplicación... */
$oAuthSecret = "TuOAuthtokesecret";

/* - Los tweets - */

/* De esta forma los configuras:
*
* %cp% lanzará #ClubPenguin para los buscadores en Twitter.
*
* %r% lanzará un número del 1 al 100 para que no se repita, puede ir así [$r] - ($r) -$r- /$r/ ...
*
* %sala% lanzará la sala que actualizaste.
*
* %servidor% lanzará el servidor que actualizaste.
*
* %estado% lanzará el estado que actualizaste.
*
* %link% si usas define("LINK", "http://algunapag.com"); aparecerá ese link...
*
* Próximamente más funciones... */

//Por favor  recuerda editar sólo DENTRO de las comillas. Y al final de ellas debe haber un ; (ya está puesto)

/*Define el tweet de encontrado... */
$tweet_encontrado = "#Personaje ha sido encontrado en la sala %sala%"; 
/*Define el tweet para cuando el personaje se mueva de sala */
$tweet_movio = "#Personaje se ha movido a la sala %sala% %cp% - (%r)"; 
/*Define el tweet para cuando el personaje se vaya */
$tweet_se_fue = "#Personaje se fue del servidor... (%r%) %cp%"; 
/*Define el tweet para cuando estén trackeando el personaje... */
$tweet_track = "Estamos trackeando a #Personaje  (%r) - %cp%";

/* ¡Ya para de editar! */ 

/**************** EJECUCIONES *************************/
/* Lee más en... http://clubpeng.in/SEimoX */ 




/******************************************************/
