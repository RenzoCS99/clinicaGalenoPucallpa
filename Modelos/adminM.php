<?php
    require_once "ConexionBD.php";

    class AdminM extends ConexionBD{
        //ingreso admin
        static public function IngresarAdminM($tablaBD, $datosC){
            $pdo = ConexionBD::cBD()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, rol FROM $tablaBD
            WHERE usuario=:usuario");

            $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            
            $pdo->execute();
            $pdo = null;
        }
    }
?>