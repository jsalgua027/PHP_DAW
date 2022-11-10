<?php
if (isset($_POST["btnComparar"])) {

    $error_texto = $_POST["texto"] == "" || strlen($_POST["texto"]) < 3;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio6</title>
    <meta charset="UTF-8" />
    <style>
        .formulario {
            background-color: lightblue;
            border: 2px solid black;
        }

        .respuesta {
            background-color: lightgreen;
            border: 2px solid black;
        }

        h2 {
            text-align: center;
        }

        form,
        .respuesta p {
            margin-left: 2em;
        }
    </style>
</head>

<body>
    <div class="formulario">
        <h2>Quita acentos - Formulario</h2>
        <form action="Ejercicio6.php" method="post" enctype="multipart/form-data">
            <p>Escribe un texto y le quitaré los acentos</p>
            <p><label for="text">Frase: </label>
                <input type="text" name="texto" id="text" value="<?php if (isset($_POST["texto"])) echo $_POST["texto"]; ?>" />
                <?php
                if (isset($_POST["btnComparar"]) && $error_texto) {

                    if ($_POST["texto"] == "") {

                        echo "*Campo vacío*";
                    } else {

                        echo "Mínimo 3 carácteres";
                    }
                }
                ?>
            </p>
            <p><button type="submit" name="btnComparar">Comprobar</button></p>
        </form>
    </div>
    <?php
    if (isset($_POST["btnComparar"]) && !$error_texto) {

        echo "<div class='respuesta'>";
        echo "<h2>Quita acentos - Formulario</h2>";


        //Función la cual elimina acentos
        function eliminar_acentos($cadena)
        {

            //Reemplazamos la A y a
            $cadena = str_replace(
                array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
                array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
                $cadena
            );

            //Reemplazamos la E y e
            $cadena = str_replace(
                array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
                array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
                $cadena
            );

            //Reemplazamos la I y i
            $cadena = str_replace(
                array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
                array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
                $cadena
            );

            //Reemplazamos la O y o
            $cadena = str_replace(
                array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
                array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
                $cadena
            );

            //Reemplazamos la U y u
            $cadena = str_replace(
                array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
                array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
                $cadena
            );

            //Reemplazamos la N, n, C y c
            $cadena = str_replace(
                array('Ñ', 'ñ', 'Ç', 'ç'),
                array('N', 'n', 'C', 'c'),
                $cadena
            );

            return $cadena;
        }
        echo "<p>Texto original <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_POST["texto"] . "<br/> Texto sin acentos:<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . eliminar_acentos($_POST["texto"]) . "</p>";

        echo "</div>";
    }
    ?>

</body>

</html>