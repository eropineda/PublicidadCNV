<?php 
	//proceso para modificar las imagenes  
	require("Conexion.php");
	$id= $_REQUEST['id'];




	$consulta = "DELETE FROM Publi_Video WHERE Vid_ID ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='IngresarVideo.php'</script>";

	mysqli_free_result($resultado);
	mysql_close($conexion);







 ?>