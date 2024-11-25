<?php
require_once "Controladores/plantillaControlador.php";

require_once "Controladores/secretariasC.php";
require_once "Modelos/secretariasM.php";

require_once "Controladores/consultoriosC.php";
require_once "Modelos/consultoriosM.php";

require_once "Controladores/doctoresC.php";
require_once "Modelos/doctoresM.php";

require_once "Controladores/pacientesC.php";
require_once "Modelos/pacientesM.php";

require_once "Controladores/citasC.php";
require_once "Modelos/citasM.php";

require_once "Controladores/adminC.php";
require_once "Modelos/adminM.php";

require_once "Controladores/inicioC.php";
require_once "Modelos/inicioM.php";



/*La instrucción require_once en PHP se utiliza para incluir y evaluar 
el archivo especificado durante la ejecución del script, pero con una 
verificación adicional: si el archivo ya ha sido incluido, no se incluirá nuevamente.*/

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();