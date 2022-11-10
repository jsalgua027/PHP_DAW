<?php
function mi_strlen($texto)
{
    $resp=0;
    while(isset($texto[$resp]))
        $resp++;
    return $resp;
}

function mi_explode($sep,$texto)
{
    $aux=[];
    $long_texto=mi_strlen($texto);
    $i=0;
    while($i<$long_texto && $texto[$i]==$sep)
    {
        $i++;
    }    

    if($i<$long_texto)
    {
        $j=0;
        $aux[$j]=$texto[$i];
        for($k=$i+1; $k<$long_texto;$k++)
        {
            if($texto[$k]!=$sep)
            {
                $aux[$j].=$texto[$k];
            }
            else
            {
                $k++;
                while($k<$long_texto && $texto[$k]==$sep)
                {
                       $k++;
                }
                if($k<$long_texto)
                {
                    $j++;
                    $aux[$j]=$texto[$k];
                }
            }
        }
    }
    return $aux;
}

if(isset($_POST["btnSubir"]))
{
    $error_archivo=$_FILES["archivo"]["name"]==""||$_FILES["archivo"]["error"]||$_FILES["archivo"]["type"]!="text/plain"||$_FILES["archivo"]["size"]>1000000;
    if(!$error_archivo)
    {
        @$var=move_uploaded_file($_FILES["archivo"]["tmp_name"],"Horario/horarios.txt");

    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error{color:red}
        .centrar{text-align:center}
        th{background-color:#CCC}
        table,td,th{border:1px solid black}
        table{width:80%;margin:0 auto;border-collapse:collapse}
    </style>
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <?php
        @$file=fopen("Horario/horarios.txt","r");
        if(!$file)
        {
        ?>

            <h2>No se encuentra el archivo <em>Horario/horarios.txt</em></h2>
            <form action="ejercicio4.php" method="post" enctype="multipart/form-data">
                <p>
                    <label for="archivo">Seleccione un archivo .txt no superior a 1MB</label>
                    <input type="file" name="archivo" id="archivo" accept=".txt"/>
                    <?php
                    if(isset($_POST["btnSubir"])&& $error_archivo)
                    {
                        if($_FILES["archivo"]["name"]!="")
                        {
                            if($_FILES["archivo"]["error"])
                                echo "<span class='error'>¡¡ Error en la subida del archivo al Servidor !!</span>";
                            elseif($_FILES["archivo"]["type"]!="text/plain")
                                echo "<span class='error'>¡¡ Error el archivo seleccionado no es un .txt !!</span>";
                            else
                                echo "<span class='error'>¡¡ Error el archivo seleccionado es superior a 1 MB !!</span>";
                        }
                    }
                    ?>
                </p>
                <p><input type="submit" value="Subir" name="btnSubir"/></p>
            </form>
 
        <?php  
             if(isset($_POST["btnSubir"])&& !$error_archivo)
                    echo "<p>No se ha podido mover el archivo seleccionado a <em>Horario/horario.txt</em></p>";
        }
        else
        {
        ?>    
            <form action="ejercicio4.php" method="post">
                <p>
                    <label for="profesor">Seleccione el Profesor:</label>
                    <select name="profesor" id="profesor">
                    <?php
                        while($fila=fgets($file))
                        {
                            $valores=mi_explode("\t",$fila);
                            if(isset($_POST["profesor"])&& $_POST["profesor"]==$valores[0])
                                echo "<option selected value='".$valores[0]."'>".$valores[0]."</option>";
                            else
                                echo "<option value='".$valores[0]."'>".$valores[0]."</option>";

                            for($i=1;$i<count($valores);$i+=3)
                            {
                                if(isset($horario[$valores[0]][$valores[$i]][$valores[$i+1]]))
                                    $horario[$valores[0]][$valores[$i]][$valores[$i+1]].="/".$valores[$i+2];
                                else
                                    $horario[$valores[0]][$valores[$i]][$valores[$i+1]]=$valores[$i+2];
            
                            }
                           
                        }
                       
                        fclose($file);
                    ?>
                    </select>
                    <input type="submit" name="btnVerHorario" value="Ver Horario"/>
                </p>
            </form>
        <?php
            if(isset($_POST["btnVerHorario"]))
            {
                

                $hora[1]="8:15 - 9:15";
                $hora[2]="9:15 - 10:15";
                $hora[3]="10:15 - 11:15";
                $hora[4]="11:15 - 11:45";
                $hora[5]="11:45 - 12:45";
                $hora[6]="12:45 - 13:45";
                $hora[7]="13:45 - 14:45";
                echo "<h3 class='centrar'>Horario del Profesor: ".$_POST["profesor"]."</h3>";
                echo "<table>";
                echo "<tr>";
                echo "<th></th><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th>";
                echo "</tr>";
                for($j=1;$j<=7;$j++)
                {
                    echo "<tr class='centrar'><th>".$hora[$j]."</th>";
                    if($j==4)
                    {
                        echo "<td colspan='5'>RECREO</td>";
                    }
                    else
                    {
                        for($i=1;$i<=5;$i++)
                        {
                            if(isset($horario[$_POST["profesor"]][$i][$j]))
                                echo "<td>".$horario[$_POST["profesor"]][$i][$j]."</td>";
                            else
                                echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
           
        }
    ?>
</body>
</html>