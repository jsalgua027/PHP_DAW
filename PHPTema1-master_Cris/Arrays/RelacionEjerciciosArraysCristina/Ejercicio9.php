<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>

<body>
    <table border="5">
    <?php

    $lenguaje_cliente = array("LC1" => "Lenguaje_Cliente1", "LC2" => "Lenguaje_Cliente2", "LC3" => "Lenguaje_Cliente3", "LC4" => "Lenguaje_Cliente4");
    $lenguaje_servidor = array("LS1" => "Lenguaje_Servidor1","LS2" => "Lenguaje_Servidor2","LS3" => "Lenguaje_Servidor3");
    $lenguajes = $lenguaje_cliente;
    foreach ($lenguaje_servidor as $leng => $de) {
        $lenguajes[$leng] = $de;
    }
    foreach($lenguajes as $leng=>$de){
        echo "<tr><td>".$leng."</td><td>".$de."</td></tr>";
    }
    ?>
    </table>
</body>

</html>