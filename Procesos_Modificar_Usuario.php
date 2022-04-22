

<?php 
	//proceso para modificar las Usuiaris
	require("Conexion.php");
	$id= $_REQUEST['id'];
	$contra= $_POST['contra'];

	
	$combobox = $_POST['Combo'];

	if($combobox==1){

		$valor="Activo";
	}
	
	if ($combobox==2) {
			$valor="Desativado";
	}

	

	$consulta = "UPDATE `Usuarios` SET `UserPassword`='$contra',`UserEstatus`='$valor' WHERE `UserName` ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

	

	
		
		echo"<script> location.href='IngresarUsuarios.php'</script>";

	mysqli_free_result($resultado);
	mysql_close($conexion);







 ?>