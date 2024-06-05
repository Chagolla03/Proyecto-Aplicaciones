
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<<<<<<< Updated upstream
<<<<<<< HEAD
  <link rel="stylesheet" href="style.css">
=======
  <link rel="stylesheet" href="./css/style.css">
>>>>>>> devlop/jorge
</head>
<body>
  <div class="container">

  <?php
    if(isset($_POST["login"])){
      $email = $_POST["email"];
      $pass = $_POST["password"];

      require_once "database.php";
      $sql_login = "SELECT * FROM cliente WHERE cli_correo = :email";
<<<<<<< HEAD
      $stmt = $conn->prepare($sql_login);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
=======
      $stmt = $pdo->prepare($sql_login);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
>>>>>>> devlop/jorge
      $stmt->execute();

      //se obtiene el resultado como un array asociativo
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        if(password_verify($pass, $user["cli_contra"])){
          header("Location: index.html");
          die();
        } else {
          echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>El correo electrónico no coincide</div>";
      }
    }
    ?>


=======
  <link rel="stylesheet" href="./css/index.css">
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
>>>>>>> Stashed changes
    <form action="login.php" method="post">

    <h2>Iniciar sesion</h2>


      <?php

      session_start();
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        print_r($_POST["email"]);

        require_once "database.php";
        $sql_login = "SELECT * FROM cliente WHERE cli_correo = :email";
        $stmt = $pdo->prepare($sql_login);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        //se obtiene el resultado como un array asociativo
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($user["cli_contra"]);
        print_r($pass);
        
        if($user){
          if(password_verify($pass, $user["cli_contra"])){
            $_SESSION['user_id'] = $user["cli_id"];
            header("Location: index.php");
            die();
          } else {
            echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
          }
        } else {
          echo "<div class='alert alert-danger'>El correo electrónico no coincide</div>";
        }
      }
      ?>
      <div class="login-form-group">
        <input type="email" placeholder="Ingresa tu correo electónico" name="email" class="form-control">
      </div>

      <div class="login-form-group">
        <input type="password" placeholder="Ingresa tu contraseña" name="password" class="form-control">
      </div>

      <div class="form-btn">
        <input type="submit" value="Iniciar Sesión" name="login" class="btn btn-primary">
      </div>
      <div>
          <p>¿No tienes una cuenta? <a href="registration.php">Regístrate</a></p>
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