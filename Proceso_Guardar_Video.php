<?php 

	require("Conexion.php");


	$VideoName = $_POST['nombre']; //Obtener el valor de la variable de IngresoImagenes
	$VideoId = $_POST['id'];						//obtener la imagen de ingreso de imagen
	$username=$_POST['usuario'];//obtener el Usuario que inicio sesion



	//obtener el valor del checkbox publicar.
	$publicar = "Desactivado";
	if(isset($_POST['Publicar'])){
		$publicar= $_POST['Publicar'];
	}

	// termina


	//obtener el auto play.
	$auto = "?autoplay=0";
	if(isset($_POST['AutoPlay'])){
		$auto= $_POST['AutoPlay'];
	}

	//termina


	//obtener el valor de hd
	$hd = "&hd=0";
	if(isset($_POST['HD'])){
		$hd= $_POST['HD'];
	}	
	//termina


	//obtener el valor de Relacionado
	$relacionado = "&rel=1";
	if(isset($_POST['Relacionado'])){
		$relacionado= $_POST['Relacionado'];
	}	
	//termina

		//obtener el valor de Repetir
	$repetir = "&loop=0";
	if(isset($_POST['Repetir'])){
		$repetir= $_POST['Repetir'];
	}	
	//termina


	//obtener el valor de playlist
	$autoplay = "";
	if(isset($_POST['AutoInicio'])){
		$autoplay= $_POST['id'];
	}	
	//termina


	//obtener el valor de controles
	$controles = "&controls=1";
	if(isset($_POST['Controles'])){
		$controles= $_POST['Controles'];
	}	
	//termina




$consulta = "SELECT * FROM `Publi_Video` WHERE `Vid_Estatus`= 'Activo'";
    $resultado=mysqli_query($conexion,$consulta);
		$fila=mysqli_num_rows($resultado);
		if($fila>0 and $publicar=='Desactivado') {





	$consulta = "INSERT INTO Publi_Video (Vid_ID, Vid_Nombre, Vid_Estatus, UsuarioName, Vid_Auto, Vid_Controles, Vid_loop, Vid_Playlist, Vid_HD, Vid_Rel) VALUES ('$VideoId','$VideoName','$publicar','$username','$auto','$controles','$repetir','$autoplay','$hd','$relacionado')";

	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='IngresarVideo.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);


}


elseif ($fila<=0  and $publicar=='Activo') {

	$consulta = "INSERT INTO Publi_Video (Vid_ID, Vid_Nombre, Vid_Estatus, UsuarioName, Vid_Auto, Vid_Controles, Vid_loop, Vid_Playlist, Vid_HD, Vid_Rel) VALUES ('$VideoId','$VideoName','$publicar','$username','$auto','$controles','$repetir','$autoplay','$hd','$relacionado')";

	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='IngresarVideo.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);





	}



	elseif($fila>0){
			

    	echo'<script> alert("Existe un Registro que esta activo. Desactivar")</script>';
		echo"<script> location.href='IngresarVideo.php'</script>";



    
   	 }
    


	
?>