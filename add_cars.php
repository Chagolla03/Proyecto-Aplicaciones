<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <div class="container">
    <?php
    require_once "database.php";

    if(isset($_POST['submit'])){
      $categoria = $_POST['categoria'];
      $modelo = $_POST['modelo'];
      $anio = $_POST['anio'];
      $capacidad = $_POST['capacidad'];
      $color = $_POST['color'];
      $precio = $_POST['precio'];
      $placas = $_POST['placas'];

      if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
      } else {
        $imagen = null;
      }

      $errors = array();

      if(empty($categoria) || empty($modelo) || empty($anio) || empty($capacidad) || empty($color) || empty($precio) || empty($placas) || empty($imagen)){
        array_push($errors, "Todos los campos son requeridos");
      }

      if(strlen($placas) < 9){
        array_push($errors, "Las placas deben ser 9 caracteres incluido los guiones");
      }

      //Verificamos que las placas no se repitan
      $sql_verificar = 'SELECT COUNT(*) FROM carro WHERE car_placas = :placas';
      $stmt_verificar = $pdo->prepare($sql_verificar);
      $stmt_verificar->bindParam(':placas', $placas);
      $stmt_verificar->execute();
      //Variable donde guardamos todo lo que regresa la consulta
      $placa_repetida = $stmt_verificar->fetchColumn();

      if($placa_repetida>0){
        array_push($errors, "Esta placa ya fue registrada");
      }

      if(count($errors) > 0){
        foreach($errors as $error){
          echo "<div class='alert alert-danger'>$error</div>";
        }
      } else {
        try {
          $sql_insert = 'INSERT INTO carro(car_categoria, car_modelo, car_anio, car_capacidad, car_color, car_precio_dia, car_placas, car_imagen)
                            VALUES(:categoria, :modelo, :anio, :capacidad, :color, :precio, :placas, :imagen)';

          $stmt = $pdo->prepare($sql_insert);

          $stmt->bindParam(':categoria', $categoria);
          $stmt->bindParam(':modelo', $modelo);
          $stmt->bindParam(':anio', $anio);
          $stmt->bindParam(':capacidad', $capacidad);
          $stmt->bindParam(':color', $color);
          $stmt->bindParam(':precio', $precio);
          $stmt->bindParam(':placas', $placas);
          $stmt->bindParam(':imagen', $imagen);

          $stmt->execute();

          echo "<div class='alert alert-success'>Vehículo registrado correctamente</div>";
          header("Location: admin_show_cars.php");
        } catch(PDOException $e){
          echo "<div class='alert alert-danger'>Error al insertar los datos: " . $e->getMessage() . "</div>";
        }
      }
    }
    ?>

    <form action="add_cars.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <select id="categoria" name="categoria" class="form-select" aria-label="Default select example">
          <option value="">Selecciona una categoria</option>
          <option value="Automóvil de Lujo">Automóvil de Lujo</option>
          <option value="Automóvil Intermedio">Automóvil intermedio</option>
          <option value="Automóvil Eléctrico">Automóvil Eléctrico</option>
          <option value="Camioneta de Lujo">Camioneta de Lujo</option>
          <option value="Camioneta Intermedia">Camioneta Intermedia</option>
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
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>

      <div class="form-group">
        <select id="capacidad" name="capacidad" class="form-select" aria-label="Default select example">
          <option value="">Selecciona la capacidad de pasajeros</option>
          <option value="5">5</option>
          <option value="8">8</option>
        </select>
      </div>

      <div class="form-group">
        <select id="color" name="color" class="form-select" aria-label="Default select example">
          <option value="">Selecciona el color del modelo</option>
        </select>
      </div>

      <div class="form-group">
        <input type="text" placeholder="Ingresa precio por día de renta" name="precio" class="form-control">
      </div>

      <div class="form-group">
        <input type="text" placeholder="Ingresa las placas del modelo" name="placas" class="form-control">
      </div>

      <div class="form-group">
        <div class="file-upload">
          <input type="file" name="imagen" id="imagen" class="file-input" autocomplete="off" required>
          <label for="imagen" class="file-label">
            <i class="fas fa-cloud-upload-alt"></i> Foto del modelo Max 500KB
          </label>  
        </div>
      </div>

      <div class="form-btn">
        <input type="submit" class="btn btn-success" value="Registrar" name="submit">
      </div>
    </form>
  </div>
  <script src="./js/add_cars.js"></script>
</body>
</html>
