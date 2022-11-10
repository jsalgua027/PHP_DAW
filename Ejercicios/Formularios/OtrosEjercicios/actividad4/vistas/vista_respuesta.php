<!DOCTYPE html>
<html lang="es">

<head>
    <title>Practica 1</title>
    <meta charset="UTF-8">

</head>

<body>
    <h2>Recibiendo Datos</h2>
    <?php
        echo "<p><strong>Nombre:  </strong> ".$_POST["nombre"]."</p>";
        echo "<p><strong>Apellidos:  </strong> ".$_POST["apellido"]."</p>";
        echo "<p><strong>Contraseña:  </strong> ".$_POST["contraseña"]."</p>";
        echo "<p><strong>DNI:  </strong> ".$_POST["dni"]."</p>";
        if(isset($_POST["sexo"])){
            echo "<p><strong>Sexo:  </strong> ".$_POST["sexo"]."</p>";
        }
        echo "<p><strong>Nacido en:  </strong> ".$_POST["nacido"]."</p>";
        echo "<p><strong>Comentarios  </strong> ".$_POST["comentarios"]."</p>";
        if(isset($_POST["suscripcion"])){
            echo "<p><strong>Suscripcion:</strong> Si</p>";
        }else{
            echo "<p><strong>Suscripcion:</strong> No</p>";
        }
    ?>

</body>

</html>