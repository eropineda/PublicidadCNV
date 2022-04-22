
<?php 
	//proceso para modificar las imagenes  
	require("Conexion.php");
	$id= $_REQUEST['id'];


	$nombre= $_POST['nombre'];
	$descripcion= $_POST['Descripcion'];
	$combobox = $_POST['Combo'];

	if($combobox==1){

		$valor="Activo";
	}
	
	if ($combobox==2) {
			$valor="Desativado";
	}

	
 	$consulta = "UPDATE `Noticias` SET `Not_Nombre`='$nombre',`Not_Descripcion`='$descripcion',`Estatus`='$valor' WHERE `Not_Id`='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='IngresarNoticias.php'</script>";
	
	
	mysqli_free_result($resultado);
	mysql_close($conexion);

 ?>