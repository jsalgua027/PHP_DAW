<?php
$error_formulario = true;
if (isset($_GET["btnGuardar"])) {

    //Compruebo errores tras hacer submit
    $error_nombre = $_GET["nombre"] == "";
    $error_apellidos = $_GET["ape"] == "";

    $error_formulario = $error_nombre || $error_apellidos;
}
if (isset($_GET["btnGuardar"]) && !$error_formulario) {
    require "recibir_datos.php";
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>

    <body>
        <form method="get" action="index.php">
            <label for="nombre">Nombre: </label>
            <br />
            <!--No dejar espacios entre "" y la etiqueta <?php ?> porque si no deja el espacio y pone el código que pongamos dentro-->
            <input type="text" id="nombre" name="nombre" value="<?php
                                                                if (isset($_GET["nombre"])) {
                                                                    echo $_GET["nombre"];
                                                                }

                                                                ?>">

            <?php
            if (isset($_GET["nombre"]) && $error_nombre) {
                echo "<span class='error'></strong>*Campo Vacío*<strong></span>";
            }
            ?>

            <br />

            <label for="ape">Apellidos </label>
            <br />
            <input type="text" id="ape" name="ape">

            <?php
            if (isset($_GET["ape"]) && $error_apellidos) {
                echo "<span class='error'><strong>*Campo Vacío*</strong></span>";
            }
            ?>
            <p>
                <button type="submit" name="btnGuardar">Guardar Cambios</button>
            </p>
        </form>
    </body>

    </html>
<?php
}

?>