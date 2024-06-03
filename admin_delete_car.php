<?php

  require_once "database.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Creamos la consulta
    try{
      $sql_delete = 'DELETE FROM carro WHERE car_id = :id';

      $stmt = $pdo->prepare($sql_delete);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      if($stmt){
        header("Location: admin_show_cars.php");
      } else {
        echo "<div class='alert alert-danger'>No se pudo borrar el modelo</div>";
      }
    } catch(PDOException $e){
      echo "Error en la consulta: " . $e->getMessage();
    }   
  }

?>