<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <form action="ejercicio3.php" method="POST">

        <label for="numero">Cantidad de libros: </label>
        <input type="number" name="cantidad" id="numero" min="1" value="1">

        <br><br>

        <input type="submit" value="Enviar datos" name="btnEnviar">
    </form>

    <br>

    <?php
    if (isset($_POST["btnEnviar"])) {
        echo "Has pedido " . $_POST["cantidad"] . " unidades de libros<br>";
        if ($_POST["cantidad"] < 10) {
            $precioUnidad = 2;
        } else if (10 <= $_POST["cantidad"] && $_POST["cantidad"] <= 30) {
            $precioUnidad = 1.5;
        } else {
            $precioUnidad = 1;
        }
        $precioTotal = $precioUnidad * $_POST["cantidad"];
        echo "precio total: $precioTotal";
    }
    ?>
</body>

</html>