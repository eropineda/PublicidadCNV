


<?php 
	//proceso para modificar las imagenes  
	require("Conexion.php");
	$id= $_REQUEST['id'];


	
	$combobox = $_POST['Combo'];

	if($combobox==1){

		$valor="Activo";
	}
	
	if ($combobox==2) {
			$valor="Desativado";
	}

	

	$consulta = "UPDATE Publi_IMG SET Estatus ='$valor' WHERE Img_Id ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

	

	
		
		echo"<script> location.href='IngresoImagenes.php'</script>";

	mysqli_free_result($resultado);
	mysql_close($conexion);







 ?>