<?php
require_once "conexionBD.php";

class CitasM extends ConexionBD{
    //Pedir cita paciente
    static public function EnviarCitaM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, id_paciente, nyaP, documento,
        inicio, fin) VALUES (:id_doctor, :id_consultorio, :id_paciente, :nyaP, :documento, :inicio, :fin)");

        $pdo -> bindParam("id_doctor", $datosC["Did"], PDO::PARAM_INT);
        $pdo -> bindParam("id_consultorio", $datosC["Cid"], PDO::PARAM_INT);
        $pdo -> bindParam("id_paciente", $datosC["Pid"], PDO::PARAM_INT);
        $pdo -> bindParam("nyaP", $datosC["nyaC"], PDO::PARAM_STR);
        $pdo -> bindParam("documento", $datosC["documentoC"], PDO::PARAM_STR);
        $pdo -> bindParam("inicio", $datosC["fyhIC"], PDO::PARAM_STR);
        $pdo -> bindParam("fin", $datosC["fyhFC"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
         
    }

    //mostrar citas
    static public function VerCitasM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    ////pedir Cita como doctor
    static public function PedirCitaDoctorM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, nyaP, documento,
        inicio, fin) VALUES (:id_doctor, :id_consultorio, :nyaP, :documento, :inicio, :fin)");

        $pdo -> bindParam(":id_doctor", $datosC["Did"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_consultorio", $datosC["Cid"], PDO::PARAM_INT);
        $pdo -> bindParam(":nyaP", $datosC["nombreP"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documentoP"], PDO::PARAM_STR);
        $pdo -> bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
        $pdo -> bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;

    }


    //pedir citas como secretarias
    static public function PedirCitaSecretariaM($tablaBD, $datosC){
        // Prepara la consulta SQL
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD 
            (id_Doctor, id_Consultorio, id_Paciente, nyaP, documento, inicio, fin) 
            VALUES (:id_Doctor, :id_Consultorio, :id_Paciente, :nyaP, :documento, :inicio, :fin)");
    
        // Enlaza los parámetros con los valores
        $pdo->bindParam(":id_Doctor", $datosC["Did"], PDO::PARAM_INT);
        $pdo->bindParam(":id_Consultorio", $datosC["Cid"], PDO::PARAM_INT);
        $pdo->bindParam(":id_Paciente", $datosC["Pid"], PDO::PARAM_INT);
        $pdo->bindParam(":nyaP", $datosC["nyaC"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documentoP"], PDO::PARAM_STR);
        $pdo->bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
        $pdo->bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR);
    
        // Ejecuta la consulta y verifica el resultado
        if($pdo->execute()){
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
    
        $pdo = null; // Cierra la conexión
    }
}