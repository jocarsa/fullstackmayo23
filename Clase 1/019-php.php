<?php
    $diadelasemana = "longaniza";
    switch($diadelasemana){
        case "lunes":
            echo "Hoy es el peor día de la semana";
            break;
        case "martes":
            echo "Hoy es el segundo peor día de la semana";
            break;
        case "miércoles":
            echo "Ya estamos a mitad de semana";
            break;
        case "jueves":
            echo "Hoy es juernes";
            break;
        case "viernes":
            echo "Ya es casi fin de semana";
            break;
        case "sábado":
            echo "Hoy es el mejor día de la semana";
            break;
        case "domingo":
            echo "Parece mentira que mañana ya es lunes";
            break;
        default:
            echo "Lo que has puesto no es un día";
    }
    
?>