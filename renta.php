<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once "database.php";

// El id del carro que queremos rentar
if (!isset($_GET['id'])) {
    echo "No se ha especificado un carro para renta";
    exit;
}

$car_id = $_GET['id'];

try {
    // Verificar el estado del carro
    $sql_select = 'SELECT car_estatus FROM carro WHERE car_id = :car_id';
    $stmt = $pdo->prepare($sql_select);
    $stmt->bindParam(':car_id', $car_id);
    $stmt->execute();
    $car = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($car['car_estatus'] == 'Rentado') {
        echo "<div class='alert alert-danger'>Este carro ya está rentado</div>";
        exit;
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error al verificar el estado del carro: " . $e->getMessage() . "</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <div class="car-form-container">
        <h2>Renta de Carros</h2>
        <form action="procesar_renta.php" method="post">
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required placeholder="Ingresa la ciudad">
            
            <label for="lugar-renta">Lugar de Renta:</label>
            <input type="text" id="lugar-renta" name="lugar-renta" required placeholder="Ingresa el lugar de renta">
            
            <label for="fecha-renta">Fecha de Renta:</label>
            <input type="date" id="fecha-renta" name="fecha_renta" required>
            
            <label for="hora-renta">Hora de Renta:</label>
            <input type="time" id="hora-renta" name="hora_renta" required>
            
            <label for="fecha-devolucion">Fecha de Devolución:</label>
            <input type="date" id="fecha-devolucion" name="fecha_devolucion" required>
            
            <label for="hora-devolucion">Hora de Devolución:</label>
            <input type="time" id="hora-devolucion" name="hora_devolucion" required>
            
            <input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>"> <!-- ID del carro desde la URL -->
            
            <button type="submit">Rentar</button>
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
