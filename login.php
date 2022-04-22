




<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/stilo.css">
</head>
<body background="img/fondo.png">

	<div id="LoginContenedores">

		

	
		<div id="contenedoruno">
			<img src="img/icono1.png">
				<h3>Coop-Publicidad</h3>
			
			<form method="POST" action="ValidarUsuario.php">
				
				<input style="color:rgb(255, 128, 0)" type="text" name="usuario" placeholder="&#128272 Ingresar Usuario" ></input>
				<br>
				
				<input style="color:rgb(255, 128, 0)" type="password" name="clave"  placeholder="&#128272 Contraseña"></input>
				
				<input  type="submit" name="login" value="Iniciar Sesion"></input>

			</form>

		</div>

	</div>

</body>
</html>