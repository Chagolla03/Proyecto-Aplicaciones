<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <div class="container">
    <?php

    require_once "database.php";

    //Si se mandó el id del usuario desde la página
    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $sql_query = 'SELECT * FROM carro WHERE car_id = :id';
      $stmt = $pdo->prepare($sql_query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      //Para que solamente se cargue un registro
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Cuando se suba el formulario
    if(isset($_POST['submit'])){
      $car_id = $_POST['car_id'];
      $categoria = $_POST['categoria'];
      $modelo = $_POST['modelo'];
      $anio = $_POST['anio'];
      $capacidad = $_POST['capacidad'];
      $color = $_POST['color'];
      $precio = $_POST['precio'];
      $placas = $_POST['placas'];

      $imagen = isset($_FILES["imagen"]["name"]) ? $_FILES["imagen"]["name"] : "";

      $errors = array();

      if(empty($categoria) || empty($modelo) || empty($anio) || empty($capacidad) || empty($color) || empty($precio) || empty($placas)){
        array_push($errors, "Todos los campos son requeridos");
      }

      if(strlen($placas) < 9){
        array_push($errors, "Las placas deben ser 9 caracteres incluido los guiones");
      }

      // Verificamos que las placas no se repitan (excepto para el propio registro)
      $sql_verificar = 'SELECT COUNT(*) FROM carro WHERE car_placas = :placas AND car_id != :id';
      $stmt_verificar = $pdo->prepare($sql_verificar);
      $stmt_verificar->bindParam(':placas', $placas);
      $stmt_verificar->bindParam(':id', $car_id);
      $stmt_verificar->execute();
      $placa_repetida = $stmt_verificar->fetchColumn();

      if($placa_repetida > 0){
        array_push($errors, "Esta placa ya fue registrada");
      }

      if(count($errors) == 0){
        try {
          if(!empty($imagen)) {
            //Código para adjuntar la fotografía
          $fecha_foto = new DateTime();
          $nombreArchivo_foto = ($imagen!='')?$fecha_foto->getTimestamp()."_".$_FILES["imagen"]["name"]:"";

          $tmp_foto = $_FILES["imagen"]["tmp_name"];

          if($tmp_foto!=""){
            move_uploaded_file($tmp_foto, "./".$nombreArchivo_foto);
          }
          
            $sql_update = 'UPDATE carro SET car_categoria = :categoria, car_modelo = :modelo, car_anio = :anio, car_capacidad = :capacidad, car_color = :color, car_precio_dia = :precio, car_placas = :placas, car_imagen = :imagen WHERE car_id = :id';
            $stmt = $pdo->prepare($sql_update);
            $stmt->bindParam(':imagen', $nombreArchivo_foto);
          } else {
            $sql_update = 'UPDATE carro SET car_categoria = :categoria, car_modelo = :modelo, car_anio = :anio, car_capacidad = :capacidad, car_color = :color, car_precio_dia = :precio, car_placas = :placas WHERE car_id = :id';
            $stmt = $pdo->prepare($sql_update);
          }

          $stmt->bindParam(':categoria', $categoria);
          $stmt->bindParam(':modelo', $modelo);
          $stmt->bindParam(':anio', $anio);
          $stmt->bindParam(':capacidad', $capacidad);
          $stmt->bindParam(':color', $color);
          $stmt->bindParam(':precio', $precio);
          $stmt->bindParam(':placas', $placas);
          $stmt->bindParam(':id', $car_id);

          $stmt->execute();

          echo "<div class='alert alert-success'>Vehículo actualizado correctamente</div>";
          header("Location: admin_show_cars.php");
        } catch(PDOException $e){
          echo "<div class='alert alert-danger'>Error al actualizar los datos: " . $e->getMessage() . "</div>";
        }
      } else {
        foreach($errors as $error){
          echo "<div class='alert alert-danger'>$error</div>";
        }
      }
    }

    ?>

    <form action="admin_edit_car.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="car_id" value="<?php echo $registro['car_id']; ?>">

      <div class="form-group">
        <select id="categoria" name="categoria" class="form-select" aria-label="Default select example">
          <option value="">Selecciona una categoria</option>
          <option value="Automóvil de Lujo" <?php if($registro['car_categoria'] == 'Automóvil de Lujo') echo 'selected'; ?>>Automóvil de Lujo</option>
          <option value="Automóvil Intermedio" <?php if($registro['car_categoria'] == 'Automóvil Intermedio') echo 'selected'; ?>>Automóvil Intermedio</option>
          <option value="Automóvil Eléctrico" <?php if($registro['car_categoria'] == 'Automóvil Eléctrico') echo 'selected'; ?>>Automóvil Eléctrico</option>
          <option value="Camioneta de Lujo" <?php if($registro['car_categoria'] == 'Camioneta de Lujo') echo 'selected'; ?>>Camioneta de Lujo</option>
          <option value="Camioneta Intermedia" <?php if($registro['car_categoria'] == 'Camioneta Intermedia') echo 'selected'; ?>>Camioneta Intermedia</option>
        </select>
      </div>

      <div class="form-group">
        <select id="modelo" name="modelo" class="form-select" aria-label="Default select example">
          <option value="">Selecciona un modelo</option>
        </select>
      </div>

      <div class="form-group">
        <select id="anio" name="anio" class="form-select" aria-label="Default select example">
          <option value="">Selecciona el año del modelo</option>
          <option value="2021" <?php if($registro['car_anio'] == '2021') echo 'selected'; ?>>2021</option>
          <option value="2022" <?php if($registro['car_anio'] == '2022') echo 'selected'; ?>>2022</option>
          <option value="2023" <?php if($registro['car_anio'] == '2023') echo 'selected'; ?>>2023</option>
          <option value="2024" <?php if($registro['car_anio'] == '2024') echo 'selected'; ?>>2024</option>
        </select>
      </div>

      <div class="form-group">
        <select id="capacidad" name="capacidad" class="form-select" aria-label="Default select example">
          <option value="">Selecciona la capacidad de pasajeros</option>
          <option value="2" <?php if($registro['car_capacidad'] == '2') echo 'selected'; ?>>2</option>
          <option value="5" <?php if($registro['car_capacidad'] == '5') echo 'selected'; ?>>5</option>
          <option value="8" <?php if($registro['car_capacidad'] == '8') echo 'selected'; ?>>8</option>
        </select>
      </div>

      <div class="form-group">
        <select id="color" name="color" class="form-select" aria-label="Default select example">
          <option value="">Selecciona el color del modelo</option>
        </select>
      </div>

      <div class="form-group">
        <input type="text" placeholder="Ingresa precio por día de renta" name="precio" class="form-control" value="<?php echo $registro['car_precio_dia']; ?>">
      </div>

      <div class="form-group">
        <input type="text" placeholder="Ingresa las placas del modelo" name="placas" class="form-control" value="<?php echo $registro['car_placas']; ?>">
      </div>

      <div class="form-group">
        <div class="file-upload">
          <input type="file" name="imagen" id="imagen" class="file-input" autocomplete="off">
          <!-- Aquí puedes mostrar una vista previa de la imagen actual si quieres -->
        </div>
      </div>

      <div class="form-btn">
        <input type="submit" class="btn btn-success" value="Actualizar" name="submit">
      </div>
    </form>
  </div>
  <script src="./js/add_cars.js"></script>
</body>
</html>
