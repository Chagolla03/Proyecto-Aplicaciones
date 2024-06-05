<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Admin Cars</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
  <div class="car-list-container my-5">
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
      <td style="display: flex; gap:1rem;">
        <a class="btn btn-primary btn-sm" href="admin_edit_car.php?id=<?php echo $registro['car_id']; ?>" role="button">Edit</a>
        <a class="btn btn-danger btn-sm" href="admin_delete_car.php?id=<?php echo $registro['car_id']; ?>" role="button">Delete</a>
        <?php if ($registro['car_estatus'] == 'Rentado') { ?>
          <a class="btn btn-warning btn-sm" href="admin_change_status.php?id=<?php echo $registro['car_id']; ?>" role="button">Cambiar a Disponible</a>
          <?php } ?>
    </td>
    </tr>
      

      <?php } ?>

    </tbody>
   </table>

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
     