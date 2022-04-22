<?php 
	//proceso para modificar las Noticias 
	require("Conexion.php");
	$id= $_REQUEST['id'];


	


	$consulta = "DELETE FROM `Publi_Taza_Cambio` WHERE `TasaCambioId` ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='Ingresartasacambio.php'</script>";

	mysqli_free_result($resultado);
	mysql_close($conexion);







 ?>