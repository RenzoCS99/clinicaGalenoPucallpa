<?php
class AdminC{
    //Ingreso Admin
    public function IngresarAdminC() {
        if (isset($_POST["usuario-Ing"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {
                $tablaBD = "administradores";
                $datosC = array("usuario" => $_POST["usuario-Ing"], "clave" => $_POST["clave-Ing"]);
                $resultado = AdminM::IngresarAdminM($tablaBD, $datosC);

                if ($resultado) {
                    // Verificar si la sesión ya está activa
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];

                    // Redirección a inicio
                    header("Location: inicio");
                    exit();
                } else {
                    echo '<br><div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
                }
            } else {
                echo '<br><div class="alert alert-danger">Formato de usuario o contraseña inválido</div>';
            }
        }
    }

    //Ver perfil admin
    public function VerPerfilAdminC(){

        $tablaBD = "administradores";

        $id = $_SESSION["id"];

        $resultado = AdminM::VerPerfilAdminM($tablaBD, $id);
        echo'
            <tr>
                <td>'.$resultado["usuario"].'</td>
                <td>'.$resultado["clave"].'</td>
                <td>'.$resultado["nombre"].'</td>
                <td>'.$resultado["apellido"].'</td>';

                if($resultado["foto"]!=""){
                    echo'
                        <td><img src = "'.$resultado["foto"].'" class="img-responsive" width="40px"></td>
                    ';
                }else{
                    echo'
                        <td><img src = "http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>
                    ';
                }
                
                            
        echo'
                <td>
                    <a href="">
                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                    </a>
                </td>
            </tr>
        ';
    }
}
?>