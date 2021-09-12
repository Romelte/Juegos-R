<?php
  session_start();
  include 'base.php';
  // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['correo'];
  $password = md5($_POST['contrasena']);
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  // Consulta segura para evitar inyecciones SQL.
  $sql = "UPDATE wp_users SET user_pass='$password' WHERE user_email='$email'";  
  $resultado = mysqli_query($conn,$sql);
  var_dump($resultado);
  // Verificando si el usuario existe en la base de datos.
  if($resultado === TRUE){
	// Redirecciono al usuario a la página principal del sitio.
    
	header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: index.php"); 

  }else{
	echo 'Error al cambiar la contraseña, <a href="olvidar.php">vuelva a intenarlo</a>.<br/>';
  }

?>