<?php 

	require("Conexion.php");


	$noticiaNombre = $_POST['nombre']; //Obtener el valor de la variable de IngresoImagenes
	$noticiaDescripcion = $_POST['Descripcion']; 
	$username=$_POST['usuario']; //Obtener el valor de la variable de Usuario
	$Dolar=$_POST['dolar'];

	$check = "Desactivado";
	if(isset($_POST['Publicar'])){
		$check= $_POST['Publicar'];
	}

	$consulta = "INSERT INTO Noticias(Not_Nombre, Not_Descripcion, Estatus, UsuarioName) VALUES ('$noticiaNombre','$noticiaDescripcion','$check','$username')";




	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='IngresarNoticias.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);

 ?>