<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>

<body>
    <?php
    $array_animales = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $array_numeros = array("12", "34", "45", "52", "12");
    $array_random = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");

    $array_total = array_merge($array_animales, $array_numeros, $array_random);
    for($i=0; $i<=count($array_total);$i++){
        echo "<p>".$array_total[$i]."</p>";
    }

    ?>
</body>

</html>