<?php

$error_formulario = true;
if (isset($_GET["btnGuardar"])) {

    //Compruebo errores tras hacer submit
    $error_nombre = $_GET["nombre"] == "";
    $error_apellidos = $_GET["ape"] == "";
    $error_contrasenia = $_GET["contra"] == "";
    $error_dni = $_GET["dni"] == "";
    $error_sexo = !isset($_GET["hm"]);
    $error_cometarios = $_GET["coments"] == "";

    $error_formulario = $error_nombre || $error_apellidos || $error_contrasenia || $error_dni || $error_sexo || $error_comentarios;
}

if (!$error_formulario) {
    require "recibir_datos.php";
} else {

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Prueba1</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-with, initial-scale=1.0">
    </head>

    <body>
        <h2>Rellena tu CV</h2>

        <!--Formulario-->
        <form method="get" action="recibir_datos.php" enctype="multipart/form-data">

            <!--Datos Básicos-->
            <p>
                <label for="nombre">Nombre: </label>
                <br />
                <!--No dejar espacios entre "" y la etiqueta <?php ?> porque si no deja el espacio y pone el código que pongamos dentro-->
                <input type="text" id="nombre" name="nombre" value="<?php
                                                                    if (isset($_GET["nombre"])) {
                                                                        echo $_GET["nombre"];
                                                                    }

                                                                    ?>" size="40">

                <?php
                if (isset($_GET["nombre"]) && $error_nombre) {
                    echo "<span class='error'>Campo Vacío</span>";
                }
                ?>

                <br />

                <label for="ape">Apellidos </label>
                <br />
                <input type="text" id="ape" name="ape" size="80">

                <?php
                if (isset($_GET["ape"]) && $error_apellidos) {
                    echo "<span class='error'>Campo Vacío</span>";
                }
                ?>

                <br />

                <label for="contra">Contraseña </label>
                <br />
                <input type="password" id="contra" name="contra" size="40">

                <?php
                if (isset($_GET["contra"]) && $error_contrasenia) {
                    echo "<span class='error'>Campo Vacío</span>";
                }
                ?>

                <br />

                <label for="dni">DNI </label>
                <br />
                <input type="text" id="dni" name="dni" size="80">
                <br />

                <!--Sexo-->
                <label>Sexo:</label>
                <br />
                <input type="radio" name="hm" id="hombre" value="Hombre" /><label for="hombre">Hombre</label>
                <br />
                <input type="radio" name="hm" id="mujer" value="Mujer" /><label for="mujer"> Mujer </label>
                <br />

                <!--Archivos-->
                <label for="foto"> Incluir mi foto </label>
                <input type="file" name="foto" id="foto" accept="image/*" value="Seleccionar archivo">
                <br />

                <!--Lugar de nacimiento-->
                <label for="ciudad">Lugar de Nacimiento</label>
                <select id="ciudad" name="ciudad">
                    <optgroup label="Ciudades">
                        <option value="malaga" selected="selected">Málaga</option>
                        <option value="sevilla">Sevilla</option>
                        <option value="madrid">Madrid</option>
                        <option value="otro">Otro</option>
                    </optgroup>
                </select>
                <br />

                <!--Área de texto-->
                <label for="coments"> Comentarios: </label>
                <textarea name="coments" id="coments" rows="10" cols="50"></textarea>
            </p>

            <!--CheckBox-->
            <p><input type="checkbox" name="sus" id="sus" /><label for="sus">Suscribirse al boletín de novedades</label></p>

            <!--Botones-->
            <p>
                <button type="submit" name="btnGuardar">Guardar Cambios</button>
                <button type="reset">Borrar los datos introducidos</button>
                <!--
            <input type="submit" value="Guardar Cambios">
            <input type="reset" value="Borrar los datos introducidos">
            -->
            </p>
        </form>
    </body>

    </html>
<?php
}

?>