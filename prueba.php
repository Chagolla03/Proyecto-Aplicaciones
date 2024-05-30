<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link rel="stylesheet" href="./css/prueba.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Renta de Carros</h2>
            <form action="pago.html" method="get">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required placeholder="Ingresa la ciudad">
                
                <label for="lugar-renta">Lugar de Renta:</label>
                <input type="text" id="lugar-renta" name="lugar-renta" required placeholder="Ingresa el lugar de renta">
                
                <label for="fecha-renta">Fecha de Renta:</label>
                <input type="date" id="fecha-renta" name="fecha-renta" required>
                
                <label for="hora-renta">Hora de Renta:</label>
                <input type="time" id="hora-renta" name="hora-renta" required>
                
                <label for="fecha-devolucion">Fecha de Devolución:</label>
                <input type="date" id="fecha-devolucion" name="fecha-devolucion" required>
                
                <label for="hora-devolucion">Hora de Devolución:</label>
                <input type="time" id="hora-devolucion" name="hora-devolucion" required>
                
                <button type="submit">Rentar</button>
            </form>
        </div>
    </div>
</body>
</html>