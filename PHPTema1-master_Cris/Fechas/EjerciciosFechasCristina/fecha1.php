<?php

function es_fecha($fecha)
{

    if (strlen($fecha) == 10) {

        $tramoDia = substr($fecha, 0, 2);
        $sep1 = substr($fecha, 2, 1);
        $tramoMes = substr($fecha, 3, 2);
        $sep2 = substr($fecha, 5, 1);
        $tramoAnio = substr($fecha, 6, 4);

        if ($sep1 != "/" || $sep2 != "/") {

            return false;
        } else {

            return checkdate($tramoMes, $tramoDia, $tramoAnio);
        }
    } else {

        return false;
    }
}

if (isset($_POST["btnCalcular"])) {
    $error_fecha1 = $_POST["fecha1"] == "" || !es_fecha($_POST["fecha1"]);
    $error_fecha2 = $_POST["fecha2"] == "" || !es_fecha($_POST["fecha2"]);
    $errores_fechas = $error_fecha1 || $error_fecha2;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio1</title>
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
        <h2>Fechas -Formulario</h2>
        <form action="fecha1.php" method="post">
            <p>Dime dos fechas y te daré los dias de diferencia entre ellas</p>
            <p><label for="fecha1">Introduzca una fecha: (DD/MM/YYYY)</label>
                <input type="text" name="fecha1" id="fecha1" value="<?php if (isset($_POST["fecha1"])) echo $_POST["fecha1"]; ?>" />
                <?php
                if (isset($_POST["btnCalcular"]) && $error_fecha1) {
                    if ($_POST["fecha1"] == "")
                        echo " * Campo Vacío * ";
                    else
                        echo "Fecha no válida";
                }

                ?>
            </p>
            <p><label for="fecha2">Introduzca una fecha: (DD/MM/YYYY)</label>
                <input type="text" name="fecha2" id="fecha2" value="<?php if (isset($_POST["fecha2"])) echo $_POST["fecha2"]; ?>" />
                <?php
                if (isset($_POST["btnCalcular"]) && $error_fecha2) {
                    if ($_POST["fecha2"] == "")
                        echo " * Campo Vacío * ";
                    else
                        echo "Fecha no válida";
                }

                ?>
            </p>

            <p><button type="submit" name="btnCalcular">Calcular</button></p>
        </form>
    </div>

    <?php
    if (isset($_POST["btnCalcular"]) && !$errores_fechas) {

        //Con el uso de explode obtengo un array y lo dividimos
        //por el valor que le pasamos que en este caso es la barra
        $fec1 = explode("/", $_POST["fecha1"]);
        $fec2 = explode("/", $_POST["fecha2"]);

        $seg1 = mktime(0, 0, 0, $fec1[1], $fec1[0], $fec1[2]);
        $seg2 = mktime(0, 0, 0, $fec2[1], $fec2[0], $fec2[2]);

        $dias = ($seg1 - $seg2) / (3600 * 24);

        $dias = abs(floor($dias));

        echo "<div class='respuesta'>";
        echo "<h2>Fechas - Resultado</h2>";
        echo "<p> Hay " . $dias . " dias de diferencia</p>";
        echo "</div>";
    }
    ?>
</body>

</html>