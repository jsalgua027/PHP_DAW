<?php
if (isset($_POST["btnComparar"])) {

    $error_texto = $_POST["texto"] == "" || strlen($_POST["texto"]) < 3;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio3</title>
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
        <h2>Unifica separador decimal - Formulario</h2>
        <form action="Ejercicio7.php" method="post" enctype="multipart/form-data">
            <p>Escribe varios números separados por espacios y unificaré el separador decimal a puntos</p>
            <p><label for="text">Números: </label>
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
            <p><button type="submit" name="btnComparar">Convertir</button></p>
        </form>
    </div>
    <?php
    if (isset($_POST["btnComparar"]) && !$error_texto) {

        $texto = str_replace(",", ".", $_POST["texto"]);
       
        $texto = strtolower($texto);

        echo "<div class='respuesta'>";
        echo "<h2>Unifica separador decimal - Resultado</h2>";

        echo "<p>Números originales <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_POST["texto"] . "<br/> Números corregidos:<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $texto . "</p>";

        echo "</div>";
    }
    ?>

</body>

</html>