<?php
session_start();

 $usuario = $_POST['usuario'];
 $contrasena = md5($_POST['contrasena']);
 $edad = $_POST['edad'];
 $correo_personal = $_POST['correo_personal'];
 $puntos = 0;
  // Datos para conectar a la base de datos.
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

 $sql =  "INSERT INTO wp_users (user_login,user_pass,user_nicename,user_email,user_points,user_status,display_name) VALUES ('$usuario','$contrasena','$usuario','$correo_personal','$puntos','$edad','$usuario')";


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
  