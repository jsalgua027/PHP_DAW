<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>

<body>
    <?php
    $array[0] = 1;
    $array[1] = 2;
    $array[2] = 3;
    $array[3] = 4;
    $array[4] = 5;
    $array[5] = 6;
    $array[6] = 7;
    //Preguntar por qué no va con otra definición de $array = array(1,2,3,4,5,6,7);

    //Declaramos e inicializamos
    $array_pares = array();
    $array_impares = array();
    $sumatorio = 0;

    for ($i = 0; $i < count($array); $i++) {

        if ($array[$i] % 2 == 0) {

            array_push($array_pares, $array[$i]);
        } else {

            array_push($array_impares, $array[$i]);
        }
    }


    //Para mostrar por pantalla
    echo "<h1>Pares</h1>";
    for ($i = 0; $i < count($array_pares); $i++) {
        $sumatorio += $array_pares[$i];
    }
    $media = $sumatorio/count($array_pares);
    echo "<p>La media de los números pares es: ".$media . "</p>";

    echo "<br/><h1>Impares</h1>";
    for ($i = 0; $i < count($array_impares); $i++) {
        echo "<p>" . $array_impares[$i] . "</p>";
    }

    ?>
</body>

</html>