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

        //leemos los datos de cada fila
        if ($carros && count($carros) > 0) {
  
          foreach ($carros as $carro) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($carro['car_id']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_categoria']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_modelo']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_anio']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_capacidad']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_color']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_precio_dia']) . '</td>';
              echo '<td>' . htmlspecialchars($carro['car_placas']) . '</td>';
              echo '<td><img src="data:image/jpeg;base64,' . base64_encode($carro['car_imagen']) . '" alt="Imagen del carro" style="width:100px; height:auto;"></td>';
              echo '<td>';
              echo '<a class="btn btn-primary btn-sm" href="admin_edit_car.php?id=$carro[car_id]' . htmlspecialchars($carro['car_id']) . '">Edit</a> ';
              echo '<a class="btn btn-danger btn-sm" href="admin_delete_car.php?id=$carro[car_id]' . htmlspecialchars($carro['car_id']) . '">Delete</a>';
              echo '</td>';
              echo '</tr>';
          }
      } else {
          echo '<div class="alert alert-warning">No se encontraron registros.</div>';
      }
        

      } catch(PDOException $e){
        echo "Error en la consulta: " . $e->getMessage();
      }
      
      ?>
      
    
      
    </tbody>
   </table>

  </div>

</body>
</html>