<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];

 }else{
header('Location: index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>


<!DOCTYPE html
<html lang="es" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="css/menu.css">


    <title>Inicio</title>
</head>
<body>
    
    <!--header-->
    <div class="container">

    </div>
    <!--cuadro de niveles-->

<div class="container">
<header id="cabezote">
	<?php include('header.php'); ?>
  </header>
<div class="texto-central">
  <h1> loren implus</h1>
  <p>Loren implus Loren implus Loren implus<br>
    Loren implus Loren implus Loren implus</p>
</div>
  <div class="row">
          <div align="center" class="col-sm Nivel"> <a class="btn-juego" href="sopadeletras/index.php"><img src="images/juegos_03.png"></a>
            <a class="btn-juego" href="sopadeletras/index.php"><img src="images/botones_14.png"></a>
    </div>
          <div align="center" class="col-sm Nivel"> <a class="btn-juego" href="ahorcado/index.php"><img src="images/juegos_05.png"></a>
            <a class="btn-juego" href="ahorcado/index.php"><img class="btn-ahorcado" src="images/botones_17.png"></a>
          </div>
          <div align="center" class="col-sm Nivel"> <a class="btn-juego" href="laberinto/index.php"><img src="images/juegos_07.png"></a>
            <a class="btn-juego" href="laberinto/index.php"><img src="images/botones_12.png"></a>
          </div>
        </div>
      </div>

<?php include('footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>




