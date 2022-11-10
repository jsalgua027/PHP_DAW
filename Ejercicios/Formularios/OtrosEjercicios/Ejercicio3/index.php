<?php
if (isset($_GET["btnGuardar"])) {
    require "vista/vista_formulario.php"; //Si da fallos o lo que sea no conitnúa(se recomienda más).
} else {
    include "vista/vista_respuesta.php"; //Si da fallos o lo que sea continúa con la ejecución
}
?>