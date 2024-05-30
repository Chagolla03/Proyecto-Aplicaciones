<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <title>Registration form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
=======
  <title>Add cars</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
>>>>>>> devlop/jorge
</head>
<body>
  <div class="container">
    <?php
<<<<<<< HEAD
    if(isset($_POST["submit"])){
      $name = $_POST["name"];
      $last_name = $_POST["last_name"];
      $email = $_POST["email"];
      $pass = $_POST["password"];
      $rep_pass = $_POST["repeat_password"];
=======
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $rep_pass = $_POST['repeat_password'];
>>>>>>> devlop/jorge

      $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

      $errors = array();

      if(empty($name) OR empty($last_name) OR empty($email) OR empty($pass) OR empty($rep_pass)){
        array_push($errors, "Todos los campos son requeridos");
      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "El correo electrónico no es valido");
      }

      if(strlen($pass)<8){
        array_push($errors, "La constraseña debe ser de al menos 8 caracteres");
      }

      if($pass!==$rep_pass){
        array_push($errors, "Las contraseñas no coinciden");
      }

      //para validar que no se repitan correos ya registrados
      require_once "database.php";
<<<<<<< HEAD
      // obtenermos el número de filas que coincidan con el correo electrónico dado.
      $sql = "SELECT COUNT(*) FROM cliente WHERE cli_correo = :email";
      $stmt = $conn->prepare($sql);
=======

      // obtenemos el número de filas que coincidan con el correo electrónico dado.
      $sql = "SELECT COUNT(*) FROM cliente WHERE cli_correo = :email";
      $stmt = $pdo->prepare($sql);
>>>>>>> devlop/jorge
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      //Contamos el número de filas
      $num_Row = $stmt->fetchColumn();

      if($num_Row>0){
        array_push($errors, "El email ya está registrado");
      }

      

      if(count($errors)>0){
        foreach($errors as $error){
          echo "<div class='alert alert-danger'>$error</div>";
        }
      } else {
        try {
<<<<<<< HEAD
          $sql_insert = "INSERT INTO cliente(cli_nombre, cli_apellido, cli_correo, cli_contra)
                    VALUES ( ?, ?, ?, ?)";
                    
          $stmt = $conn->prepare($sql_insert);

          // Ejecutar la declaración con los datos
          $stmt->execute([$name, $last_name, $email, $pass_hash]);

          echo "<div class='alert alert-success'>Usuario registrado con éxito</div>";
=======
          $sql_insert = 'INSERT INTO cliente(cli_nombre, cli_apellido, cli_correo, cli_contra)
                    VALUES ( :name, :last_name, :email, :rep_pass)';
                    
          $stmt = $pdo->prepare($sql_insert);

          // Ejecutar la declaración con los datos
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':last_name', $last_name);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':rep_pass', $pass_hash);

          //Ejecutamos la consulta
          $stmt->execute();

          echo "<div class='alert alert-success'>Usuario registrado con éxito</div>";
          header("Location: login.php");
>>>>>>> devlop/jorge

        } catch (PDOException $e) {
          echo "<div class='alert alert-danger'>Error al insertar los datos: " . $e->getMessage() . "</div>";
        }
<<<<<<< HEAD


      }


=======
      }
>>>>>>> devlop/jorge
    }
    ?>
    
    <form action="registration.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="last_name" placeholder="Ingresa tus apellidos">
      </div>

      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electrónico">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="repeat_password" placeholder="Confirmar contraseña">
      </div>

      <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="Registrar" name="submit">
      </div>

    </form>
  </div>
</body>
</html>