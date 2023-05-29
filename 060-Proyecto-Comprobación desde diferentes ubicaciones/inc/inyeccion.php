<?php

// Bloqueo por ataque
foreach($_REQUEST as $variable=>$valor){ 
    if(preg_match_all('/\b(SELECT|INSERT|DELETE|UPDATE|;|DROP|ORDER|HAVING|<scri)\b/i',$valor)){
	
	die('{"mensaje":"intento de ataque detectado"}');
    }
}