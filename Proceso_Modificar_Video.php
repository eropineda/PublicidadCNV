


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

	

	/*CODIGO PARA CONSUTAR SI EXISTE UN ESTADO ACTIVO EN CUALQUIER REGISTRO*/
	$consulta = "SELECT * FROM `Publi_Video` WHERE `Vid_Estatus`= 'Activo'";//QUERY
    $resultado=mysqli_query($conexion,$consulta);//REALIZAR LA CONEXION Y EJECUTAR EL QUERY
		$fila=mysqli_num_rows($resultado);//TRAER LOS NUMEROS DE FILAS
		if($fila>0 and $combobox==2) {  //CONDICION SI LA FILA ES MAYOR A 0 Y SI EL COMBOBOX EN QUE ESTADO ES 
   
	$consulta = "UPDATE Publi_Video SET Vid_Estatus = '$valor' WHERE Vid_ID ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='IngresarVideo.php'</script>";
	
	
	mysqli_free_result($resultado);
	mysql_close($conexion);


}

elseif ($fila<=0  and $combobox==1) { //FILTRAR SI NO EXISTE NINGUN DATO EN LA BASE QUE ESTE ACTIVO Y QUE EL COMBOBOX ESTE ACTIVO PARA MODIFICAR EL REGISTRO DE DESACTIVADO A ACTIVO

   $consulta = "UPDATE Publi_Video SET Vid_Estatus = '$valor' WHERE Vid_ID ='$id'";


	$resultado=mysqli_query($conexion,$consulta);

		echo"<script> location.href='IngresarVideo.php'</script>";
	
	
	mysqli_free_result($resultado);
	mysql_close($conexion);
   



}


elseif($fila>0){ //SI EXISTE UN REGISTRO ACTIVO NO DEJARE ALMACENAR 
			

    	echo'<script> alert("Existe un Registro que esta activo. Desactivar")</script>';
		echo"<script> location.href='IngresarVideo.php'</script>";



    
   	 }




 ?>