<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Obtener las fechas y la tarifa diaria desde la sesión
$fecha_renta = $_SESSION['fecha_renta'];
$fecha_devolucion = $_SESSION['fecha_devolucion'];
$tarifa_diaria = $_SESSION['tarifa_diaria'];

// Calcular el total de días
$datetime1 = new DateTime($fecha_renta);
$datetime2 = new DateTime($fecha_devolucion);
$interval = $datetime1->diff($datetime2);
$dias = $interval->days + 1; // +1 para incluir el día de devolución

// Calcular el total a pagar
$total = $dias * $tarifa_diaria;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de Renta de Auto</title>
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
    <div class="ticket-container">
        <h2>Pagar Renta de Auto</h2>
        <img src="assets/tarjeta.jfif" alt="Ícono de Tarjeta" class="img">
        <form id="paymentForm">

        <div class="form-group">
                <label for="total">Total a pagar:</label>
                <input type="text" id="total" name="total" value="<?php echo "$" . $total; ?>" readonly>
        </div>

            <div class="form-group">
                <label for="cardNumber">Número de Tarjeta:</label>
                <input type="text" id="cardNumber" name="cardNumber" required>
                <span id="cardNumberError" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="expiryDate">Fecha de Expiración (MM/AA):</label>
                <input type="text" id="expiryDate" name="expiryDate" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <label for="cardHolderName">Nombre del Titular:</label>
                <input type="text" id="cardHolderName" name="cardHolderName" required>
            </div>
            <button class="btn-primary" type="submit">Pagar</button>
        </form>
    </div>

    <footer class="footer text-center">
        <!-- footer content -->
    </footer>
    <script src="js/pago.js"></script>
    <script>
        // Manejar el evento de clic del botón "Pagar"
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.btn-primary').addEventListener('click', function() {
                // Redirigir a la página principal
                window.location.href = 'index.php';
            });
        });
</body>
</html>
