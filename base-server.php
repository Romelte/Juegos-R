<?php
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
?>