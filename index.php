<?php
require_once "Controladores/plantillaControlador.php";
/*La instrucción require_once en PHP se utiliza para incluir y evaluar 
el archivo especificado durante la ejecución del script, pero con una 
verificación adicional: si el archivo ya ha sido incluido, no se incluirá nuevamente.*/
$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();