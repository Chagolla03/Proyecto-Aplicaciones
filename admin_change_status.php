<?php

require_once "database.php";

// Verifica si se pasó el id del carro
if (!isset($_GET['id'])) {
    echo "No se ha especificado un carro para cambiar el estado";
    exit;
}

$car_id = $_GET['id'];

try {
    // Actualiza el estado del carro a "disponible"
    $sql_update = 'UPDATE carro SET car_estatus = "Disponible" WHERE car_id = :car_id';
    $stmt = $pdo->prepare($sql_update);
    $stmt->bindParam(':car_id', $car_id);
    $stmt->execute();

    echo "<div class='alert alert-success'>Estado del carro cambiado a disponible</div>";
    header("Location: admin_show_cars.php");
    exit;
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error al cambiar el estado del carro: " . $e->getMessage() . "</div>";
}
?>