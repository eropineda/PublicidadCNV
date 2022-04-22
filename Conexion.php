<?php 


	$server= "10.122.156.10";
	$usuario="appnvida";
	$Password="appnv1da";
	$db="publicidad";

	/*$server= "localhost";
	$usuario="root";
	$Password="1234";
	$db="publicidad";*/




	$conexion = new mysqli($server,$usuario,$Password,$db,3306);

	 if($conexion -> connect_errno){
	 	die("Fallo de Conexion: (" . $conexion -> mysqli_connect_errno() . ")" . $conexion -> mysqli_connect_errno());



	 }

