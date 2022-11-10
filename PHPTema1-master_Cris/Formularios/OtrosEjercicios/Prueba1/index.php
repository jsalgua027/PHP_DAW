<!DOCTYPE html>
<html lang="es">

<head>
    <title>Prueba1</title>
    <meta charset="UTF-8" />
</head>

<body>
    <?php
        echo "<h1>Esta es mi primera web DWESE</h1>";
        
        //Así se declaran las variables
        $a = 8;
        $b = 7;

        //Ejemplos de matemáticas
        //Es igual que en el Java hasta la división, multiplicacióny el resto.
        echo "<p>El resultado de sumar 8 y 7 es: ".($a+$b)."</p>";
        echo "<p>El resultado de restar 8 y 7 es: ".($a-$b)."</p>";

    ?>
    <h2>Y ahora más códigos</h2>
    <?php
        
        echo "<p>El resultado de multiplicar 8 y 7 es: ".($a*$b)."</p>";
        echo "<p>Concateno dos variables numéricas: ".$a.$b."</p>"

    ?>
</body>

</html>