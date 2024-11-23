<?php
class AdminC{
    //Ingreso Admin
    public function IngresarAdminC(){
        if(isset($_POST["usuario-Ing"])){
            if(preg_match('/^[a-zA-Z0_9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0_9]+$/', $_POST["clave-Ing"])){
                $tablaBD = "administadores";
                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);
                $resultado = AdminM::IngresarAdminM($tablaBD, $datosC);
            }
        }
    }
}
?>