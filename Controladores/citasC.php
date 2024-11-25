<?php
class CitasC{
    //Pedir Cita Paciente
    public function EnviarCitaC(){
        if(isset($_POST["Did"])){
            $tablaBD = "citas";
            $Did = substr($_GET["url"], 7);
            $datosC = array("Did"=>$_POST["Did"], "Pid"=>$_POST["Pid"], "nyaC"=>$_POST["nyaC"], "Cid"=>$_POST["Cid"], "documentoC"=>$_POST["documentoC"], 
            "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

            $resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

            if($resultado==true){
                echo '
                    <script>
                        window.location = "Doctor/"'.$Did.';
                    </script>
                ';
            }
        }
    }

    //ver citas
    public static function VerCitasC(){
        $tablaBD = "citas";
        $resultado = CitasM::VerCitasM($tablaBD);

        return $resultado;
    }

    //pedir Cita como doctor
    public function PedirCitaDoctorC(){
        if(isset($_POST["Did"])){
            $tablaBD = "citas";
            $Did = substr($_GET["url"], 6);

            $datosC = array("Did"=>$_POST["Did"], "Cid"=>$_POST["Cid"], "nombreP"=>$_POST["nombreP"], "documentoP"=>$_POST["documentoP"], 
            "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

            $resultado = CitasM::PedirCitaDoctorM($tablaBD, $datosC);

            if($resultado == true){
                echo'
                    <script>
                        window.location = "Citas/"'.$Did.';
                    </script>
                ';
            }
        }
    }

    //pedir citas como secretarias
    public function PedirCitaSecretariaC(){
        if(isset($_POST["Did"])){ // Verifica si el formulario fue enviado
            $tablaBD = "citas"; // Nombre de la tabla
            $Did=substr($_GET["url"], 16);

            $datosC = array("Did"=>$_POST["Did"], "Pid"=>$_POST["Pid"], "Cid"=>$_POST["Cid"], "nyaC"=>$_POST["nyaC"], "documentoP"=>$_POST["documentoP"], 
            "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

            $resultado = CitasM::PedirCitaSecretariaM($tablaBD, $datosC);

            if($resultado == true){
                echo'
                    <script>
                        window.location = "Citas/"'.$Did.';
                    </script>
                ';
            }
            
            /*
            // Recoge los datos enviados desde el formulario del modal
            $datosC = array(
                "Did" => $_POST["Did"], // ID del doctor
                "Pid" => $_POST["Pid"], // ID del paciente
                "Cid" => $_POST["Cid"], // ID del consultorio
                "nyaC" => $_POST["nyaC"], // Nombre y apellido del paciente
                "documentoC" => $_POST["documentoP"], // Documento del paciente
                "fyhIC" => $_POST["fyhIC"], // Fecha y hora de inicio
                "fyhFC" => $_POST["fyhFC"]  // Fecha y hora de fin
            );
    
            // Llama al modelo para registrar la cita
            $resultado = CitasM::PedirCitaSecretariaM($tablaBD, $datosC);
    
            // Si se registra correctamente, redirige
            if($resultado == true){
                echo '
                    <script>
                        alert("Cita registrada correctamente");
                        window.location = "SecretariaCitas/"'.$Did.';
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Error al registrar la cita. Intenta nuevamente.");
                    </script>
                ';
            }*/
        }
    }
}