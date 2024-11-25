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

        <?php
            $columna = "id";
            $valor = substr($_GET["url"], 16);

            $resultado = DoctoresC::DoctorC($columna,$valor);

            if($resultado["sexo"]=="Femenino"){
                echo'
                    <h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
                ';
            }else{
                echo'
                    <h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
                ';
            }

            $columna = "id";
            $valor = $resultado["id_consultorio"];

            $consultorio = ConsultoriosC::VerConsultoriosC($columna,$valor);

            echo'
                <br>
                <h1>Consultorio de: '.$consultorio["nombre"].'</h1>
            ';

        ?>
        
        
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <!-- THE CALENDAR -->
              <div id="calendar"></div>
        </div>
    </section>
</div>

<div class="modal fade" rol="dialog" id="CitaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <?php
                            // Obtener datos del doctor
                            $columna = "id";
                            $valor = substr($_GET["url"], 16); // Asegurarse de obtener el valor correcto
                            $resultadoDoctor = DoctoresC::DoctorC($columna, $valor);  // Información del doctor
                            
                            // Mostrar los datos del doctor (solo los necesarios)
                            echo '
                            <div class="form-group">
                                <h2>Nombre del Doctor:</h2>
                                <input type="text" class="form-control input-lg" name="nyaD" value="'.$resultadoDoctor["nombre"].' '.$resultadoDoctor["apellido"].'" readonly>
                                <input type="hidden" name="Did" value="'.$resultadoDoctor["id"].'">
                            </div>
                            ';

                            // Consultorio asociado al doctor
                            $columna = "id";
                            $valor = $resultadoDoctor["id_consultorio"];
                            $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
                            echo '
                            <div class="form-group">
                                <input type="hidden" name="Cid" value="'.$consultorio["id"].'">
                            </div>
                            ';
                        ?>
                        
                        <!-- Seleccionar Paciente -->
                        <div class="form-group">
                            <h2>Seleccionar Paciente:</h2>
                            <select class="form-control input-lg" name="nombreP" id="pacienteSelect" onchange="cargarDatosPaciente()">
                                <option value="">Paciente...</option>
                                <?php
                                    // Obtener la lista de pacientes para seleccionar
                                    $columna = null;
                                    $valor = null;
                                    $resultadoPacientes = PacientesC::VerPacientesC($columna, $valor);

                                    foreach ($resultadoPacientes as $key => $value) {
                                        echo '
                                        <option value="'.$value["id"].'" data-nombre="'.$value["nombre"].' '.$value["apellido"].'" data-documento="'.$value["documento"].'">'.$value["documento"].' - '.$value["nombre"].' '.$value["apellido"].'</option>
                                        ';
                                    }
                                ?> 
                            </select>
                        </div>

                        <!-- Datos del paciente seleccionado -->
                        <div class="form-group">
                            <h2>Nombre del Paciente:</h2>
                            <input type="text" class="form-control input-lg" name="nyaC" id="nombrePaciente" value="" readonly>
                            <input type="hidden" name="Pid" id="pacienteId" value="">
                        </div>

                        <div class="form-group">
                            <h2>Documento del Paciente:</h2>
                            <input type="text" class="form-control input-lg" name="documentoP" id="documentoPaciente" value="">
                        </div>

                        <div class="form-group">
                            <h2>Fecha:</h2>
                            <input type="text" class="form-control input-lg" id="fechaC" name="fechaC" value="" readonly>
                        </div>

                        <div class="form-group">
                            <h2>Hora:</h2>
                            <input type="text" class="form-control input-lg" id="horaC" name="horaC" value="" readonly>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>
                            <input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>
                        </div>

                        <?php
                            $columna = "id";
                            $valor = $resultadoDoctor["id_consultorio"];

                            $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
                            echo '
                            <div class="form-group">
                                <input type="hidden" name="Cid" value="'.$consultorio["id"].'">
                            </div>
                            ';

                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pedir Cita</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>

                <?php
                    // Enviar la cita a la base de datos (por ejemplo, CitasC->EnviarCitaC() o similar)
                    $enviarC = new citasC();
                    $enviarC -> PedirCitaSecretariaC();
                ?>
            </form>
        </div>
    </div>
</div>

<script>
// Función para cargar los datos del paciente seleccionado
function cargarDatosPaciente() {
    var select = document.getElementById('pacienteSelect');
    var selectedOption = select.options[select.selectedIndex];
    
    var pacienteNombre = selectedOption.getAttribute('data-nombre');
    var pacienteDocumento = selectedOption.getAttribute('data-documento');
    var pacienteId = selectedOption.value;

    // Asignar los valores a los campos correspondientes
    document.getElementById('nombrePaciente').value = pacienteNombre;
    document.getElementById('documentoPaciente').value = pacienteDocumento;
    document.getElementById('pacienteId').value = pacienteId;
}
</script>

