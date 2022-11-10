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
        <h2>Frases palíndromas - Formulario</h2>
        <form action="Ejercicio3.php" method="post" enctype="multipart/form-data">
            <p>Dime una frase y te diré si es palíndroma o no</p>
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

        $texto = str_replace(" ", "", $_POST["texto"]);
        $texto = str_replace(";", "", $texto);
        $texto = str_replace(":", "", $texto);
        $texto = str_replace(",", "", $texto);
        $texto = str_replace(".", "", $texto);
        $texto = strtolower($texto);

        echo "<div class='respuesta'>";
        echo "<h2>Frases palíndromas / Resultado</h2>";

        if ($texto == strrev($texto)) {

            echo "<p>La frase " . $texto . " es palíndroma</p>";
        } else {

            echo "<p>La frase " . $texto . " no es palíndroma</p>";
        }
        echo "</div>";
    }
    ?>

</body>

</html>