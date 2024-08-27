<?php
    if($_SESSION["rol"] != "Secretaria"){
        echo '<script>
            window.location = "inicio";
        </script>';
        return;
    }
    

?>