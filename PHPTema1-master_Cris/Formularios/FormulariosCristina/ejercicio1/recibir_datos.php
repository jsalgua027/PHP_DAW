<?php
//Con isset queremos comprobar si lo que sea está inicializado
if (isset($_GET["btnGuardar"])) {



?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actividad 1- Recepción de datos</title>
    </head>


    <body>
        <h1>Recibiendo los datos del Formulario</h1>
        <?php
        echo "<p><strong>Nombre:</strong>" . $_GET["nombre"] . "</p>";
        echo "<p><strong>Apellidos:</strong>" . $_GET["ape"] . "</p>";
        ?>
    </body>

    </html>
<?php
} else {
    //Si no existen los datos te va a mandar a esa página
    header("Location: index.php");
}
?>