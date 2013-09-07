<?php
/*Fijate en los comentarios de abajo para que vayas editando los parametros de tu imagen... */

imagettftext($im, 16, 0, 120, 130, $colour, $font, $status); // Esto pone el estado
imagettftext($im, 16, 0, 135, 177, $colour, $font, $server); // Esto pone el servidor
imagettftext($im, 16, 0, 75, 220, $colour, $font, $room); // Esto pone la sala

/* El $im dejalo tal y como esta. 
*  16 es el tamaño del texto.
*  0 es el angulo del texto, si tienes dudas dejalo como esta...
*  120 es el tamaño del texto alineado hacia la izquierda, mientras mas bajo mas hacia la izquierda ira...
*  130 es el texto hacia arriba, mientras mas bajo sea, mas el texto ira hacia arriba...
*/

/* Ya no edites mas!! */
imagepng($im,"./". IMG);
imagedestroy($im);
