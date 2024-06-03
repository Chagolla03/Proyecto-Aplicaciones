<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Admin Cars</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

  <div class="container my-5">
    <h2>Lista de carros</h2>
    <a class="btn btn-primary" href="add_cars.php" role="button">Agregar Carro</a>
    <br>

   <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Modelo</th>
        <th>Año</th>
        <th>Capacidad</th>
        <th>Color</th>
        <th>Precio por dia</th>
        <th>placas</th>
        <th>Estado</th>
        <th>Imagen</th>
      </tr>
    </thead>
    <tbody>

      <?php
      include_once "database.php";

      try{
        //Realizamos la consulta
        $sql_select = 'SELECT * FROM carro';
        $stmt = $pdo->prepare($sql_select);
        $stmt->execute();

        //recuperamos los datos
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);        
      } catch(PDOException $e){
        echo "Error en la consulta: " . $e->getMessage();
      }
      ?>

      <?php foreach($carros as $registro){  ?>

    <tr>
      <th scope="row"><?php echo $registro['car_id']?></th>
      <td><?php echo $registro['car_categoria']?></td>
      <td><?php echo $registro['car_modelo']?></td>
      <td><?php echo $registro['car_anio']?></td>
      <td><?php echo $registro['car_capacidad']?></td>
      <td><?php echo $registro['car_color']?></td>
      <td><?php echo $registro['car_precio_dia']?></td>
      <td><?php echo $registro['car_placas']?></td>
      <td><?php echo $registro['car_estatus']?></td>

      <td><img src="<?php echo $registro['car_imagen']?>" alt="Imagen de <?php echo $registro['car_modelo']?>" class="img-fluid" style="max-width: 200px; max-height: 200px;"></td>   
      <td>
        <a class="btn btn-primary btn-sm" href="admin_edit_car.php?id=<?php echo $registro['car_id']; ?>" role="button">Edit</a>
        <a class="btn btn-danger btn-sm" href="admin_delete_car.php?id=<?php echo $registro['car_id']; ?>" role="button">Delete</a>
      </td>
    </tr>
      

      <?php } ?>

    </tbody>
   </table>

  </div>

</body>
</html>