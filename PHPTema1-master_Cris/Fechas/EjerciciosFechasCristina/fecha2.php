<?php
if (isset($_POST["btnCalcular"])) {

    $error_fecha1 = !checkdate($_POST["mes1"], $_POST["dia1"], $_POST["anio1"]);
    $error_fecha2 = !checkdate($_POST["mes2"], $_POST["dia2"], $_POST["anio2"]);
    $errores_fecha = $error_fecha1 || $error_fecha2;
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
        <form action="fecha2.php" method="post">
            <p>Dime dos fechas y te daré los dias de diferencia entre ellas</p>
            <p><label>Introduzca una fecha:</label></p>
            <p><label for="dia1">Día: </label>
                <select name="dia1" id="dia1">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {


                        if (isset($_POST["btnCalcular"]) && $_POST["dia1"] == $i) {
                            if ($i <= 9) {
                                echo "<option selected value='" . $i . "'>0" . $i . "</option>";
                            } else {

                                echo "<option selected value='" . $i . "'>" . $i . "</option>";
                            }
                        } else {
                            if ($i <= 9) {
                                echo "<option value='" . $i . "'>0" . $i . "</option>";
                            } else {

                                echo "<option value='" . $i . "'>" . $i . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <label for="mes1">Mes: </label>
                <select name="mes1" id="mes1">
                    <?php
                    $meses = array(
                        "ª", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    );

                    for ($i = 1; $i < count($meses); $i++) {

                        if (isset($_POST["btnCalcular"]) && $_POST["mes1"] == $i) {

                            echo "<option selected value='" . $i . "'>" . $meses[$i] . "</option>";
                        } else {

                            echo "<option value='" . $i . "'>" . $meses[$i] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="anio1">Año: </label>
                <select name="anio1" id="anio1">
                    <?php
                    $anioAct = date("Y");


                    for ($i = 50; $i >= 0; $i--) {

                        if (isset($_POST["btnCalcular"]) && $_POST["anio1"] == $i) {

                            echo "<option selected value='" . $anioAct - $i . "'>" . $anioAct - $i . "</option>";
                        } else {

                            echo "<option value='" . $anioAct - $i . "'>" . $anioAct - $i . "</option>";
                        }
                    }
                    ?>
                </select>
            </p>
            <p><label>Introduzca otra fecha:</label></p>
            <p><label for="dia2">Día: </label>
                <select name="dia2" id="dia2">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {

                        if (isset($_POST["btnCalcular"]) && $_POST["dia2"] == $i) {
                            if ($i <= 9) {
                                echo "<option selected value='" . $i . "'>0" . $i . "</option>";
                            } else {

                                echo "<option selected value='" . $i . "'>" . $i . "</option>";
                            }
                        } else {
                            if ($i <= 9) {
                                echo "<option value='" . $i . "'>0" . $i . "</option>";
                            } else {

                                echo "<option value='" . $i . "'>" . $i . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <label>Mes: </label>
                <select name="mes2" id="mes2">
                    <?php
                    $meses = array(
                        "ª", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    );


                    for ($i = 1; $i < count($meses); $i++) {

                        if (isset($_POST["btnCalcular"]) && $_POST["mes2"] == $i) {

                            echo "<option selected value='" . $i . "'>" . $meses[$i] . "</option>";
                        } else {

                            echo "<option value='" . $i . "'>" . $meses[$i] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="anio2">Año: </label>
                <select name="anio2" id="anio2">
                    <?php
                    $anioAct = date("Y");


                    for ($i = 50; $i >= 0; $i--) {

                        if (isset($_POST["btnCalcular"]) && $_POST["anio2"] == $i) {

                            echo "<option selected value='" . $anioAct - $i . "'>" . $anioAct - $i . "</option>";
                        } else {

                            echo "<option value='" . $anioAct - $i . "'>" . $anioAct - $i . "</option>";
                        }
                    }
                    ?>
                </select>
            </p>


            <p><button type="submit" name="btnCalcular">Calcular</button></p>
        </form>
    </div>

    <?php
    if (isset($_POST["btnCalcular"]) && !$errores_fecha) {

        $seg1 = mktime(0, 0, 0, $_POST["mes1"], $_POST["dia1"], $_POST["anio1"]);
        $seg2 = mktime(0, 0, 0, $_POST["mes2"], $_POST["dia2"], $_POST["anio2"]);

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