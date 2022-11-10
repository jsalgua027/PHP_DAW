<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Teoría String</title>
	</head>
	<body>
		<?php
			$texto1= "Esto es un String 1";
			
			//Esto sirve para concatenar($texto1.)
			//Porque pilla el .= como el +=
			$texto2= "Esto es un String 2";
			echo "<p>".$texto1." ".$texto2."</p>";
			
			//Método para saber el lenght de un String
			//Todos los métodos de String comienzan con str
			//Cuando aparece offset cuando trabajas con String es porque te has salido 
			echo strlen($texto1);
			echo "<p>".$texto1[0]."</p>";
			
			//Método para ponerlo todo en mayúsculas
			echo strtoupper($texto1);
			
			//Método para ponerlo todo en minúsculas
			echo strtolower($texto1);
			
			//Te dice toda la info de un String(desde cuánto mide, a qué contiene y qué lo conforma)
			//echo "<p>".var_dump[$arr]."</p>";
			
			//Es como el split en java
			$texto2= implode(": ;",$arr);
			
			//Encripta un String
			echo md5($texto2);
			
			//Para quitar los espacios
			
			
			
		?>
	</body>
</html>
