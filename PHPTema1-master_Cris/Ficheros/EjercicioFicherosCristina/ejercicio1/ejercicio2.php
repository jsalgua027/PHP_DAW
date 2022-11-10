<?php
if (isset($_POST["btnEnviar"])) {

	$errores = $_POST["num"] == "" || !is_numeric($_POST["num"])
		|| $_POST["num"] > 10 || $_POST["num"] < 1;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Ejercicio2</title>
	<meta charset="UTF-8" />
</head>

<body>
	<h1></h1>
	<form action="ejercicio2.php" method="POST" enctype="multipart/form-data">
		<p><label for="num">Introduce un número del 1 al 10</label>
			<input type="text" name="num" id="num" value="<?php if (isset($_POST["num"])) echo $_POST["num"] ?>" size="5" />
		</p>
		<?php
		if (isset($_POST["btnEnviar"]) && $errores) {

			if ($_POST["num"] == "") {

				echo "<span class='error'>*Campo obligatorio</span>";
			} else {

				echo "<span class='error'>Numero no válido</span>";
			}
		}
		?>
		<p><button type="submit" name="btnEnviar">Leer</button></p>
	</form>

	<?php
	if (isset($_POST["btnEnviar"]) && !$errores) {

		@$fd = fopen("Tablas/tabla_" . $_POST["num"] . ".txt", "r");
		if (!$fd) {

			die("<p>No se ha podido leer el fichero Tablas/tabla_" . $_POST["num"] . ".txt</p>");
		}

		while ($linea = fgets($fd)){

			echo "<p>".$linea."</p>";
		}

		echo "<h3>Archivo leido con éxito: <a href='Tablas/tabla_".$_POST["num"].".txt'>tabla_".$_POST["num"].".txt</h3>";
	}
	?>
</body>

</html>