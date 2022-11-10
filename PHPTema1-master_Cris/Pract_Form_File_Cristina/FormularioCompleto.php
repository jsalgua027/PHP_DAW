<?php

if (isset($_POST["reset"])) {

    header("Location:index.php");
    exit;
}

function letraNIF($dni)
{

    return substr("TRWAGMYFPDXBNJZSQVHLCKEO", $dni % 23, 1);
}

function compDni($param)
{
    if (strlen($param) == 9) {

        $letraMin = substr($param, -1);

        if ($letraMin >= "A" || $letraMin <= "Z") {

            $letra = strtoupper($letraMin);
            $soloNum = substr($param, 0, 8);

            if (is_numeric($soloNum) && letraNIF($soloNum) == $letra) {

                return true;
            }
        }
    }

    return false;
}

if (isset($_POST["enviar"])) {

    $error_nombre = $_POST["nombre"] == "";
    $error_usuario = $_POST["usuario"] == "";
    $error_psswd = $_POST["psswd"] == "";
    $error_dni = $_POST["dni"] == "" || !compDni($_POST["dni"]);
    $error_sexo = !isset($_POST["sexo"]);
    $error_foto = $_FILES["foto"]["name"] != "" && ($_FILES["foto"]["error"] 
    || !getimagesize($_FILES["foto"]["tmp_name"]) || $_FILES["foto"]["size"] > (500 * 1000));
    $errores = $error_nombre || $error_usuario
        || $error_psswd || $error_dni 
        || $error_sexo || $error_foto;
}
if (isset($_POST["enviar"]) && !$errores) {

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Mi primera página.</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <h2>Datos recibidos</h2>
        <?php

        echo "Nombre: " . $_POST["nombre"] . "<br/>";

        echo "usuario: " . $_POST["usuario"] . "<br/>";

        echo "psswd: " . $_POST["psswd"] . "<br/>";

        echo "dni: " . $_POST["dni"] . "<br/>";

        if (isset($_POST["sus"])) {
            echo "ha seleccionado suscribirse al boletín.";
        } else {
            echo "no ha seleccionado suscribirse al boletín.";
        }
        
        echo "<br/>";
	
	if($_FILES["foto"]["name"] != ""){
	
	    echo "<h2>Información de la foto seleccionada:</h2>";
	    echo "<strong>Error :</strong>".$_FILES["foto"]["error"]."<br/>";
	    echo "<strong>Nombre :</strong>".$_FILES["foto"]["name"]."<br/>";
	    echo "<strong>Ruta en el servidor :</strong>".$_FILES["foto"]["tmp_name"]."<br/>";
	    echo "<strong>Tipo de archivo :</strong>".$_FILES["foto"]["type"]."<br/>";
	    echo "<strong>tamaño del archivo :</strong>".$_FILES["foto"]["size"]."</p>";
	    
	    $arr_aux = explode(".", $_FILES["foto"]["name"]);
	    if(count($arr_aux) == 1){
	    	
	    	$extension = "";
	    }else{
	    
	    	$extension = ".".end($arr_aux);
	    }
	    
	    $nombre_unico=md5(uniqid(uniqid(),true));
	    @$var = move_uploaded_file($_FILES["foto"]["tmp_name"], "images/".$nombre_unico.$extension);
	    
	    if($var){
	    	
	    	echo "<p>La imagen ha sido subido con éxito</p>";
            echo "<img height = '250px' src = 'images/".$nombre_unico.$extension."'/>";
	    }else{
	    
	    	echo "<p>La imagen no se ha podido copiar en la carpeta destino por falta de permisos</p>";
	    }
	    
	}else{
	
	    echo "Foto no seleccionada";
	}
        ?>
    </body>

    </html>

<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Formularios</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <form action="FormularioCompleto.php" method="post" enctype="multipart/form-data">
            <h2>Rellena tu CV.</h2>

            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"]; ?>" />
            <?php
            if (isset($_POST["enviar"]) && $error_nombre) {
                echo "*Campo vacio*";
            }
            ?>
            <br />
            <br />
            <label for="usuario">Usuario:</label><br />
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php if (isset($_POST["usuario"])) echo $_POST["usuario"]; ?>" />
            <?php
            if (isset($_POST["enviar"]) && $error_usuario) {
                echo "*Campo vacio*";
            }
            ?>
            <br />
            <br />

            <label for="psswd">Contraseña:</label><br />
            <input type="password" name="psswd" id="psswd" placeholder="Contraseña" />
            <?php
            if (isset($_POST["enviar"]) && $error_psswd) {
                echo "*Campo vacio*";
            }
            ?>
            <br />
            <br />

            <label for="dni">DNI:</label><br />
            <input type="text" name="dni" id="dni" placeholder="DNI: 11223344Z" value="<?php if (isset($_POST["dni"])) echo $_POST["dni"]; ?>" />
            <?php
            if (isset($_POST["enviar"]) && $error_dni) {
                
                if($_POST["dni"] == ""){
                
                 echo "*Campo vacio*";
                }else if(!is_numeric(substr($_POST["dni"], 0, 8)) || substr($_POST["dni"], -1) < "A" ||
                substr($_POST["dni"], -1) > "Z"){
                
                  	echo "*Debe ser 8 num y una letra*";
                }else{
                
                	echo "*DNI no válido*";
                }
            }
            ?>
            <br />
            <br />

            <label for="sexo">Sexo:</label>
            <?php
            if (isset($_POST["enviar"]) && $error_sexo) {
                echo "*Campo vacio*";
            }
            ?>
            <br />
            <input type="radio" name="sexo" id="hombre" value="hombre" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "hombre") echo "checked"; ?>>
            <label for="hombre">Hombre</label></input><br />
            <input type="radio" name="sexo" id="mujer" value="mujer" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "mujer") echo "checked"; ?>>
            <label for="mujer">Mujer</label></input><br /><br />

            <label for="foto">Incluir mi foto:(Archivo de tipo imagen Máx. 500KB)</label>
            <input type="file" accept="image/*" id="foto" name="foto" />
            <?php
            	if(isset($_POST["btnEnviar"]) && $error_foto){
            	
            	   if($_FILES["foto"]["error"]){
            	   
            	   	echo "*Error en la subida de la foto al servidor*";
            	   }else if(!getimagesize($_FILES["foto"]["tmp_name"])){
            	   	
            	   	echo "*No has seleccionado un archivo imagen*";
            	   }else{
            	   
            	   	echo "*el tamaño del archivo seleccionado es mayor de 500KB*";
            	   }
            	}
            ?>
            <br /><br />

            <input type="checkbox" id="sus" name="sus" <?php if (isset($_POST["enviar"])) echo "checked"; ?>>
            <label for="sus">Suscribirme al boletín de novedades:</label><br /><br />

            <input type="submit" name="enviar" value="Guardar Cambios" />
            <input type="submit" name="reset" value="Borrar los datos introducidos" />
        </form>
    </body>

    </html>
<?php
}
?>