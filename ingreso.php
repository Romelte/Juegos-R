<?php
  session_start();
  
  // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['correo'];
  $password = md5($_POST['contrasena']);
  
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
  
  // Consulta segura para evitar inyecciones SQL.
  $sql =   "SELECT id FROM wp_users WHERE user_login='$email' AND user_pass = '$password'";
  $resultado = mysqli_query($conn,$sql);
  

  
  // Verificando si el usuario existe en la base de datos.
  if(mysqli_num_rows($resultado) > 0){
	// Guardo en la sesión el email del usuario.
	$_SESSION['correo'] = $email;
	
	// Redirecciono al usuario a la página principal del sitio.
	header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: principal.php"); 

    return $_SESSION['correo'];
  }else{
	echo 'El email o password es incorrecto, <a href="index.php">vuelva a intenarlo</a>.<br/>';
  }

?>