<?php 

	require("Conexion.php");


	$Nombre = $_POST['nombre']; //Obtener el valor de la variable de IngresoImagenes
	$pass = $_POST['pass']; 
	$confirm = $_POST['confirmar'];
	$correo=$_POST['correo']; //Obtener el valor de la variable de Usuario

	$check = "Desactivado";
	if(isset($_POST['Publicar'])){
		$check= $_POST['Publicar'];
	}


	if ($confirm == $pass) {
		
	$consulta = "INSERT INTO `Usuarios`(`UserName`, `UserPassword`, `UserCorreo`, `UserEstatus`) VALUES ('$Nombre','$pass','$correo','$check')";




	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='IngresarUsuarios.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);
	}else{

		echo'<script> alert("Contraseñas no Coinciden")</script>';
				echo"<script> location.href='IngresarUsuarios.php'</script>";

	}
 ?>