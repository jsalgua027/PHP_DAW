<?php

const VALOR = array("M" => 1000, "D" => 500, "C" => 100, "L" => 50, "X" => 10, "V" => 5, "I" => 1);

function es_romano_correcto($texto)
{

    return letras_bien($texto) && orden_bueno($texto) && repite_bien($texto);
}

function letras_bien($texto)
{

    $bien = true;
    for ($i = 0; $i < strlen($texto); $i++) {
        if (!isset(VALOR[$texto[$i]])) {
            $bien = false;
            break;
        }
    }

    return $bien;
}


function orden_bueno($texto)
{

    $correcto = true;
    for ($i = 0; $i < strlen($texto) - 1; $i++) {
        if (VALOR[$texto[$i]] < VALOR[$texto[$i + 1]]) {
            $correcto = false;
            break;
        }
    }
    return $correcto;
}

function repite_bien($texto)
{

    $veces["M"] = 4;
    $veces["D"] = 1;
    $veces["C"] = 4;
    $veces["L"] = 1;
    $veces["X"] = 4;
    $veces["V"] = 1;
    $veces["I"] = 4;

    $correcto = true;
    for ($i = 0; $i < strlen($texto); $i++) {
        $veces[$texto[$i]]--;
        if ($veces[$texto[$i]] == -1) {
            $correcto = false;
            break;
        }
    }
    return $correcto;
}


if (isset($_POST["btnComparar"])) {
    $error_texto1 = $_POST["texto1"] == "" || !es_romano_correcto(strtoupper($_POST["texto1"]));
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio4 String</title>
    <meta charset="UTF-8" />
    <style>
        .formulario {
            background-color: lightblue;
            border: 2px solid black;
        }

        .respuesta {
            background-color: lightgreen;
            border: 2px solid black;
            margin-top: 2em
        }

        h2 {
            text-align: center
        }

        form,
        .respuesta p {
            margin-left: 2em
        }
    </style>
</head>

<body>
    <div class="formulario">
        <h2>Romanos a árabe -Formulario</h2>
        <form action="Ejercicio4.php" method="post">
            <p>Dime un número en números romanos y lo convertiré a árabe</p>
            <p><label for="texto1">Número </label>
                <input type="text" name="texto1" id="texto1" value="<?php if (isset($_POST["texto1"])) echo $_POST["texto1"]; ?>" />
                <?php
                if (isset($_POST["btnComparar"]) && $error_texto1) {
                    if ($_POST["texto1"] == "")
                        echo " * Campo Vacío * ";
                    else
                        echo "No has escrito un número romano correcto";
                }

                ?>
            </p>

            <p><button type="submit" name="btnComparar">Comparar</button></p>
        </form>
    </div>

    <?php
    if (isset($_POST["btnComparar"]) && !$error_texto1) {



        $texto = strtoupper($_POST["texto1"]);
        $resultado = 0;
        for ($i = 0; $i < strlen($_POST["texto1"]); $i++)
            $resultado += VALOR[$texto[$i]];


        echo "<div class='respuesta'>";
        echo "<h2>Romanos a árabe - Resultado</h2>";
        echo "<p>El número romano <strong>" . $_POST["texto1"] . "</strong> es igual a <strong>" . $resultado . "</strong> en árabe</p>";
        echo "</div>";
    }
    ?>
</body>

</html>