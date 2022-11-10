<DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <form method="post" action="index.php" enctype="multipart/form-data">
            <h2>Rellena tu CV</h2>
            <label for="nombre">Nombre:</label><br/>
            <input type="text" name="nombre" id="nombre"><br/>
            <label for="apellido">Apellido:</label><br/>
            <input type="text" name="apellido" id="apellido" size="40"></br>
            <label for="contraseña">Contraseña:</label><br/>
            <input type="password" name="contraseña" id="contraseña"><br/>
            <label for="dni">DNI:</label><br/>
            <input type="text" name="dni" id="dni" size="15"><br/>
            Sexo<br/>
            <input type="radio" name="sexo" value="hombre" id="hombre"> <label for="hombre">Hombre</label></br>
            <input type="radio" name="sexo" value="mujer" id="mujer"><label for="mujer"> Mujer</label></br>
            <p>Incluir mi foto: 
            <input type="file" name="foto" accept="image/"> </p>
            <label for="nacido">Nacido en:</label>
            <select name="nacido" id="nacido">
                <option value="malaga">Malaga</option>
                <option value="sevilla">Sevilla</option>
                <option value="cadiz">Cadiz</option>
            </select><br/>
            <label for="comentarios">Comentarios:</label><textarea name="comentarios" id="comentarios" rows="4"></textarea>
            <br/>
            <p><input type="checkbox" name="suscripcion" id="suscripcion">
            <label for="suscripcion">Suscribirme al boletin de Novedades </label></p>
            <button type="submit" name="guardar">Guardar cambios</button>
            <input type="reset" value="Borrar datos introducidos">

        
        </form>
	</body>
</html>