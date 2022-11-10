<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>

<body>

    <?php
    $estadios_futbol = array(
        "Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia"  => "Mestalla", "Real Sociedad" => "Anoeta"
    );
    echo "<table>";
    echo "<th>Estadios de fútbol</th>";
    foreach ($estadios_futbol as $ciudad => $equipo) {
        echo "<tr>";
        echo "<td>" . $ciudad . "</td>";
        echo "<td>" . $equipo . "</td>";
        echo "</tr>";
    }
    echo "<br/>";
    echo "<h3>Estadios de fútbol sin el Madrid</h3>";
    echo "<ol>";
    foreach ($estadios_futbol as $ciudad => $equipo) {

        if ($ciudad != "Real Madrid") {

            echo "<li>" . $ciudad . "</li>";
            echo "<ul><li>" . $equipo . "</li></ul>";
        }
    }
    echo "</ol>";
    echo "</table";
    ?>

</body>

</html>