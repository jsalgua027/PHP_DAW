<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio 6</title>
    <meta charset="UTF-8" />
    <style>
        table {
            width: 90%;
            margin: 0 auto;
            text-align: center;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 6</h1>

    <form action="ejercicio6.php" method="post">
        <p>

            <?php
            @$fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
            if (!$fd) {
                die("<p>No se ha podido abrir la fuente de los datos</p>");
            }
            echo "<label for='zona'>Seleccione una Zona: </label>";
            echo "<select name='zona' id='zona'>";

            $fila = fgets($fd);
            $contador = 1;
            while ($fila = fgets($fd)) {

                $datos_fila = explode("\t", $fila);
                $array_datos = explode(",", $datos_fila[0]);
                //para quedarnos con la última parte del texto que se encuentra en el cuadrado 0
                $zona = end($array_datos);

                if (isset($_POST["zona"]) && $_POST["zona"] == $contador) {
                    echo "<option selected value='" . $contador . "'>" . $zona . "</option>";
                } else {
                    echo "<option value='" . $contador . "'>" . $zona . "</option>";
                }

                $contador++;
            }

            echo "</select>";
            fclose($fd);
            ?>

        </p>
        <button type="submit" name="btnBuscar">Buscar</button>
    </form>
    <p>

    </p>
    <?php

    if (isset($_POST["btnBuscar"])) {
        @$fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
        if (!$fd) {
            die("<p class='error'>No se ha podido abrir la fuente de los datos</p>");
        }
        echo "<table>";
        echo    "<caption>PIB per cápita de los paises de la Unión Europea</caption>";

        //Guardamos la fila en una variable
        $fila = fgets($fd);

        //Guardamos los datos separados en una variable 
        $datos_fila = explode("\t", $fila);

        $n_columns = count($datos_fila);

        echo "<tr>";
        for ($i = 0; $i < $n_columns; $i++) {
            echo "<th>" . $datos_fila[$i] . "</th>";
        }
        echo "</tr>";

        //Avanzo hasta la fila oportuna
        $i = 1;
        while ($i <= $_POST["zona"]) {
            $fila = fgets($fd);
            $i++;
        }

        //Dibujo fila oportuna
        $datos_fila = explode("\t", $fila);
        echo "<tr>";
        echo "<th>" . $datos_fila[0] . "</th>";
        for ($i = 1; $i < $n_columns; $i++) {
            if (isset($datos_fila[$i])) {
                echo "<td>" . $datos_fila[$i] . "</td>";
            } else {
                echo "<td></td>";
            }
        }
        echo "</table>";
        fclose($fd);
    }
    ?>
</body>

</html>