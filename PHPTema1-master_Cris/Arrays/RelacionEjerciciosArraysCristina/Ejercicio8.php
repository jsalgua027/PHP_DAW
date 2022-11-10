<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    echo "<ul>";
    $array = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

    for ($i = 0; $i < count($array); $i++) {
        echo "<li>" . $array[$i] . "</li>";
    }

    echo "</ul>";
    ?>
</body>

</html>