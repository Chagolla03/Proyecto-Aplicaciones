<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <title>Registration form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<<<<<<< Updated upstream
  <link rel="stylesheet" href="style.css">
=======
  <title>Add cars</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
>>>>>>> devlop/jorge
=======
  <link rel="stylesheet" href="./css/index.css">

>>>>>>> Stashed changes
</head>
<body>
    <header>
        <nav class="nav-container">
            <div class="logo">
                <img src="./assets/logo.png" alt="Logo de la empresa">
                <p>Autos BJX</p>
            </div>
            <ul class="nav-links">
                <li onClick="window.location.href='index.php'"><a href="#">Regresar</a></li>
            </ul>
        </nav>
    </header>
  <div class="login-container">
    
    <form class="" action="registration.php" method="post">

      <h2>Registro de Usuario</h2>
      
    <?php
<<<<<<< Updated upstream
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
=======

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $rep_pass = $_POST["repeat_password"];
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
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
=======
  //para validar que no se repitan correos ya registrados
  require_once "database.php";

  // obtenemos el número de filas que coincidan con el correo electrónico dado.
  $sql = "SELECT COUNT(*) FROM cliente WHERE cli_correo = :email";
  $stmt = $pdo->prepare($sql);
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
      $sql_insert = 'INSERT INTO cliente(cli_nombre, cli_apellido, cli_correo, cli_contra)
                VALUES ( :name, :last_name, :email, :rep_pass)';
                
      $stmt = $pdo->prepare($sql_insert);

      // Ejecutar la declaración con los datos
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':last_name', $last_name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':rep_pass', $pass_hash);

      //Ejecutamos la consulta
>>>>>>> Stashed changes
      $stmt->execute();

      echo "<div class='alert alert-success'>Usuario registrado con éxito</div>";
      header("Location: login.php");

<<<<<<< Updated upstream
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
=======
    } catch (PDOException $e) {
      echo "<div class='alert alert-danger'>Error al insertar los datos: " . $e->getMessage() . "</div>";
    }
}
}
?>
>>>>>>> Stashed changes
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

      <div>
          <p>Ya tienes cuenta? <a href="login.php">Inicia sesion</a></p>
      </div>
    </form>
  </div>

  <footer class="footer text-center">
    <div class="footer-section">
      <div class="logo">
        <img src="./assets/logo.png" alt="Logo de la empresa">
        <p>Autos BJX</p>
      </div>
      <div class="social-icons">
        <a href="#"><img src="./assets/facebook.svg" alt="Facebook"></a>
        <a href="#"><img src="./assets/instagram.svg" alt="Instagram"></a>
        <a href="#"><img src="./assets/youtube.svg" alt="YouTube"></a>
        <a href="#"><img src="./assets/twitter.svg" alt="Twitter"></a>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer-section">
      <div class="footer-links">
        <h5>Gestiona tu reserva</h5>
        <a onClick="window.location.href='detalle.php'" href="#">Revisar mis Reservaciones</a>
        <a href="#">Facturación</a>
        <a href="#">Obtener promociones</a>
      </div>
      <div class="footer-links">
        <h5>Más información</h5>
        <a href="#">Políticas y requisitos de renta</a>
        <a href="#">Formas de pago</a>
        <a href="#">Aviso de Privacidad</a>
        <a href="#">Preguntas Frecuentes</a>
      </div>
      <div class="footer-links">
        <h5>Contáctanos</h5>
        <p>Reservaciones: +52 462 123 7337</p>
        <p>Servicio al cliente: +52 462 123 7337</p>
        <p>contacto@autosbjx.com</p>
        <p>Atención por WhatsApp</p>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer-section">
      <h5>Formas de pago</h5>
      <img style="filter: invert(1);" src="./assets/visa.png" alt="Visa">
      <img style="filter: invert(1);" src="./assets/mastercard.png" alt="MasterCard">
      <img style="filter: invert(1);" src="./assets/amex.png" alt="American Express">
      <img style="filter: invert(1);" src="./assets/paypal.png" alt="Paypal">
      <img src="./assets/esr.png" alt="ESR">
      <img src="./assets/safe-travels.png" alt="Safe Travels">
    </div>
  </footer>
</body>
</html>