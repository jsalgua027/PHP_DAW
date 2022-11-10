<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <?php
    $mesPeli["Enero"] = 9;
    $mesPeli["Febrero"] = 12;
    $mesPeli["Marzo"] = 0;
    $mesPeli["Abril"] = 17;

    foreach ($mesPeli as $mes => $pelis) {
        if ($pelis != 0) {
            echo "<p> En el mes de " . $mes . " has visto " . $pelis;
            if ($pelis == 1) {
                echo "pelicula.";
            } else {
                echo "peliculas";
            }
            echo "</p>";
        }
    }
    ?>

</body>

</html>