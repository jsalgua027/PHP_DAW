<?php
if (isset($_POST["btnComparar"])) {

    $error_texto = $_POST["texto"] == "" || strlen($_POST["texto"]) < 3;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio2</title>
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
        <h2>Palíndromos y Capicúas - Formulario</h2>
        <form action="Ejercicio2.php" method="post" enctype="multipart/form-data">
            <p>Dime una palabra o un número y te diré si es un palíndromo o un número capicúa</p>
            <p><label for="text">Palabra o número: </label>
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

        $texto = strtolower($_POST["texto"]);

        echo "<div class='respuesta'>";
        echo "<h2>Palíndromos-Capicúas / Resultado</h2>";
        if (is_numeric($texto)) {

            if ($texto == strrev($texto)) {

                echo "<p>El número " . $texto . " es capícua</p>";
            } else {

                echo "<p>El número " . $texto . " no es capícua</p>";
            }
        } else {

            if ($texto == strrev($texto)) {

                echo "<p>El texto " . $texto . " es palíndromo</p>";
            } else {

                echo "<p>El texto " . $texto . " no es palíndromo</p>";
            }
        }
        echo "</div>";
    }
    ?>

</body>

</html>