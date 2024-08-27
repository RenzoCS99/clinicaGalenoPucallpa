<?php
class SecretariasC{

    //Ingreso secretaria
    public function IngresarSecretariaC(){
        //Esto sirve para verificar si la consulta trae data
        if(isset($_POST["usuario-Ing"])){
            if(preg_match('/^[a-zA-Z0-9´Ññ]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9´Ññ]+$/',$_POST["clave-Ing"])){
                $tablaBD = "secretarias";
                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);
                $resultado = SecretariasM::IngresarSecretariaM($tablaBD,$datosC);
                if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){
                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] =  $resultado ["id"];
                    $_SESSION["usuario"] =  $resultado ["usuario"];
                    $_SESSION["clave"] =  $resultado ["clave"];
                    $_SESSION["nombre"] =  $resultado ["nombre"];
                    $_SESSION["apellido"] =  $resultado ["apellido"];
                    $_SESSION["foto"] =  $resultado ["foto"];
                    $_SESSION["rol"] =  $resultado ["rol"];
                    
                    echo '<script>
                    window.location="inicio";
                    </script>';
                }else{
                    echo 'Error al ingresar';
                }
            }
        }
    }
    //ver perfil de secretaria
    public function VerPerfilSecretariaC(){

        $tablaBD = "secretarias";
        $id = $_SESSION["id"];
        $resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);
        echo'<tr>
                            <td>'.$resultado["usuario"].'</td>

                            <td>'.$resultado["clave"].'</td>

                            <td>'.$resultado["nombre"].'</td>

                            <td>'.$resultado["apellido"].'</td>';

                            if($resultado["foto"]!=""){
                                echo'<td><img src="'.$resultado["foto"].'" class="img-responsive" width="40 px"></td>';
                            }else{
                                
                                echo'<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40 px"></td>'; 
                            }
                            echo'<td>
                                <a href="#">
                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
                        </tr>';
    }

}
