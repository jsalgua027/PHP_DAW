<?php
$error_formulario = true;
if (isset($_POST["btnReset"])) {
    header("Location:index.php");
    exit;
}
if (isset($_POST["guardar"])) {
    $error_nombre = $_POST["nombre"] == "";
    $error_apellido = $_POST["apellido"] == "";
    $error_contraseña = $_POST["contraseña"] == "";
    $error_dni = $_POST["dni"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_comentarios = $_POST["comentarios"] == "";
    $error_formulario = $error_nombre || $error_apellido || $error_contraseña || $error_dni || $error_sexo || $error_comentarios;
}
if (isset($_POST["btnGuardar"]) && !$error_formulario) {
    require "vistas/vista_respuesta.php";
} else {
?>
    <DOCTYPE html>
        <html lang="es">

        <head>
            <title>Formulario</title>
            <meta charset="UTF-8" />
        </head>

        <body>
            <form method="post" action="index.php" enctype="multipart/form-data">
                <h2>Rellena tu CV</h2>
                <label for="nombre">Nombre:</label><br />
                <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"] ?>">
                <?php
                if (isset($_POST["nombre"]) && $error_nombre)
                    echo "<span class='error'>*Campo Vacío*</span>";
                ?>

                <br />

                <label for="apellido">Apellido:</label><br />
                <input type="text" name="apellido" id="apellido" size="40" value="<?php if (isset($_POST["apellido"])) echo $_POST["apellido"] ?>">
                <?php
                if (isset($_POST["apellido"]) && $error_nombre)
                    echo "<span class='error'>*Campo Vacío*</span>";
                ?>

                <br />

                <label for="contraseña">Contraseña:</label><br />
                <input type="password" name="contraseña" id="contraseña" value="<?php if (isset($_POST["contraseña"])) echo $_POST["contraseña"] ?>">
                <?php
                if (isset($_POST["contraseña"]) && $error_nombre)
                    echo "<span class='error'>*Campo Vacío*</span>";
                ?>

                <br />

                <label for="dni">DNI:</label><br />
                <input type="text" name="dni" id="dni" size="15" value="<?php if (isset($_POST["dni"])) echo $_POST["dni"] ?>">
                <?php
                if (isset($_POST["dni"]) && $error_nombre)
                    echo "<span class='error'>*Campo Vacío*</span>";
                ?>

                <br />
                Sexo<br />
                <input type="radio" name="sexo" value="hombre" id="hombre" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "hombre") echo "checked"; ?>> <label for="hombre">Hombre</label></br>
                <input type="radio" name="sexo" value="mujer" id="mujer" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "mujer") echo "checked"; ?>><label for="mujer"> Mujer</label></br>

                <p>Incluir mi foto:
                    <input type="file" name="foto" accept="image/">
                </p>

                <label for="nacido">Nacido en:</label>
                <select name="nacido" id="nacido">
                    <option value="malaga">Malaga</option>
                    <option value="sevilla" <?php if (isset($_POST["nacido"]) && $_POST["nacido"] == "sevilla") echo "selected"; ?>>Sevilla</option>
                    <option value="cadiz" <?php if (isset($_POST["nacido"]) && $_POST["nacido"] == "cadiz") echo "selected"; ?>>Cadiz</option>
                </select>
                <br />

                <label for="comentarios">Comentarios:</label><textarea name="comentarios" id="comentarios" rows="4"><?php if (isset($_POST["comentarios"])) {
                                                                                                                        echo $_POST["comentarios"];
                                                                                                                    } ?></textarea>
                <?php
                if (isset($_POST["comentarios"]) && $error_comentarios) {
                    echo "<span class='error'>Campo Vacío</span>";
                }
                ?>

                <br />

                <p><input type="checkbox" name="suscripcion" id="suscripcion">
                    <label for="suscripcion">Suscribirme al boletin de Novedades </label>
                </p>

                <button type="submit" name="guardar">Guardar cambios</button>
                <input type="submit" name="btnReset" value="Borrar datos introducidos">


            </form>
        </body>

        </html>
    <?php
}

    ?>