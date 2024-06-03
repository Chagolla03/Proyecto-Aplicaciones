<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de Renta de Auto</title>
    <link rel="stylesheet" href="css/pago.css">
</head>
<body>
    <div class="ticket">
        <h2>Pagar Renta de Auto</h2>
        <img src="assets/tarjeta.jfif" alt="Ícono de Tarjeta" class="img">
        <form id="paymentForm">
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
            <button type="submit">Pagar</button>
        </form>
    </div>
    <script src="js/pago.js"></script>
</body>
</html>