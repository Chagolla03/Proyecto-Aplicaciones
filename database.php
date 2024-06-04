<?php

//definimos las variables para la conexión
$dsn = "mysql:host=localhost:8889;dbname=rentas;charset=utf8";
$username = "root";
$password = "root";

try {
  // PDO = PHP Data Objects
  $pdo = new PDO($dsn, $username, $password);
  
  // pdo ya no es una variable, ya es un objeto
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e){
  echo "Error al conectar la base de datos: " . $e->getMessage();
}

?>