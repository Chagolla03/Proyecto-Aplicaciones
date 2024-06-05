<?php
session_start();
include_once "database.php";

$cli_id = $_SESSION['cli_id'];

function getRentedCars($pdo, $cli_id) {
    try {
        $sql_select = 'SELECT * FROM carro';
        /* $sql_select = 'SELECT carro.*, renta.ren_id, renta.ren_fecha_renta, renta.ren_fecha_devolucion
                       FROM carro 
                       INNER JOIN renta ON carro.car_id = renta.ren_car_id 
                       WHERE renta.ren_cli_id = :cli_id'; */
        $stmt = $pdo->prepare($sql_select);
        /* $stmt->bindParam(':cli_id', $cli_id, PDO::PARAM_INT); */
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        return [];
    }
}

$carros = getRentedCars($pdo, $cli_id);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Renta de Autos</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/index.css" />
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
    <section class="hero-container">
        <div class="hero-title">
            <h1>Mis reservaciones</h1>
            <p>Revisa tus reservaciones y realiza el pago correspondiente</p>
        </div>
        <img src="./assets/c1.png" alt="Imagen de ejemplo">
    </section>


    <section class="reservation-container">
    <h2>Autos rentados</h2>
      <table>
        <thead>
          <tr>
            <th>Tipo de Auto</th>
            <th>Fecha de Renta</th>
            <th>Fecha de Entrega</th>
            <th>Imagen</th>
            <th>Precio por Día</th>
            <th>Costo Extra por Día</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($carros as $registro) { ?>
          <tr>
              <td><?php echo $registro['car_categoria']; ?></td>
              <td><?php echo $registro['ren_fecha_renta']; ?></td>
              <td><?php echo $registro['ren_fecha_devolucion']; ?></td>
              <td><img src="<?php echo $registro['car_imagen']; ?>" alt="Imagen de <?php echo $registro['car_modelo']; ?>" style="height: 50px;"></td>
              <td><?php echo $registro['car_precio_dia']; ?>/día</td>
              <td>---<!-- Logica de costo extra aqui --></td>
              <td><a class="btn btn-primary btn-sm" href="pago.php?id=<?php echo $registro['ren_id']; ?>" role="button">Pagar</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>

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