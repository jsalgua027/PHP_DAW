<?php
if (isset($_POST["btnEnviar"])) {

    $error_num = $_POST["num"] == "" || !is_numeric($_POST["num"])
        || $_POST["num"] > 10 || $_POST["num"] < 1;

    $error_num1 = $_POST["num1"] == "" || !is_numeric($_POST["num1"])
        || $_POST["num1"] > 10 || $_POST["num1"] < 1;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio3</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1></h1>
    <form action="ejercicio3.php" method="POST" enctype="multipart/form-data">
        <p><label for="num">Introduce un número del 1 al 10(n)</label>
            <input type="text" name="num" id="num" value="<?php if (isset($_POST["num"])) echo $_POST["num"] ?>" size="5" />
        </p>
        <?php
        if (isset($_POST["btnEnviar"]) && $error_num) {

            if ($_POST["num"] == "") {

                echo "<span class='error'>*Campo obligatorio</span>";
            } else {

                echo "<span class='error'>Numero no válido</span>";
            }
        }
        ?>
        <p><label for="num1">Introduce un número del 1 al 10(m)</label>
            <input type="text" name="num1" id="num1" value="<?php if (isset($_POST["num1"])) echo $_POST["num1"] ?>" size="5" />
        </p>
        <?php
        if (isset($_POST["btnEnviar"]) && $error_num1) {

            if ($_POST["num1"] == "") {

                echo "<span class='error1'>*Campo obligatorio</span>";
            } else {

                echo "<span class='error1'>Numero no válido</span>";
            }
        }
        ?>
        <p><button type="submit" name="btnEnviar">Leer</button></p>
    </form>

    <?php
    if (isset($_POST["btnEnviar"]) && !$error_num &&  !$error_num1) {

        @$fd = fopen("Tablas/tabla_" . $_POST["num"] . ".txt", "r");
        if (!$fd) {

            die("<p>No se ha podido leer el fichero Tablas/tabla_" . $_POST["num"] . ".txt</p>");
        }

        $contador = 0;

        while ($linea = fgets($fd)) {

            $contador++;
            if ($contador == $_POST["num1"]) {

                echo "<p>" . $linea . "</p>";
            }
        }

        echo "<h3>Archivo leido con éxito: tabla_" . $_POST["num"] . ".txt, linea " . $_POST["num1"] . "</h3>";
    }
    ?>
</body>

</html>