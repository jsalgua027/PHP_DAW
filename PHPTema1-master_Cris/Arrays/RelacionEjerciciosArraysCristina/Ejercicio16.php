<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>

<body>

    <?php
    $numeros = array(5 => 1, 12 => 2, 13 => 56, "x" => 42);
    echo "<h3>ARRAY POR CONSOLA</h3><p>";
    for ($i = 0; $i < 300; $i++) {
        if (!empty($numeros[$i])) {
            echo $numeros[$i] . ", ";
        }
    }
    echo "<br/>El contador del array da: " . count($numeros) . "</p>";
    echo "<h3>ARRAY POR CONSOLA SIN EL 5</h3><p>";
    unset($numeros[5]);
    for ($i = 0; $i < 300; $i++) {
        if (!empty($numeros[$i])) {
            echo $numeros[$i] . ", ";
        }
    }
    echo "</p>";
    echo "<h3>ARRAY POR CONSOLA ELIMNANDO TODO</h3><p>";
    unset($numeros[12], $numeros[13], $numeros["x"]);
    for ($i = 0; $i < 300; $i++) {
        if (!empty($numeros[$i])) {
            echo $numeros[$i] . ", ";
        }
    }
    echo "</p>";
    ?>

</body>

</html>