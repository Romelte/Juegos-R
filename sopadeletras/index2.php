<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];
     $puntos = (int)"SELECT user_status FROM wp_puntos WHERE user_email='$cliente'  ";


 }else{
header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sopa de letras RED</title>
		<link href="css/pushy-buttons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/estilos.css">
		<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');
</style>
    </head>
    <div id="sesion_cliente">
            <?php 
            //Si existe la sesión "correo"...
            if(isset($_SESSION['correo'])){
                echo "<p class='negrita'>Bienvenido ".$cliente."&nbsp;&nbsp;";
                echo "<p class='negrita'>Tus puntos Son ".$puntos."&nbsp;&nbsp;";
                echo "<a href='../index.php?salir=1'>Salir</a></p>";
                //Si existe y hemos pulsado el link "Salir"...
                if(isset($_REQUEST["salir"])){
                    //Borramos o destruimos la sesión "correo".
                    unset($_SESSION["correo"]);
                }
            }
            ?>
        </div>
    <body>
        <!-- Add required markup -->
<div id="general">
	<div id="container">
		<header id="cabezote">
			<div id="menu">
			<img src="images/maqueta_06.png">
			</div>
	<div id="titulo">Sopa de Letras</div>
			<div id="logo-libro">
			<img src="images/maqueta_03.png">
			</div>		
			
			</header>
		
		<section id="sopa">
		<div id="col2">
		<div align="center" class="descripcion2">Encuentra las palabras listadas, que tienen relación con nuestro capítulo "La niña que creció luchando por los niños".</div>
        <div align="center" class="palabras" id="puzzle-words"></div>
        <div align="center" id="boton">
			<button onclick="window.location.href='index3.php'" class="pushy__btn pushy__btn--md pushy__btn--blue">Siguiente</button>			
			<input type="button" class="pushy__btn pushy__btn--md pushy__btn--green" id="solveBTN" value="Resolver" align="middle"/>
			<p></p>
			<button class="pushy__btn pushy__btn--md pushy__btn--red">Salir</button>
			</div>
			</div>
			
			<div id="col2">
		        <div align="center" class="nivel2" id="puzzle-container"></div>
				</div>
		</section>
		
		<div align="center" id="nina-animada">
		  <img src="images/escribiendo-animada.gif" class="nina-animada">
		</div>
		</div>
</div>
        <!-- dependencias -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="js/wordfind.js"></script>
        <script src="js/wordfindgame.js"></script>
        <!--logica -->
        <script>
            // palabras a usar
            var words = ['colombia', 'españa', 'francia', 'china', 'siria', 'africa',
               'magdalena', 'peru', 'universidad', 'venezuela', 'aniversario',
               'respiracion'
           ];

            //  !
            var gamePuzzle = wordfindgame.create(words, '#puzzle-container', '#puzzle-words');

            $("#solveBTN").click(function(){
                // muestra donde estan las palabras !
                var result = wordfindgame.solve(gamePuzzle, words);
                console.log(result);
            });
        </script>
    </body>
</html>

