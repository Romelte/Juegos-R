<?php
 
 header('Content-Type: text/html; charset=UTF-8');
 //Iniciar una nueva sesión o reanudar la existente.
 session_start();
 //Si existe la sesión "cliente"..., la guardamos en una variable.
 if (isset($_SESSION['correo'])){
     $cliente = $_SESSION['correo'];
           $nombreServidor = "localhost";
           $nombreUsuario = "root";
           $passwordBaseDeDatos = "";
           $nombreBaseDeDatos = "fundacion";
           

          // Crear conexión con la base de datos.
         $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

        // Validar la conexión de base de datos.
         if ($conn ->connect_error) {
         die("Connection failed: " . $conn ->connect_error);
         }
         
         $consulta = "SELECT user_ahorcado FROM wp_users WHERE user_login='$cliente'";
         $result =  $conn->query($consulta);

         $numero = 0;
        
         if($result){
             $fila = $result->fetch_assoc();
             $numero2 = array_values($fila);
             $numero = $numero2[0];
         }
          
         

         if($numero === '2'){
            header('Location: ./AhorcadoLvl2.php');
         }
         
         if($numero === '3'){
            header('Location: ./AhorcadoLvl3.php');
         }
        
         $conn->close();


 }else{
header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
  die() ;

 }
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<div id="sesion_cliente">
            <?php 
            //Si existe la sesión "correo"...
            if(isset($_SESSION['correo'])){
                echo "<p class='negrita'>Bienvenido ".$cliente."&nbsp;&nbsp;";
                echo "<a href='../index.php?salir=1'>Salir</a></p>";
                //Si existe y hemos pulsado el link "Salir"...
                if(isset($_REQUEST["salir"])){
                    //Borramos o destruimos la sesión "correo".
                    unset($_SESSION["correo"]);
                }
            }
            ?>
        </div>
   <title>Aplicaciçon de Ahorcado</title>
   <link type="text/css" href="css/cupertino/jquery-ui-1.8.1.custom.css" rel="Stylesheet" /> 
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui-1.8.1.custom.min.js"></script> 
<script>
function aleatorio(inferior,superior){
numPosibilidades = superior - inferior + 1
aleat = Math.random() * numPosibilidades
aleat = Math.floor(aleat)
return parseInt(inferior) + aleat
}

function esta(caracter, miarray){
//console.log("buscando ", caracter, " en ", miarray)
for(var j=0;j<miarray.length;j++){
if (caracter==miarray[j]){
      return true;
}else{
      //console.log("el caracter ", caracter, " no es el valor del array ",miarray[j] )
   }
}
return false;
}

function estanTodas(arrayAciertos, mipalabra){
   for(var i=0; i<mipalabra.length; i++){
      if(!esta(mipalabra.charAt(i),arrayAciertos))
         return false;
   }
   return true;
}

////////////////////////////////////////////////////////////////////////////////
// PALABRAS
////////////////////////////////////////////////////////////////////////////////
var palabras = ['ahorcado', 'lavadora', 'invierno'];
var palabraEscogida = palabras[aleatorio(0,palabras.length-1)]
var aciertos = [];

//console.log(palabraEscogida);

function escribePalabra(palabra, arrayAciertos){
   //console.log("estoy en escribePalabra y arrat de aciertos es: " , arrayAciertos);
   var texto = '';
   for(var i=0; i<palabra.length; i++){
      texto += "<span>";
      var cActual = palabra.charAt(i);
      if(esta(cActual,arrayAciertos)){
         texto += cActual;
      }else{
         texto += '_';
      }
      texto += "</span>";
      //console.log(cActual)
   }
   $("#letras").html(texto);
}



////////////////////////////////////////////////////////////////////////////////
//// inicio todo!!!
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
   document.getElementById('perdio').disabled=true;
    document.getElementById('perdio').style.display = 'none';
   //creo los botones con las letras
   var letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
   for(i=0; i<letras.length; i++){
      //creo el span de la letra
      letraActual = $('<span class="botonletra">' + letras[i] + '</span>');
      letraActual.data("letra",letras[i]);
      //lo convierto en un botón
      letraActual.button();
      letraActual.click(function(){
         //traigo la letra pulsada
         var miletra = $(this).data("letra").toLowerCase()
         //miro si esa letra está en la palabra
         if(palabraEscogida.indexOf(miletra)!=-1){
            //si está, va para aciertos
            aciertos.push(miletra);
            escribePalabra(palabraEscogida, aciertos);
            //miro si ha ganado
            if(estanTodas(aciertos,palabraEscogida)){
               var caja = $('<div class="dialogletra" title="Has Ganado!!">Felicidades! has adivinado la palabra!!</div>');
               caja.dialog({
               modal: true,
               width: 600,
               buttons: {
                  "Ok": function(){
                     $(this).dialog("close");
                  }
               }
               }); 
               var ahorcado = 3;
              var data_ahorcado = 'ahorcado=' + ahorcado;
              
              $.ajax({
                type: "POST",
                url: "../guardar-ahorcado.php",
                data: data_ahorcado,
                dataType:"html",
                asycn:false,
                success: function(){
                   alert("Ha sido ejecutada la acción.");
                }
        }).responseText;    
            }
         }else{
            //no estaba
            numFallos++;
            dibujaAhorado(numFallos);
            //miro si se ha perdido
            if(numFallos==6){
               var caja = $('<div class="dialogletra" title="Has Perdido!!">Lo lamento!! la palabra era: ' + palabraEscogida + '</div>');
               caja.dialog({
               modal: true,
               width: 600,
               buttons: {
                  "Ok": function(){
                     $(this).dialog("close");
                  }
               }
               
               }); 
               document.getElementById('perdio').disabled=false;
              document.getElementById('perdio').style.display = 'block';  
            }
         }
         //una vez pulsado el botón, lo desabilito y quito su evento click
         $(this).button("disable");
         $(this).unbind( "click" );
         
      })
      $("#botonesletras").append(letraActual);
   }
   
   //inicio el canvas
   dibujaAhorado(numFallos);
   
   //inicio las palabras
   escribePalabra(palabraEscogida, aciertos);
   
});

/////////////////////////////////
//CANVAS
/////////////////////////////////
function cargaContextoCanvas(idCanvas){
   var elemento = document.getElementById(idCanvas);
   if(elemento && elemento.getContext){
      var contexto = elemento.getContext('2d');
      if(contexto){
         return contexto;
      }
   }
   return false;
}
function borrarCanvas(contexto, anchura, altura){
   contexto.clearRect(0,0,anchura,anchura);
}
function dibujaHorca(ctx){
   ctx.fillStyle = '#462501';
   ctx.fillRect(64,9,26,237);
   ctx.fillRect(175,193,26,53);
   ctx.fillRect(64,193,136,15);
   ctx.fillRect(64,9,115,11);
   ctx.beginPath();
   ctx.moveTo(64,65);
   ctx.lineTo(64,80);
   ctx.lineTo(133,11);
   ctx.lineTo(118,11);
   ctx.fill();
}
function dibujaCabeza(ctx){
   var img = new Image(); 
   img.onload = function(){
      ctx.fillStyle = '#f2d666';
      ctx.drawImage(img,150,38);
      ctx.fillRect(172,12,4,28);
   } 
   img.src = 'images/picture.jpg'; 
}
function dibujaCuerpo(ctx){
   ctx.beginPath();
   ctx.moveTo(171,82);
   ctx.lineTo(168,119);
   ctx.lineTo(162,147);
   ctx.lineTo(189,149);
   ctx.lineTo(185,111);
   ctx.lineTo(183,83);
   ctx.fill()
}
function dibujaBrazoIzq(ctx){
   ctx.beginPath();
   ctx.moveTo(173,102);
   ctx.lineTo(140,128);
   ctx.lineTo(155,133);
   ctx.lineTo(178,114);
   ctx.fill()
}
function dibujaBrazoDer(ctx){
   ctx.beginPath();
   ctx.moveTo(180,99);
   ctx.lineTo(222,121);
   ctx.lineTo(209,133);
   ctx.lineTo(183,110);
   ctx.fill()
}
function dibujaPiernaIzq(ctx){
   ctx.beginPath();
   ctx.moveTo(166,142);
   ctx.lineTo(139,175);
   ctx.lineTo(164,178);
   ctx.lineTo(175,144);
   ctx.fill()
}
function dibujaPiernaDer(ctx){
   ctx.beginPath();
   ctx.moveTo(178,145);
   ctx.lineTo(193,178);
   ctx.lineTo(212,170);
   ctx.lineTo(188,142);
   ctx.fill()
}
////////////////////////////////////////////////////////
// GESTION DE FALLOS
////////////////////////////////////////////////////////
var numFallos = 0;
function dibujaAhorado(numerrores){
   var contexto = cargaContextoCanvas('canvasahorcado');
   if(contexto){
      dibujaHorca(contexto);
      if(numFallos>0){
         dibujaCabeza(contexto)
      }
      contexto.fillStyle = '#1f3e18';
      if(numFallos>1){
         dibujaCuerpo(contexto)
      }
      if(numFallos>2){
         dibujaBrazoIzq(contexto)
      }
      if(numFallos>3){
         dibujaBrazoDer(contexto)
      }
      if(numFallos>4){
         dibujaPiernaIzq(contexto)
      }
      if(numFallos>5){
         dibujaPiernaDer(contexto)
      }
      
   }
}


</script>

<style type="text/css">
    body{
       font-size: 0.7em;
       font-family: Trebuchet MS, verdana, arial, sans-serif;
    }
    .botonletra{
       font-size: 0.9em;
       margin: 2px;
       width: 30px;
       text-align: center;
    }
    .dialogletra{
       font-size: 3em;
       text-align: center;
       padding-top: 15px;
    }
    #botonesletras{
       width: 330px;
       clear: both;
    }
    #dibujoahorcado{
       margin-bottom: 20px;
    }
    #letras{
       font-size: 3em;
       text-align:center;
       width: 320px;
       clear: both;
       margin-bottom: 10px;
    }
    #letras span{
       width: 30px;
       text-align:center;
       padding-left: 5px;
    }
    </style>
    
    
    
    </head>
    
    <body>
    <div id="dibujoahorcado">
       <canvas id="canvasahorcado" width="320" height="250">
       El Ahorcado sólo funciona en navegadores que soporten Canvas. Actualízate a Firefox o Chrome, por poner dos posibilidades.
       </canvas>
    </div>
    <div id="letras">
    </div>
    <div id="botonesletras"></div>
    <div align="center" id="boton">
			<!--<button onclick="window.location.href='AhorcadoLvl2.php'" class="pushy__btn pushy__btn--md pushy__btn--blue" id="sig">Siguiente</button>-->
				<!--<button onclick="window.location.href='index2.html'" class="pushy__btn pushy__btn--md pushy__btn--green">No lo logré</button>-->
			<p></p>
         <button id="perdio" onclick="window.location.href='AhorcadoLvl2.php'">Repetir</button>
   </br>
			<button class="pushy__btn pushy__btn--md pushy__btn--red" onclick="window.location.href='../principal.php'" >Salir</button>
			</div>
			
    </body>
    </html>