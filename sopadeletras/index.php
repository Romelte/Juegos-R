<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];
           $nombreServidor = "127.0.0.1";
           $nombreUsuario = "u860849274_juegos";
           $passwordBaseDeDatos = "lucheTTi-01";
           $nombreBaseDeDatos = "u860849274_juegos";
           

          // Crear conexión con la base de datos.
         $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

        // Validar la conexión de base de datos.
         if ($conn ->connect_error) {
         die("Connection failed: " . $conn ->connect_error);
         }
         
         $consulta = "SELECT user_sopa FROM wp_users WHERE user_login='$cliente'";
         $result =  $conn->query($consulta);

         $numero = 0;
        
         if($result){
             $fila = $result->fetch_assoc();
             $numero2 = array_values($fila);
             $numero = $numero2[0];
         }
          
         

         if($numero === '2'){
            header('Location: ./index2.php');
         }
         
         if($numero === '3'){
            header('Location: ./index3.php');
         }
        
         $conn->close();


 }else{
header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>
<!DOCTYPE html>
<html>
	
    <?php include('head.php'); ?>
	
    <body>
        <!-- Add required markup -->
<div id="general">
	<div id="container">
		<header id="cabezote">
		<?php include('header.php'); ?>
		</header>
	
		<div id="sesion_cliente">
	<?php include('../mostrarusuario.php'); ?>
	</div>
		
		<section id="sopa">
		<div id="col2">
		<div align="center" class="descripcion1">Encuentra las palabras listadas, que tienen relación con nuestro capítulo "La niña que creció luchando por los niños".</div>
        <div align="center" class="palabras" id="puzzle-words"></div>
        <div align="center" id="boton">
			<button onclick="window.location.href='index2.php' "class="pushy__btn pushy__btn--md pushy__btn--blue" id="sig" >Siguiente</button>			
			<!--<input type="button" class="pushy__btn pushy__btn--md pushy__btn--green" id="solveBTN" value="Resolver" align="middle"/> -->
		  <p></p>
        </div>
			</div>
			
			<div id="col2">
		        <div align="center" id="puzzle-container"></div>
				</div>
		</section>
		
		<div align="center" id="nina-animada">
		  <img src="images/escribiendo-animada.gif" class="nina-animada">
		</div>
		</div>
</div>
		<?php include('../footer.php'); ?>
        <!-- dependencias -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="js/wordfind.js"></script>
        <script src="js/wordfindgame.js"></script>
        <!--logica -->
        <script>
            // palabras a usar
            var words = ['colombia'
           ];

            //  !
            var gamePuzzle = wordfindgame.create(words, '#puzzle-container', '#puzzle-words');

            $("#solveBTN").click(function(){
                // muestra donde estan las palabras !
                var result = wordfindgame.solve(gamePuzzle, words);
                console.log(result);
                alert("Intenalo otra vez");
                 
    
            });
            

        </script>
     

    </body>
</html>

