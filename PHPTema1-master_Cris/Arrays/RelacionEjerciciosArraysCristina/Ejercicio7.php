<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php

    $array = array("MD"=>"Madrid", "BC"=> "Barcelona", "LD"=>"Londres", "NY"=>"New York", "LA"=>"Los Ángeles", "CG"=>"Chicago");
    foreach ($array as $indice => $ciudad) {
        echo "<p>la ciudad con índice " . $indice . " es " . $ciudad . "</p>";
    }

    ?>
</body>

</html>