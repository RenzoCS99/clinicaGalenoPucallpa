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

        //Ver perfil admin
        static public function VerPerfilAdminM($tablaBD, $id){

            $pdo = ConexionBD::cBD()->prepare(
                "SELECT id, usuario, clave, nombre, apellido, foto FROM $tablaBD WHERE id = :id");
    
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
    
            $pdo->execute();
    
            return $pdo->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo si encuentra datos

        }

        //actualizar perfil admin
        static public function ActualizarPerfilAdminM($tablaBD, $datosC){
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario=:usuario, clave=:clave, nombre=:nombre, apellido=:apellido, foto=:foto WHERE id=:id");
            $pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
            $pdo -> bindParam(":usuario", $datosC["usuario"],PDO::PARAM_STR);
            $pdo -> bindParam(":clave", $datosC["clave"],PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
            $pdo -> bindParam(":apellido", $datosC["apellido"],PDO::PARAM_STR);
            $pdo -> bindParam(":foto", $datosC["foto"],PDO::PARAM_STR);

            if($pdo -> execute()){
                return true;
            }
            $pdo = null;
            
        }
    }

?>