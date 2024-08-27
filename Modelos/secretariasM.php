<?php

require_once "conexionBD.php";

class secretariasM extends conexionBD{
    //Ingreso Secretaria
    static public function IngresarSecretariaM($tablaBD, $datosC){
        $pdo = (new conexionBD())->cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD
            WHERE usuario = :usuario");
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        
        return $pdo -> fetch();
        
        $pdo -> close();
        
        $pdo = null;
    }

    //Ver Perfil Secretaria
    static public function VerPerfilSecretariaM($tablaBD, $id){
        $pdo = (new conexionBD())->cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD
            WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();
        
        return $pdo -> fetch();
        
        $pdo -> close();
        
        $pdo = null;
    }
}