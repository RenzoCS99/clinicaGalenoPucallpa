<?php
    if($_SESSION["rol"] != "Secretaria"){
        echo '<script>
        
        window.location = "inicio";
        </script>';
        return;
    }
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de consultorios</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <form method="post">
                    <div class="col-md-6 col-xs-12">
                        <input type="text" name="consultorioN" class="form-control" placeholder="Ingrese Nuevo Consultorio" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear Consultorio</button>
                </form>
                <?php
                    $crearC = new ConsultoriosC();
                    $crearC -> CrearConsultorioC();
                    $borrarC = new ConsultoriosC();
                    $borrarC -> BorrarConsultoriosC();
                ?>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);
                        

                        if(!empty($resultado)){
                            foreach ($resultado as $key => $value) {
                                echo '
                                <tr>
                                <td>'.($key+1).'</td>
                                <td>'.($value["nombre"]).'</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="http://localhost/clinica/editarConsultorios/'.($value["id"]).'">
                                            <button class="btn btn-success"><i class="fa fa-pencil"></i>Editar</button>
                                        </a>
                                        <a href="http://localhost/clinica/consultorios/'.($value["id"]).'">
                                            <button class="btn btn-danger"><i class="fa fa-times"></i>Borrar</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>';
                            }
                        }else{
                            echo '<tr><td colspan="3" class="text-center">No hay consultorios registrados.</td></tr>';
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>