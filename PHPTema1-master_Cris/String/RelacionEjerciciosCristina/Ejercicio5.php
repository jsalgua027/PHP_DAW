<?php

    function es_numero($texto){

        if(is_numeric($texto) && $texto <= 5000 && $texto > 0){

            return true;
        }else{

            return false;
        }
    }

	if(isset($_POST["btnComparar"]))
	{
		$error_texto = $_POST["texto"] == "" || !es_numero($_POST["texto"]);
	
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Ejercicio5</title>
		<meta charset="UTF-8"/>
		<style>
			.formulario{background-color:lightblue;border:2px solid black;}
			.respuesta{background-color:lightgreen;border:2px solid black;margin-top:2em}
			h2{text-align:center}
			form, .respuesta p{margin-left:2em}
		</style>
	</head>
	<body>
		<div class="formulario">
			<h2>Árabes a Romanos -Formulario</h2>
			<form action="Ejercicio5.php" method="post">
				<p>Dime un número y lo convertiré a números romanos</p>
				<p><label for="texto">Número</label>
					<input type="text" name="texto" id="texto" value="<?php if(isset($_POST["texto"])) echo $_POST["texto"];?>"/>
					<?php
						if(isset($_POST["btnComparar"]) && $error_texto)
						{
							if($_POST["texto"]=="")
								echo " * Campo Vacío * ";
							else
								echo "No has escrito un número romano correcto";
						
						}
					
					?>
				</p>
				
				<p><button type="submit" name="btnComparar">Comparar</button></p>
			</form>
		</div>
		
		<?php
			if(isset($_POST["btnComparar"]) && !$error_texto)
			{
				
                   $num = $_POST["texto"];
                   $resultado = "";

                   while($num > 0){

                        switch($num){

                            case $num >= 1000:
                                $num -= 1000;
                                $resultado .= "M";
                            break;
                            case $num >= 500:
                                $num -= 500;
                                $resultado .= "D";
                            break;
                            case $num >= 100:
                                $num -= 100;
                                $resultado .= "C";
                            break;
                            case $num >= 50:
                                $num -= 50;
                                $resultado .= "L";
                            break;
                            case $num >= 10:
                                $num -= 10;
                                $resultado .= "X";
                            break;
                            case $num >= 5:
                                $num -= 5;
                                $resultado .= "V";
                            break;
                            case $num >= 1:
                                $num -= 1;
                                $resultado .= "I";
                            break;

                        }
                   }

				echo "<div class='respuesta'>";
				echo "<h2>Árabes a romanos - Resultado</h2>";
				echo "<p>El número <strong>".$_POST["texto"]."</strong> es igual a <strong>".$resultado."</strong> en números romanos</p>";
				echo "</div>";
						
			}
		?>
	</body>
</html>