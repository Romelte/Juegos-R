<?php

session_start();
include 'base.php';

$username=$_SESSION['correo'];

$nivel = $_POST['llave'];

        
           // Datos para conectar a la base de datos.
        
           $usuariosopa= $_SESSION['correo'];

          // Crear conexión con la base de datos.
         $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

        // Validar la conexión de base de datos.
         if ($conn ->connect_error) {
         die("Connection failed: " . $conn ->connect_error);
         }
         
         $sql = "UPDATE wp_users SET user_sopa='$nivel' WHERE user_login='$usuariosopa'"; 

         if ($conn->query($sql) === TRUE) {
             echo "guardado";
           } else {
             echo "Error  " . $conn->error;
           }
           
           $conn->close();

           


                    
        

?>