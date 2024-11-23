<?php
    require_once "ConexionBD.php";

    class AdminM extends ConexionBD{
        //ingreso admin
        static public function IngresarAdminM($tablaBD, $datosC) {
            $pdo = ConexionBD::cBD()->prepare(
                "SELECT id, usuario, clave, nombre, apellido, foto, rol 
                 FROM $tablaBD 
                 WHERE usuario = :usuario AND clave = :clave"
            );
    
            $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
    
            $pdo->execute();
    
            return $pdo->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo si encuentra datos
        }
    }
?>