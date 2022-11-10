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
    $numeros = array(3, 2, 8, 123, 5, 1);
    sort($numeros, SORT_ASC);
    echo "<h3>ARRAY ORDENADO</h3><p>";
    for ($i = 0; $i < count($numeros); $i++) {
        echo $numeros[$i] . ", ";
    }
    echo "</p>";
    ?>

</body>

</html>