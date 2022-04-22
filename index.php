
<!DOCTYPE html>
<html>
<head>
	<title>Publicidad Signage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/stilo.css">
</head>
<body style=" background: rgba(98,125,77,1);
background: -moz-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(98,125,77,1)), color-stop(100%, rgba(31,59,8,1)));
background: -webkit-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
background: -o-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
background: -ms-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
background: linear-gradient(to bottom, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#627d4d', endColorstr='#1f3b08', GradientType=0 );  width: 1080px; height: 740px;">
	

<div id="wrapper">
      <?php 
        require("Conexion.php");  

                     $consulta="SELECT * FROM `Publi_Video` WHERE Vid_Estatus= 'activo'"; 
                     $resultado= $conexion->query($consulta);
                     $row = $resultado-> fetch_assoc()
                     
       ?>

       

      <div class="video">
	       <iframe name="VIDEO" width="560" height="315" src="https://www.youtube.com/embed/playlist?list=<?php echo ($row['Vid_ID']); echo ($row['Vid_Auto']); echo ($row['Vid_Rel']); echo ($row['Vid_loop']); echo ($row['Vid_Controles']); echo ($row['Vid_HD']);?> &showinfo=0" allowfullscreen ></iframe>


         <!--https://www.youtube.com/embed/<?php echo($row['Vid_ID']);  echo ($row['Vid_HD']); echo ($row['Vid_loop']);?>&playlist= <?php echo ($row['Vid_Playlist']); echo ($row['Vid_Controles']); ?>-->

      </div>
	
    <!--codigo para el slider-->
		<div class="ContendorPrincipal">
			
			<div class="slides">
			    <?php 
             require("Conexion.php");  

    			           $consulta="SELECT Img_Imagen FROM Publi_IMG WHERE Estatus ='Activo'"; 

    			           $resultado= $conexion->query($consulta);

    				
    			           while ($row = $resultado-> fetch_assoc()) {
          ?>
			                 <img src="data:image/jpg;base64,<?php echo base64_encode($row['Img_Imagen']); ?>">
          <?php 
                 }
           ?>
       </div>     
		</div>
    <!-- Termina el codigo para el slider-->


		  <!--<span class="movible">Textodasdsadsdfasdfasdfasdfadsfadfadfadsfadsfadfadfadfadfadadadfafafadfadfadadfadsfadsfadfadfadsfadfadfadfadfadadasgfdhjfjlkjggfdssfghjklñkjhgfdsdfgh</span>-->


      <div id="TasaCambio">
        
        <?php 
             require("Conexion.php");  

                     $consulta="SELECT * FROM Publi_Taza_Cambio WHERE Tasa_Estado = 'Activo'"; 
                      


                     $resultado= $conexion->query($consulta);

            
                     $row = $resultado-> fetch_assoc();

          ?>
          <a>Precio Compra Dólar: <?php echo($row['TasaCompraDolar']); ?></a>
          <a>Precio Venta Dólar: <?php echo($row['TasaVentaDolar']); ?></a>

        
      </div>







      <!-- Contenedor de La Noticia-->

      <div id="Noticia" >
        
        <marquee  style="height:50px" style="background:RED" scrolldelay="300" scrollamount="10">

        <FONT FACE=arial COLOR=white SIZE=5>

        <?php 
             require("Conexion.php");  

                     $consulta="SELECT * FROM `Noticias` WHERE `Estatus` = 'Activo'"; 



                     $resultado= $conexion->query($consulta);

            
                     while ($row = $resultado-> fetch_assoc()) {

          ?>
          <a>-<?php echo($row['Not_Descripcion']); ?></a>
                       
                       

          <?php 
                 }
           ?>

           </FONT>
           </marquee>



      </div>  







	</div>



<!--Codigo para instanciar los jquery-->
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.slides.js" type="text/javascript"></script>
<!--Finaliza Codigo-->

<!--Codigo para ejecutar el slider-->
	<script>
		$(function(){
  $(".slides").slidesjs({

 });
});
</script>

<!--Finaliza Codigo-->







</body>

</html>