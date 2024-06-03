<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <div class="container">

  <?php


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])){
      $email = $_POST["email"];
      $pass = $_POST["password"];

      require_once "database.php";
      $sql_login = "SELECT * FROM cliente WHERE cli_correo = :email";
      $stmt = $conn->prepare($sql_login);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt = $pdo->prepare($sql_login);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      //se obtiene el resultado como un array asociativo
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        if(password_verify($pass, $user["cli_contra"])){
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


    <form action="login.php" method="post">

      <div class="form-group">
        <input type="email" placeholder="Ingresa tu correo electónico" name="email" class="form-control">
      </div>

      <div class="form-group">
        <input type="password" placeholder="Ingresa tu contraseña" name="password" class="form-control">
      </div>

      <div class="form-btn">
        <input type="submit" value="Iniciar Sesión" name="login" class="btn btn-primary">
      </div>

    </form>
  </div>
</body>
</html>