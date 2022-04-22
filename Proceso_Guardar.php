<?php 

	require("Conexion.php");


	$imageName = $_POST['nombre']; //Obtener el valor de la variable de IngresoImagenes
	$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));//obtener la imagen de ingreso de imagen
	$username=$_POST['usuario'];

	$check = "Desactivado";
	if(isset($_POST['activo'])){
		$check= $_POST['activo'];
	}

	$consulta = "INSERT INTO Publi_IMG ( Img_Nombre, Img_Imagen, UserName, Estatus) VALUES ('$imageName','$imagen','$username','$check')";
	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='IngresoImagenes.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);

 ?>