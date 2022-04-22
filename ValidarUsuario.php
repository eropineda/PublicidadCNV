<?php 

session_start();

	require("Conexion.php");
		$username=$_POST['usuario'];
		$pass=$_POST['clave'];

		//$conexionsqli=mysqli_connect("localhost", "root", "1234", "publicidad");

		
		$consulta="SELECT * FROM Usuarios WHERE UserName = '$username' AND UserPassword= '$pass' AND `UserEstatus` = 'Activo'";

		$resultado=mysqli_query($conexion,$consulta);
		$fila=mysqli_num_rows($resultado);
		if($fila>0){
			
			//$fila['UserName']
			$_SESSION['UserName'] = $username;
			//echo'<script> alert(no entro)</script>';
			//echo "<script> location.href='index.php'</script>";
			echo"<script> location.href='Administrador.php'</script>";
		}else{

				echo'<script> alert("Datos Incorrectos o su Usuario esta Inactivo")</script>';
				echo"<script> location.href='login.php'</script>";




		//$sql=mysqli_query($conexion,"SELECT * FROM Usuarios WHERE UserName = '$username' AND UserPassword= '$pass'");
		//if($f=mysqli_fetch_assoc($sql)){
		//	if($pass==$f['UserPassword']){
		//		$_SESSION['UserName'] =$f['UserName'];

		//		echo"<script> location.href='Administrador.php'</script>"
		//	}else{

		//		echo'<script> alert("Contraseña Incorrecta")</script>';
		//		echo"<script> location.href='login.php'</script>"

		//	}
		//}else{
		//	echo'<script> alert("Usuario no Existe")</script>';
		//		echo"<script> location.href='login.php'</script>"


		}


 ?>


