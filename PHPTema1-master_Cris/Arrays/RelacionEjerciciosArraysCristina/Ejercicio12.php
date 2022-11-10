<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>

    <?php
    $array_animales = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $array_numeros = array("12", "34", "45", "52", "12");
    $array_random = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");
    $array_total = array();
    for ($i = 0; $i < count($array_animales); $i++) {
        array_push($array_total, $array_animales[$i]);
    }
    for ($i = 0; $i < count($array_numeros); $i++) {
        array_push($array_total, $array_numeros[$i]);
    }
    for ($i = 0; $i < count($array_random); $i++) {
        array_push($array_total, $array_random[$i]);
    }

    for ($i = 0; $i < count($array_total); $i++) {
        echo "<p>" . $array_total[$i] . "</p>";
    }

    ?>

</body>

</html>