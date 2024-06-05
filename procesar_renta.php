<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "database.php";

    $car_id = $_POST['car_id'];
    $ciudad = $_POST['ciudad'];
    $lugar_renta = $_POST['lugar-renta'];
    $fecha_renta = $_POST['fecha_renta'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $hora_renta = $_POST['hora_renta'];
    $hora_devolucion = $_POST['hora_devolucion'];

    if (empty($ciudad) || empty($lugar_renta) || empty($fecha_renta) || empty($fecha_devolucion) || empty($hora_renta) || empty($hora_devolucion) || empty($car_id)) {
        echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
        exit;
    }

    try {
        $sql_select = 'SELECT car_estatus, car_precio_dia FROM carro WHERE car_id = :car_id';
        $stmt = $pdo->prepare($sql_select);
        $stmt->bindParam(':car_id', $car_id);
        $stmt->execute();
        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car['car_estatus'] == 'Rentado') {
            echo "<div class='alert alert-danger'>Este carro ya está rentado</div>";
            exit;
        }

        $pdo->beginTransaction();

        $sql_insert = 'INSERT INTO renta(ren_ciudad_de_renta, ren_lugar_de_renta, ren_fecha_renta, ren_fecha_devolucion, ren_hora_renta, ren_hora_devolucion, ren_cli_id, ren_car_id)
                       VALUES (:ciudad, :lugar_renta, :fecha_renta, :fecha_devolucion, :hora_renta, :hora_devolucion, :user_id, :car_id)';
        
        $stmt = $pdo->prepare($sql_insert);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':lugar_renta', $lugar_renta);
        $stmt->bindParam(':fecha_renta', $fecha_renta);
        $stmt->bindParam(':fecha_devolucion', $fecha_devolucion);
        $stmt->bindParam(':hora_renta', $hora_renta);
        $stmt->bindParam(':hora_devolucion', $hora_devolucion);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':car_id', $car_id);
        $stmt->execute();

        $sql_update = 'UPDATE carro SET car_estatus = "Rentado" WHERE car_id = :car_id';
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->bindParam(':car_id', $car_id);
        $stmt_update->execute();

        $pdo->commit();

        // Almacenar las fechas de renta, devolución y la tarifa diaria en la sesión
        $_SESSION['fecha_renta'] = $fecha_renta;
        $_SESSION['fecha_devolucion'] = $fecha_devolucion;
        $_SESSION['tarifa_diaria'] = $car['car_precio_dia'];

        echo "<div class='alert alert-success'>Renta realizada con éxito</div>";
        header("Location: pago.php");
        exit;
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "<div class='alert alert-danger'>Error al procesar la renta: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Método de solicitud no válido</div>";
}
?>
