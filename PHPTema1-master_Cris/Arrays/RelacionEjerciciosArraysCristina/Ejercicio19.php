<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>

<body>
    <?php
    //Madrid
    $pedro = array("Edad" => 20, "Teléfono" => "65347389");
    $antonio = array("Edad" => 19, "Teléfono" => "6743747899");
    $madrid = array("Pedro" => $pedro, "Antonio" => $antonio);

    //Barcelona
    $susana = array("Edad" => 28, "Teléfono" => "6474747585");
    $barcelona = array("Susana" => $susana);

    //Toledo
    $maria = array("Edad" => 32, "Teléfono" => "6474747590");
    $toledo = array("Maria" => $maria);

    //Total
    $amigos = array("Madrid" => $madrid, "Barcelona" => $barcelona, "Toledo" => $toledo);

    foreach ($amigos as $ciudad => $valores) {
        echo "<p>Amigos en " . $ciudad . "</p>";
        echo "<ol>";
        //Datos de los amigos
        foreach ($valores as $nombre => $datos) {

            echo "<li><trong>Nombre: </strong>" . $nombre . "";
            foreach ($datos as $propiedad => $valor) {
                echo "<strong>" . $propiedad . ": </strong>" . $valor . ". ";
            }
            echo "</li>";
        }
        echo "</ol>";
    }

    ?>
</body>

</html>