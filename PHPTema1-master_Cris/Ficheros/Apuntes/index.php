<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ficheros de Texto</h1>
    <?php
    $fd = fopen("prueba.txt", "r");
    if (!$fd) {
        //Se usa cuando queremos parar una ejecución y mostrar un mensaje
        die("<p>No se ha podido abrir el fichero <em>prueba.txt</em></p>");
    }

    //Te devuelve lo que tiene la línea donde se encuentra
    $linea = fgets($fd);
    echo "<p>" . $linea . "</p>";

    //Se usa de puntero, se suele usar para ir al principio
    fseek($fd, 0);
    echo "<h4>Recorrido de un fichero</h4>";
    $linea = fgets($fd);
    echo "<p>" . $linea . "</p>";

    while ($linea = fgets($fd)) {
        echo "<p>" . $linea . "</p>";
    }

    //Aquí miras que no esté al final (feof)
    fseek($fd, 0);
    echo "<h4>Otra forma de recorrer un fichero</h4>";
    while (!feof($fd)) {
        $linea = fgets($fd);
        echo "<p>" . $linea . "</p>";
    }
    if (!$fd) {
        //Se usa cuando queremos parar una ejecución y mostrar un mensaje
        die("<p>No se ha podido abrir el fichero <em>prueba.txt</em></p>");
    }


    //Siempre hay que cerrar la lectura de los ficheros(se llama a la variable que lo abre)
    fclose($fd);
    
    ?>
</body>

</html>