<?php
$error_formulario = true;

function esta_en_array($valor, $arr)
{
    $encontrado = false;
    for ($i = 8; $i < count($arr); $i++) {

        if ($arr[$i] == $valor)
            $encontrado = true;
    }
}


if (isset($_POST["btnEnviar"])) {

    $error_nombre = $_POST["nombre"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_formulario = $error_nombre  || $error_sexo;
}

if (isset($_POST["btnEnviar"]) && !$error_formulario) {

    //require "vistas/vista_respuesta.php";
    $nacido[0] = "Málaga";
    $nacido[1] = "Sevilla";
    $nacido[2] = "Cádiz";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi primera página PHP</title>
    </head>

    <body>
        <h1> Datos recibidos </h1>
        <p>
            <strong> El nombre enviado ha sido : </strong> <?php echo $_POST["nombre"];  ?>
        </p>
        <p> <strong> Ha nacido en : </strong> <?php echo $nacido[$_POST["nacido"]]; ?> </p>
        <p> <strong> El sexo es : </strong> <?php echo $_POST["sexo"]; ?> </p>
        <?php
        if (isset($_POST["aficiones"])) {

            $n_aficiones = count($_POST["aficiones"]);
            if ($n_aficiones > 1) {

                echo "<p><strong>Las aficiones seleccionadas han sido: </strong></p>";
            } else {

                echo "<p><strong>La afición seleccionada han sido: </strong></p>";
            }
            echo "<ol>";
            for ($i = 0; $i < $n_aficiones; $i++) {
                echo "<li>" . $_POST["aficiones"][$i] . "</li>";
            }
            echo "</ol>";
        } else {
            echo "<p><strong>No has seleccionado ninguna afición</strong></p>";
        }
        if ($_POST["comentarios"]=="") {
            echo "<p><strong>No ha hecho ningún comentario</strong></p>";
        } else {
            echo "<p><strong>Los comentarios realizados han sido:</strong>" . $_POST["comentarios"] . "</p>";
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mi primera página PHP</title>
        </head>

        <body>

            <!--Comienzo formulario-->
            <form method="post" action="index.php" enctype="multipart/form-data">

                <!--Título-->
                <h3>Esta es mi super página</h3>

                <!--Nombre-->
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"] ?>">
                <?php
                if (isset($_POST["nombre"]) && $error_nombre)
                    echo "<span class='error'>*Campo Obligatorio*</span>";
                ?>

                <br />

                <!--Nacido en-->
                <label for="nacido">Nacido en:</label>
                <select name="nacido" id="nacido">
                    <option value="0">Malaga</option>
                    <option value="1" <?php if (isset($_POST["nacido"]) && $_POST["nacido"] == "sevilla") echo "selected"; ?>>Sevilla</option>
                    <option value="2" <?php if (isset($_POST["nacido"]) && $_POST["nacido"] == "cadiz") echo "selected"; ?>>Cadiz</option>
                </select>

                <br />

                <!--Sexo-->
                Sexo:
                <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" value="hombre" id="hombre" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "hombre") echo "checked"; ?>>
                <label for="mujer"> Mujer</label>
                <input type="radio" name="sexo" value="mujer" id="mujer" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "mujer") echo "checked"; ?>>

                <?php
                if (isset($_POST["btnEnviar"]) && $error_sexo) {
                    echo "<span class = 'error'>*Debes marcar una opción*</span>";
                }


                ?><br />

                <!--Aficiones-->
                <p>
                    Aficiones:
                    <label for="deportes">Deportes</label>
                    <input type="checkbox" name="aficiones[]" id="deportes" value="Deportes" <?php if (isset($_)) ?>>
                    <label for="lectura">Lectura</label>
                    <input type="checkbox" name="aficiones[]" id="lectura" value="Lectura">
                    <label for="otros">Otros</label>
                    <input type="checkbox" name="aficiones[]" id="otros" value="Otros">

                </p>

                <br />

                <!--Comentarios-->
                <label for="comentarios">Comentarios:</label><textarea name="comentarios" id="comentarios" rows="4"><?php if (isset($_POST["comentarios"])) {
                                                                                                                        echo $_POST["comentarios"];
                                                                                                                    } ?></textarea>

                <br />

                <!--Boton Enviar-->
                <button type="submit" name="btnEnviar">Enviar</button>


            </form>
        </body>

        </html>

    <?php
    }

    ?>