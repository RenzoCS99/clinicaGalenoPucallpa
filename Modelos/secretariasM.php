<?php

require_once "conexionBD.php";

class secretariasM extends conexionBD{
    static public function IngresarSecretariaM($tablaBD, $datosC){
        $pdo = (new conexionBD())->cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD
            WHERE usuario = :usuario");
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        
        return $pdo -> fetch();
        
        $pdo -> close();
        
        $pdo = null;
    }
}