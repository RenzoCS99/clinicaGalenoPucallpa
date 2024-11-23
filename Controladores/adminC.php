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
}
?>