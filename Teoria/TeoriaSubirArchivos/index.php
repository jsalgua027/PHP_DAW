<?php
if (isset($_POST["btnSubir"])) {

    //$_FILES["foto"]["name"] --> El + imp
    //$_FILES["foto"]["error"] --> Te dice si la imagen se ha subido correctamente o no
    //$_FILES["foto"]["tmp_name"] --> Te guarda la dirección donde se encuentra el sevidor
    //$_FILES["foto"]["size"] --> Te dice cuantos bytes tiene 
    //$_FILES["foto"]["type"] --> Te dice el tipo de texto que se ha subido
    //Se genera un $_FILE no $_POST hay que tenerlo en cuenta


    //El error en el formulario(en este caso la foto) se pone así
    $error_archivo = $_FILES["foto"]["name"] == "" || $_FILES["foto"]["error"] || !getimagesize($_FILES["foto"]["tmp_name"]) || $_FILES["foto"]["size"] > 500 * 1024;

    if (isset($_FILES["foto"])) {
    }
    echo "<p>Existe S_POST</p>";
} else {
    echo "<p>No existe S_POST</p>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teoría Subir Archivos</title>
</head>

<body>
    <h1>Subir Archivos</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <!--Elija o no elija archivo siempre esetá vacío-->
            <label for="foto">Seleccione un archivo imagen inferior a 500KB</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            <?php
            if (isset($_POST["btnSubir"]) && $error_archivo) {
                if ($_FILES["foto"]["name"] != "") {
                    if ($_FILES["foto"]["error"]) {
                        echo "<span class='error'> Error en la subida de archivos</span>";
                    } elseif (!getimagesize($_FILES["foto"]["tmp_name"])) {
                        echo "<span class='error'> Error, no has seleccionado un archivo de imagen</span>";
                    } else {
                        echo "<span class='error'> Error, el tamaños de la imagen seleccionada no apto</span>";
                    }
                }
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnSubir">Subir Imagen</button>
        </p>







    </form>
    <?php
    //Si no hay errores
    if (isset($_POST["btnSubir"]) && !$error_archivo) {
        echo "<h1>Respuesta cuando no hay errores y la imagen se ha subido</h1>";
        echo "<p><strong>Nombre de la imagen seleccionada:</strong> " . $_FILES["foto"]["name"] . "</p>";
        echo "<p><strong>Ruta del archivo temporal:</strong> " . $_FILES["foto"]["tmp_name"] . "</p>";
        echo "<p><strong>Tamaño del archivo:</strong> " . $_FILES["foto"]["size"] . "</p>";
        echo "<p><strong>Tipo de archivo:</strong> " . $_FILES["foto"]["type"] . "</p>";

        $array_nombre = explode(".", $_FILES["foto"]["name"]);
        $extension = "";
        if (count($array_nombre) > 1) {
            $extension = "." . strtolower(end($array_nombre));
            $nombre_unico = md5(uniqid(uniqid(), true));
            $nombre_nuevo_archivo = $nombre_unico . $extension;
            //Si se le pone @ para el error que me muestre poder controlarlo
            @$var = move_uploaded_file($_FILES["foto"]["tmp_name"], "images/" . $nombre_nuevo_archivo);
            if (!$var) {
                echo "<p>La imagen no ha podido ser movida por falta de permisos</p>";
            } else {
                echo "<h3>La imagen ha podido ser subida con éxito</h3>";
                echo "<img height='200' src='images/" . $nombre_nuevo_archivo . "'/>";
            }
        }
    }

    ?>


</body>

</html>