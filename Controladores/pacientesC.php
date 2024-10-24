<?php
    class PacientesC{
        //crear paciente
        public function CrearPacienteC(){
            if(isset($_POST["rolP"])){
                $tablaBD = "pacientes";
                $datosC = array("apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "documento"=>$_POST["documento"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolP"]);
                $resultado = PacientesM::CrearPacienteM($tablaBD, $datosC); 
                if($resultado==true){
                    echo'<script>
                        window.location = "pacientes";
                    </script>';
                }
            }
        }

        //ver pacientes
        public static function VerPacientesC($columna, $valor){
            $tablaBD = "pacientes";
            $resultado = PacientesM::VerPacientesM($tablaBD, $columna, $valor);
            return $resultado;
        }

        //borrar paciente
        public static function BorrarPacienteC(){
            if(isset($_GET["Pid"])){
                $tablaBD = "pacientes";
                $id = $_GET["Pid"];
                if($_GET["imgP"!=null]){
                    unlink($_GET["imgP"]);
                }

                $resultado = PacientesM::BorrarPacienteM($tablaBD, $id);
                if($resultado==true){
                    echo'<script>
                        window.location = "pacientes";
                    </script>';
                }
                
            }
        }
    }
?>