<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];
     $puntaje =  (int)"SELECT user_points FROM wp_users WHERE user_login='$cliente'  ";

 }else{
header('Location: index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>


<!DOCTYPE html
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css-inicio/inicio.css">
    <title>Inicio</title>
</head>
<body>
    
    <!--header-->
    <div class="container">

    </div>

    <div id="sesion_cliente">
            <?php 
            //Si existe la sesión "correo"...
            if(isset($_SESSION['correo'])){
                echo "<p class='negrita'>Bienvenido ".$cliente."&nbsp;&nbsp;";
                echo "<p class='negrita'>Tus puntos Son ".$puntaje."&nbsp;&nbsp;";
                echo "<a href='index.php?salir=1'>Salir</a></p>";
                //Si existe y hemos pulsado el link "Salir"...
                if(isset($_REQUEST["salir"])){
                    //Borramos o destruimos la sesión "correo".
                    unset($_SESSION["correo"]);
                }
            }
            ?>
        </div>

    <!--cuadro de niveles-->
    <div class="container">
        <div class="row">
          <div class="col-sm Nivel">
            <h2><a href="./ahorcado/index.php">Ahorcado</a></h2>
          </div>
          <div class="col-sm Nivel">
            <h2><a href="./sopadeletras/index.php">Sopa de letras</a></h2>
          </div>
          <div class="col-sm Nivel">
            <h2><a href="#">laberinto</a></h2>
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>




