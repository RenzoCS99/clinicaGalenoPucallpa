<?php
    class DoctoresC{
        public function CrearDoctorC(){
            if(isset($_POST["rolD"])){
                $tablaBD = "doctores";
                $datosC = array("rol"=>$_POST["rolD"], "apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "sexo"=>$_POST["sexo"],
                "id_consultorio"=>$_POST["consultorio"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"]);
                $resultado  = DoctoresM::CrearDoctorM($tablaBD,$datosC);

                if($resultado == true){
                    echo '<script>
                        window.location = "doctores";
                    </script>';
                }
            }
        }
    }
?>