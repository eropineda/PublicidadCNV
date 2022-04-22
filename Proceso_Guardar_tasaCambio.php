<?php 

	require("Conexion.php");


	$compra = $_POST['Compradolar']; //Obtener el valor de la variable de IngresoImagenes
	$venta = $_POST['Venta_dolar']; 
	$username=$_POST['usuario']; //Obtener el valor de la variable de Usuario
	
	$check = "Desactivado";
	if(isset($_POST['Publicar'])){
		$check= $_POST['Publicar'];

	}


	$consulta = "SELECT * FROM `Publi_Taza_Cambio` WHERE `Tasa_Estado` = 'Activo'";
    $resultado=mysqli_query($conexion,$consulta);
		$fila=mysqli_num_rows($resultado);
		if($fila>0 and $check=='Desactivado') {
    	
    	    	

	$consulta = "INSERT INTO `Publi_Taza_Cambio`(`TasaCompraDolar`, `UsuarioName`, `TasaVentaDolar`, Tasa_Estado) VALUES ('$compra','$username','$venta', '$check')";

	



	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='Ingresartasacambio.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);


	}
	elseif ($fila<=0  and $check=='Activo') {
		$consulta = "INSERT INTO `Publi_Taza_Cambio`(`TasaCompraDolar`, `UsuarioName`, `TasaVentaDolar`, Tasa_Estado) VALUES ('$compra','$username','$venta', '$check')";

	



	$resultado=mysqli_query($conexion,$consulta);

	$filas=mysqli_num_rows($resultado);

	echo"<script> location.href='Ingresartasacambio.php'</script>";


	mysqli_free_result($resultado);
	mysql_close($conexion);

	}


	elseif($fila>0){
			

    	echo'<script> alert("Existe un Registro que esta activo. Eliminar el Activo")</script>';
		echo"<script> location.href='Ingresartasacambio.php'</script>";



    
   	 }
    
   
	

 ?>