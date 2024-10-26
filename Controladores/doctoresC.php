<?php
    class DoctoresC{
        //Crear doctores
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

        //mostrar doctores
        static public function VerDoctoresC($columna, $valor){
            $tablaBD = "doctores";
            $resultado = DoctoresM::VerDoctoresM($tablaBD, $columna, $valor);
            return $resultado;
        }

        //editarDoctor
        static public function DoctorC($columna, $valor){
            $tablaBD = "doctores";
            $resultado = DoctoresM::DoctorM($tablaBD, $columna, $valor);
            return $resultado;
        }

        //Actualizar Doctor

        public function ActualizarDoctorC(){
            if(isset($_POST["Did"])){
                $tablaBD ="doctores";
                $datosC = array("id"=>$_POST["Did"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"],
            "sexo"=>$_POST["sexoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);
            $resultado = DoctoresM::ActualizarDoctorM($tablaBD, $datosC);
            if($resultado == true){
                echo '<script>
                    window.location = "doctores";
                </script>';
            }
            }
        }

        //borar doctor
        public function BorrarDoctorC(){
            if(isset($_GET["Did"])){
                $tablaBD = "doctores";
                $id = $_GET["Did"];
                if($_GET["imgD"]!=""){
                    unlink($_GET["imgD"]);
                }

                $resultado = DoctoresM::BorrarDoctorM($tablaBD, $id);
                if($resultado == true){
                    echo '<script>
                        window.location = "doctores";
                    </script>';
                }
            }
        }



        //ingreso doctor
        public function IngresarDoctorC(){
            if(isset($_POST["usuario-Ing"])){
                if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])){

                    $tablaBD = "doctores";
                    $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                    $resultado = DoctoresM::IngresarDoctorM($tablaBD, $datosC);

                    if($resultado["usuario"]==$_POST["usuario-Ing"] && $resultado["clave"]==$_POST["clave-Ing"]){
                        
                        $_SESSION["Ingresar"] = true; 

                        $_SESSION["id"] = $resultado["id"]; 
                        $_SESSION["usuario"] = $resultado["usuario"]; 
                        $_SESSION["clave"] = $resultado["clave"]; 
                        $_SESSION["apellido"] = $resultado["apellido"]; 
                        $_SESSION["nombre"] = $resultado["nombre"]; 
                        $_SESSION["sexo"] = $resultado["sexo"]; 
                        $_SESSION["foto"] = $resultado["foto"]; 
                        $_SESSION["rol"] = $resultado["rol"]; 

                        echo '
                        <script>
                          window.location = "inicio";
                        </script>
                        ';

                    }

                }
            }
        }

        //ver perfil doctor
        public function VerPerfilDoctorC(){

            $tablaBD = "doctores";
            $id = $_SESSION["id"];

            $resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

            echo'
                <tr>
                    <td>'.$resultado["usuario"].'</td>
                    <td>'.$resultado["clave"].'</td>
                    <td>'.$resultado["nombre"].'</td>
                    <td>'.$resultado["apellido"].'</td>';
                    if($resultado["foto"] == null){
                        echo'
                            <td><img src="Vistas/img/defecto.png" width="40px"></td>
                        ';
                    }else{
                        echo'
                            <td><img src="'.$resultado["foto"].'" width="40px"></td>
                        ';
                    }
                    
                    $columna = "id";
                    $valor = $resultado["id_consultorio"];

                    $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
                    echo'
                    
                    <td>'.$consultorio["nombre"].'</td>
                    ';
                    echo'
                    <td>
                        Desde: '.$resultado["horarioE"].'
                        <br>
                        Hasta: '.$resultado["horarioS"].'
                    </td>
                    <td>
                        <a href="http://localhost/clinica/perfil-D/'.$resultado["id"].'">
                            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                        </a>
                    </td>

                </tr>
            ';

        }
    }
?>