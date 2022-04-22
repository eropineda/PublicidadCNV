<?php 
	//proceso para modificar las Noticias 
	require("Conexion.php");
	$id= $_REQUEST['id'];




	$consulta = "DELETE FROM `Usuarios` WHERE `UserName` ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='IngresarUsuarios.php'</script>";

	mysqli_free_result($resultado);
	mysql_close($conexion);

 ?>