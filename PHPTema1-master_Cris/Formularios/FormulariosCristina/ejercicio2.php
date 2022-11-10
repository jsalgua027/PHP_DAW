<?php
if (isset($_POST["btnGuardar"])) {

    //Compruebo errores tras hacer submit
    $error_cant = $_POST["cant"] == "" || !is_numeric($_POST["cant"]) || $_POST["cant"] < 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>

<body>
    <form method="post" action="ejercicio2.php">

        <select name="opcion">
            <option value="cocacola">Coca Cola</option>
            <option value="pepsi">Pepsi Cola</option>
            <option value="fanta">Fanta Naranja</option>
            <option value="trina">Trina Manzana</option>
        </select>
        <br />

        <label for="cant">Cantidad</label>
        <br />
        <input type="text" id="cant" name="cant">

        <?php
        //Si está vacío o sale un error te dice que el campo está vacío
        if (isset($_POST["cant"]) && $error_cant) {
            echo "<span class='error'><strong>*Campo Vacío*</strong></span>";
        }

        //Si está vacío la cantidad es 0
        if (!isset($_POST["cant"]) || $error_cant) {
            $cantidad = 0;
        } else {
            $cantidad = $_POST["cant"];
        }

        //Si la opción no ha sido seleccionada se entiende que es coca cola
        if (!isset($_POST["opcion"]) || $error_cant) {
            $_POST["opcion"] = "cocacola";
        } else {
            switch ($_POST["opcion"]) {
                case "cocacola":
                    echo "<p>El precio total es de: " . ($cantidad * 1) . "€";
                    break;
                case "pepsi":
                    echo "<p>El precio total es de: " . ($cantidad * 0.80) . "€";
                    break;
                case "fanta":
                    echo "<p>El precio total es de: " . ($cantidad * 0.90) . "€";
                    break;
                case "trina":
                    echo "<p>El precio total es de: " . ($cantidad * 1.20) . "€";
                    break;
            }
        }
        ?>
        <p>
            <button type="submit" name="btnGuardar">Guardar Cambios</button>
        </p>
    </form>
</body>

</html>