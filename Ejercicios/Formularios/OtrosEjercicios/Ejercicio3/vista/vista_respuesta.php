<?php
	//Con isset queremos comprobar si lo que sea está inicializado
	if(isset($_GET["btnGuardar"])){
	
?>

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Actividad 2- Recepción de datos</title>
		</head>
		    

		<body>
			<h1>Recibiendo los datos del Formulario</h1>
			<?php
			echo "<p><strong>Nombre:</strong>".$_GET["nombre"]."</p>";
			echo "<p><strong>Apellidos:</strong>".$_GET["ape"]."</p>";
			echo "<p><strong>Contraseña:</strong>".$_GET["contra"]."</p>";
			echo "<p><strong>Dni:</strong>".$_GET["dni"]."</p>";
			
			//Se pueden eliminar las llaves {} cuando solo hay una sentencia 
			if(isset($_GET["hm"])){
				echo "<p><strong>Sexo:</strong>".$_GET["hm"]."</p>";
			}

			echo "<p><strong>Nacido en:</strong>".$_GET["ciudad"]."</p>";
			echo "<p><strong>Comentarios:</strong>".$_GET["coments"]."</p>";

			//Si está marcado sale sí, si no está marcado sale no.
			if(isset($_GET["sus"])){
				echo "<p><strong>Suscripción:</strong> Sí</p>";
			}else{
				echo "<p><strong>Suscripción:</strong> No</p>";
			}

			?>
		</body>

	</html>
<?php
	}else{
	//Si no existen los datos te va a mandar a esa página
		header("Location: index.php");
	}
?>