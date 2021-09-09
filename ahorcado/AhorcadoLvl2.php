
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
         
         $consulta = "SELECT user_ahorcado FROM wp_users WHERE user_login='$cliente'";
         $result =  $conn->query($consulta);

         $numero = 0;
        
         if($result){
             $fila = $result->fetch_assoc();
             $numero2 = array_values($fila);
             $numero = $numero2[0];
         }
          
         

         if($numero === '0'){
            header('Location: ./index.php');
         }
         
         if($numero === '2'){
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
	<meta charset="utf-8">
   <title>Aplicaciçon de Ahorcado</title>
   <link type="text/css" href="css/cupertino/jquery-ui-1.8.1.custom.css" rel="Stylesheet" />
	<link rel="stylesheet" href="css/estilos.css">
	<link href="css/pushy-buttons.css" rel="stylesheet">
	
	
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui-1.8.1.custom.min.js"></script> 
   
	<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');
</style>

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
var palabras = ['ahorcado'];
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
   var ahorcado=0;
   document.getElementById('sig').disabled=true;
    document.getElementById('sig').style.display = 'none';
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
            //miro si ha ganado GANAR ES ACA 
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
               document.getElementById('sig').disabled=false;
              document.getElementById('sig').style.display = 'block';
              ahorcado = 2;
              var data_ahorcado = 'ahorcado=' + ahorcado;

              $.ajax({
                type: "POST",
                url: "../guardar-ahorcado.php",
                data: data_ahorcado,
                dataType:"html",
                asycn:false,
                success: function(){
                   //alert("Ha sido ejecutada la acción.");
                }
               
        }).responseText;
        
            }
         }else{
            //no estaba
            numFallos++;
            dibujaAhorado(numFallos);
            if(numFallos==2){
               document.getElementById("dibujoahorcado").innerHTML='<img src="images/error2.gif" />';
            }
            //miro si se ha perdido
            if(numFallos==3){
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
               document.getElementById("dibujoahorcado").innerHTML='<img src="images/Volando-animado-600px.gif" />'; 
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
   
      document.getElementById("dibujoahorcado").innerHTML='<img src="images/error1.png" />';
   
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
		<div id="general">
	<div id="container">
		<header id="cabezote">
		<?php include('header.php'); ?>
		</header>
		<div id="sesion_cliente">
	<?php include('../mostrarusuario.php'); ?>
	</div>
		<section id="ahorcado">
			<div id="col2">
				<div align="center" class="descripcion1">
				  <p>Frase de prevención, <span style="font-style: italic">tip</span> o consejo.</p>
				  <p><br></p>
				  <p>
					</p>
				</div>
    <div id="dibujoahorcado">
       <canvas id="canvasahorcado" width="320" height="250">
       El Ahorcado sólo funciona en navegadores que soporten Canvas. Actualízate a Firefox o Chrome, por poner dos posibilidades.
       </canvas>
    </div>
			</div>	
		<div id="col2">
			<div align="center" id="bg-letras">
				<div align="left" id="pista"><span style="text-align: left; font-size: 24px; font-weight: bold;">Pista:</span><br><span style="text-align: left; font-size: 18px;"> Una consecuencia del Abuso Sexual Infantil</span></div>
    <div id="letras">
    </div>
    <div id="botonesletras"></div>
				</div>
			<div align="center" id="boton">
			<button onclick="window.location.href='AhorcadoLvl3.php'" class="pushy__btn pushy__btn--md pushy__btn--blue" id="sig">Siguiente</button>	
				<!--<button onclick="window.location.href='index2.html'" class="pushy__btn pushy__btn--md pushy__btn--green">No lo logré</button>-->
			<p></p>
         <button id="perdio" class="pushy__btn pushy__btn--md pushy__btn--red" onclick="window.location.href='AhorcadoLvl2.php'">Repetir</button>
   </br>
         
			</div>
			</div>
		</section>
			</div>
    </body>
    </html>