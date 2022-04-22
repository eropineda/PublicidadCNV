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

   <!--  <link rel="stylesheet" type="text/css" href="css/bootstrap2-toggle.min.css">-->




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
                    <i class="fa fa-area-chart">Ingreso de Usuarios</i>

                </div>


                <div id="SubirVideo" >

                    <form action="Proceso_Guardar_Usuario.php" method="POST" >
                    <h3>Registro de Usuarios</h3><br/>


                       <label>UserName: *</label> <br/>
                        <input type="text" name="nombre" title="Nombre del Video" placeholder="Nombre de la Noticia..." value="" required="Llenar Este Campo" ><br/><br/>
                        

                      
                        <label>Password: *</label><br/> 
                             <input type="password" name="pass" placeholder="Contraseña"><br/>

                        <label>Confirmar Contraseña: *</label><br/> 
                             <input type="password" name="confirmar" placeholder="Contraseña">
                       
                       
                        <br/>
                        <label>Correo: *</label> <br/>
                        <input type="email" name="correo" title="Correo" placeholder="Escribir el Correo Electronico..." value="" required ><br/><br/>

                        <table>
                            <tr>
                                <td>Estado: *</td>
                                <td><input  name="Publicar" type="checkbox" value="Activo" checked data-toggle="toggle" data-onstyle="warning"><br/><br/></td>
                             </tr>
                            
                        </table>

                       <input type="submit" class="btn btn-danger" value="Guardar"><br/><br/>

                    </form>

               

                </div>


                 </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"> Vista de los Usuarios </i>

                </div>


                    <table class="table table table-striped table-hover">
                        <thead>
                            <tr>
                                
                                <th>UserName </th>
                                <th> Coorreo</th>
                                <th>Estado</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                               
                            </tr>


                        </thead>


                        <tbody>
                            <?php 

                            require("Conexion.php");

                            $consulta = "SELECT `UserName`, `UserPassword`, `UserCorreo`, `UserEstatus` FROM `Usuarios`";
                            $resultado= $conexion->query($consulta);
                            while ($row = $resultado-> fetch_assoc()) {
                               

                             ?>
                                <tr >
                                    <td> <?php echo $row['UserName'] ?> </td>
                                    <td> <?php echo $row['UserCorreo'] ?> </td>
                                    <td> <?php echo $row['UserEstatus'] ?> </td>
                                    
                                    <td> <a href="ModificarUsuario.php?id=<?php echo $row['UserName'];?> ">Modificar</a> </td>
                                    <td> <a href="Proceso_Eliminar_Usuario.php?id=<?php echo $row['UserName'];?>">Eliminar</a> </td>
                                </tr>
                             <?php 
                                    }

                              ?>



                        
                       </tbody>

                </table>


                </div>

             <?php 

                    require("Conexion.php");
                    $id= $_REQUEST['id'];

                    $consulta = "SELECT UPDATE_TIME FROM information_schema.tables WHERE TABLE_SCHEMA = 'publicidad' AND TABLE_NAME = 'Usuarios'";
                    $resultado= $conexion->query($consulta);
                    $row = $resultado-> fetch_assoc();
                              
                             ?>





                 <div class="card-footer small text-muted">
                    <?php echo $row['UPDATE_TIME'] ?>
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

    <script src="js/bootstrap-toggle.min.js"></script>
    <!-- <script src="js/bootstrap2-toggle.min.js"></script>-->
    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>







</body>

</html>
