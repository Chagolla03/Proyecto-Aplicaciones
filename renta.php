<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link rel="stylesheet" href="./css/renta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Renta de Carros</h2>
            <form action="procesar_renta.php" method="post">

            <div class="form-group">
            <select id="ciudad" name="ciudad" class="form-select" aria-label="Default select example">
                 <option value="">Selecciona una ciudad</option>
                 <option value="Irapuato">Irapuato</option>
                 <option value="León">León</option>
            </select>
            </div>

            <div class="form-group">
                <select id="lugar-renta" name="lugar-renta" class="form-select" aria-label="Default select example">
                    <option value="">Ingresa el lugar de renta</option>
                </select>
            </div>

                
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
    </div>
</body>
</html>
