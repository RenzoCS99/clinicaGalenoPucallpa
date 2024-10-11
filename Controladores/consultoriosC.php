<?php
class ConsultoriosC{

    //Crear consultorios
    public function CrearConsultorioC(){
        if(isset($_POST["consultorioN"])){
            $tablaBD = "consultorios";
            $consultorio = array("nombre"=>$_POST["consultorioN"]);
            $resultado = ConsultoriosM::CrearConsultorioM($tablaBD, $consultorio);
            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/clinica/consultorios"
                </script>';
            }
        }
    }

    //Ver consultorios

    static public function VerConsultoriosC($columna, $valor){
        $tablaBD = "consultorios";
        $resultado = ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);
        return $resultado;

    }

    //Borrar consultorio
    public function BorrarConsultoriosC(){
        if(substr($_GET["url"],13)){
            $tablaBD = "consultorios";
            $id = substr($_GET["url"],13);
            $resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $id);
            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/clinica/consultorios"
                </script>';
            }
        }
    }

    //editar consultorio
    public function EditarConsultoriosC(){
        $tablaBD = "consultorios";
        $id = substr($_GET["url"],19);

        $resultado = ConsultoriosM::EditarConsultoriosM($tablaBD, $id);
        if($resultado) {
            echo '<div class="form-group">
                    <h2>Nombre:</h2>
                        <input type="text" class="form-control input-lg" name="consultoriosE" value="'.$resultado["nombre"].'">
                        <input type="hidden" class="form-control input-lg" name="cid" value="'.$resultado["id"].'">
                        <br>
                        <button class="btn btn-success" type="submit">Guardar Cambio</button>
                </div>';
        } else {
            echo '<div class="form-group">
                    <p>No se encontró el consultorio solicitado.</p>
                </div>';
        }
    }

    //actualizar consultorio
    public function ActualizarConsultoriosC(){
        if(isset($_POST["consultoriosE"])){
            $tablaBD = "consultorios";
            $datosC = array("id"=>$_POST["cid"], "nombre"=>$_POST["consultoriosE"]);
            $resultado = ConsultoriosM::ActualizarConsultoriosM($tablaBD, $datosC);
            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/clinica/consultorios"
                </script>';
            }
        }
    }
}
?>