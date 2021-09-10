<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 include '../base.php';
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];
           
           

          // Crear conexión con la base de datos.
         $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

        // Validar la conexión de base de datos.
         if ($conn ->connect_error) {
         die("Connection failed: " . $conn ->connect_error);
         }
         
         $consulta = "SELECT user_laberinto FROM wp_users WHERE user_login='$cliente'";
         $result =  $conn->query($consulta);

         $numero = 0;
        
         if($result){
             $fila = $result->fetch_assoc();
             $numero2 = array_values($fila);
             $numero = $numero2[0];
         }
          
         

         if($numero === '1'){
            header('Location: ./index2.php');
         }
         
         if($numero === '2'){
            header('Location: ./index3.php');
         }
        
         $conn->close();


 }else{
header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>
<!DOCTYPE html>
<html lang="es">
	
	<?php include('head.php'); ?>

<body>
	<div id="general">
	<div id="container">
	<header id="cabezote">
		<?php include('header.php'); ?>
		</header>
	
		<div id="sesion_cliente">
	<?php include('../mostrarusuario.php'); ?>
	</div>
    <div align="center" id="maze_container">
		<div id="col2">
        <div id="maze" data-steps="194">
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="door exit"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin wall"></div><div class="nubbin wall"></div><div class="nubbin wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="door"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin wall"></div><div class="nubbin wall"></div><div class="nubbin wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="door"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="door"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div></div><div class="nubbin"></div><div></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div></div><div></div><div></div><div></div><div></div><div class="wall"></div><div class="key"></div><div></div><div></div><div></div><div></div><div class="wall"></div></div>
        <div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="door entrance hero"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div><div class="wall"></div></div>
        </div><div id="maze_output" style="width: 594px;"><div id="maze_score">192</div><div id="maze_message">Primero encuentra la llave</div></div>
		
		</div>
		
		<div id="col2">
			<img src="images/caperucita-original.png">
		</div>
		
        </div>
		</div>
	</div>
  <div  align="center" id="boton">
			<button onclick="window.location.href='index2.php'" class="pushy__btn pushy__btn--md pushy__btn--blue" id="sig">Siguiente</button>	
      <button id="perdio" class="pushy__btn pushy__btn--md pushy__btn--red" onclick="window.location.href='index.php'">Repetir</button>
   </br>  
			</div>
	<?php include('../footer.php'); ?>
	
<script src="mazing.js"></script>
<script src="maze-builder.js"></script>
<script>

  window.addEventListener("DOMContentLoaded", function(e) {
    var maze = new Mazing("maze");
/*  maze.setChildMode(); */
  }, false);

</script>
</body>
</html>