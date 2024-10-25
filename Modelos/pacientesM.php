<?php
    require_once "ConexionBD.php";
    class PacientesM extends ConexionBD{

        //Crear paciente
        static public function CrearPacienteM($tablaBD, $datosC){
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (apellido, nombre, documento, usuario,
            clave, rol) VALUES (:apellido, :nombre, :documento, :usuario, :clave, :rol)");
            $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
            $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

            if($pdo->execute()){
                return true;
            }
            $pdo = null;
        }

        //ver paciente
        static public function VerPacientesM($tablaBD, $columna, $valor){
            if($columna == null){
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");
                $pdo -> execute();
                return $pdo ->fetchAll();
            }else{
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");
                $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
                $pdo -> execute();
                return $pdo->fetch();
            }
            $pdo = null;
        }

        //borrar paciente
        static public function BorrarPacienteM($tablaBD, $id){
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            }
            $pdo = null;
        }

        //actualizar paciente
        static public function ActualizarPacienteM($tablaBD, $datosC){
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, documento = :documento, usuario = :usuario, clave = :clave
            WHERE id = :id");
            $pdo -> bindParam("id", $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam("apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam("documento", $datosC["documento"], PDO::PARAM_STR);
            $pdo -> bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);
        
            if($pdo->execute()){
                return true;
            }
            $pdo = null;
        
        }

    }
?>