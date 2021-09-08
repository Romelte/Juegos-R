<?php
session_start();

 $usuario = $_POST['usuario'];
 $contrasena = md5($_POST['contrasena']);
 $edad = $_POST['edad'];
 $correo_personal = $_POST['correo_personal'];
 $sopa = 0;
 $ahorcado = 0;
 $laberinto =0;
  // Datos para conectar a la base de datos.
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

 $sql =  "INSERT INTO wp_users (user_login,user_pass,user_nicename,user_email,user_sopa,user_ahorcado,user_laberinto,user_status,display_name) VALUES ('$usuario','$contrasena','$usuario','$correo_personal','$sopa','$ahorcado','$laberinto','$edad','$usuario')";


  if (mysqli_query($conn, $sql)) {

    echo'<script type="text/javascript">
    alert("usuario Creado");
    window.location.href="index.php";
    </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    mysqli_close($conn);

?>
  