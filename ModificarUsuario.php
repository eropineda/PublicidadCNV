<?php
    session_start();
   
    if(!$_SESSION['UserName'])
    {
           header("Location:login.php");

    }
        


?>






<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Coop Admin</title>

    <link rel="stylesheet" type="text/css" href="css/stilo.css">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="css/bootstrap-toggle.min.css">


    <!-- scrip para mensaje de guardar -->
    <SCRIPT languaje="JavaScript">
        function pulsar() {
    alert("Exito: Imagen Almacenada Correctamente");
        }
            </SCRIPT>




</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="Administrador.php">Cooperativa Nueva Vida Ltda.</a>
            
            <!--Boton para vasualizar el contenido que se esta publicando-->
            <div id="Previw">
            <button type="button" class="btn btn-warning fa fa-search" onClick="window.location ='index.php';"> Vista Previa
            </button>
             </div>

        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Administrador.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-area-chart"></i> Ingreso de Imagenes</a>
                </li>-->
               
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i class="fa fa-fw fa-wrench"></i> Archivo</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="IngresoImagenes.php">Ingreso de Imagenes</a>
                        </li>
                        <li>
                            <a href="IngresarUsuarios.php">Ingreso de Usuarios</a>
                        </li>
                        <li>
                            <a href="IngresarVideo.php">Ingreso de URL Video</a>
                        </li>
                        <li>
                            <a href="IngresarNoticias.php">Ingreso de Noticia</a>
                        </li>
                         <li>
                            <a href="Ingresartasacambio.php">Ingreso de Tasa de Cambio</a>
                        </li>
                        
                    </ul>
                </li>
               
               
            </ul>
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                            
            <div id="btnSalir">
                <div class="btn-group">
                <button type="button" class="btn btn-danger"><?php echo($_SESSION['UserName'])?></button>
 
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Desplegar menú</span>
                    </button>
 
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="Desconectar.php" class="fa fa-fw fa-power-off" >_Salir</a></li>
                        
                      </ul>
                    </div>

                     </div> 

                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

<!--class="fa fa-area-chart"-->

                <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Modificar Usuario

                </div>


                            <?php 

                    require("Conexion.php");
                    $id= $_REQUEST['id'];

                    $consulta = "SELECT `UserName`, `UserPassword`, `UserCorreo`, `UserEstatus` FROM `Usuarios` WHERE `UserName` ='$id'";
                    $resultado= $conexion->query($consulta);
                    $row = $resultado-> fetch_assoc();
                              
                             ?>


                <div id="SubirIMGU">
                    
                    <form action="Procesos_Modificar_Usuario.php?id=<?php echo $row['UserName'];?>" method="POST">
                    <h3>Modificar Usuario</h3>

                        <label>Username: *</label> <br/>
                        <input type="text" required="Campo Vacio" name="nombreusuario" title="Codigo del video " placeholder="Nombre de la Imagen " value=" <?php  echo $row['UserName']; ?> " readonly="readonly"> <br/>
                        <br/>

                        <div id="contra">
                        <label>Password: *</label> <br/>
                        <input  id= "password" type="password" required="Campo Vacio" name="contra" title="Nombre del video " placeholder="Nombre del Video " value="<?php  echo $row['UserPassword']; ?> " > 
                        
                                         
                        <input id="checkboxpass" name="Publicar" type="checkbox" value="Activo" checked data-toggle="toggle" data-onstyle="warning" data-on="Mostrar" data-off="Ocultar" onchange="document.getElementById('password').type = this.checked ? 'password' : 'text'"    ><br/><br/>
                         </div>

                        <label>Estado: *</label><br/>
                        <input type="text" name="estado" title="No se puede modificar usuario" value="<?php echo($row['UserEstatus']) ?>" readonly="readonly"><br/>

                            <!--onchange="javascript:alert('Desea Modificar el Estado de la Imagen')"-->
                        
                        <br/>
                        <label>Seleccion Estatus: *</label><br/>
                        <select name="Combo" >
                           <option value="1">Activo</option>
                            <option value="2">Desactivado</option>
                            
                        </select>

                            
                       
                        <br/><br/>
                        <input type="submit" class="btn btn-danger" value="Guardar">
                        <input type="button" name="Cancelar" class="btn btn-warning" value="Cancelar" onclick="location.href='IngresarUsuarios.php'">


                        
                    </form>

               

                </div>
               
            </div>
        </div>

    </div>
        <!-- /.container-fluid -->

  
    <!-- /.content-wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

    <script src="js/bootstrap-toggle.min.js"></script>



</body>

</html>
