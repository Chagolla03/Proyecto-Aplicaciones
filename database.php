<?php

//definimos las variables para la conexión
$dsn = "mysql:host=localhost:3306;dbname=rentas;charset=utf8";
$username = "root";

try {
  // PDO = PHP Data Objects
<<<<<<< Updated upstream
<<<<<<< HEAD
  $conn = new PDO($dsn, $username, $password);
  
  // conn ya no es una variable, ya es un objeto
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======
  $pdo = new PDO($dsn, $username, $password);
=======
  $conn = new PDO($dsn, $username);
  
  // conn ya no es una variable, ya es un objeto
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO($dsn, $username);
>>>>>>> Stashed changes
  
  // conn ya no es una variable, ya es un objeto
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> devlop/jorge
} catch (PDOException $e){
  echo "Error al conectar la base de datos: " . $e->getMessage();
}

?>