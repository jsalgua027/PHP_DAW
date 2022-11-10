<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuntes fecha</title>
</head>

<body>
    <?php
    //Te da la fecha en nanosegundos desde el 1 de enero de 1970
    $tiempo = time();
    echo $tiempo;
    echo " <br/>";

    //Te da la fecha de ahora, no poner segundo parámetro y poner time() es lo mismo
    $fecha = date("d/m/Y h:i:s");
    echo $fecha;
    echo " <br/>";

    //para restar fecha actual al 1 de enero de 1970(resultado en nanosegundos)
    //mktime(hora, mint, sec, mes, día y año)
    $cumpl = mktime(0, 0, 0, 14, 17, 2000);
    echo $cumpl;
    echo " <br/>";

    //checkdate(mes, día, año)
    //Te indica si la fecha existe o no(devuelve un booleano) 
    if (checkdate(2, 3, 2022)) {
        echo "Fecha correcta";
    } else {
        echo "Fecha incorrecta";
    }
    echo " <br/>";

    //strtotime("año/mes/día") ||   strtotime("mes/día/año")
    //si le pasas una fecha te devuelve la resta como cuando usas mktime
    echo strtotime("2001/2/17");
    echo " <br/>";
    echo strtotime("2/17/2001");
    echo " <br/>";

    echo floor(5.6);//redondea hacia abajo
    echo " <br/>";
    echo ceil(5.6); //redondea hacia arriba
    echo " <br/>";
    echo abs(floor(5.6)-ceil(5.6)); //Hace valor absoluto

    ?>
</body>

</html>