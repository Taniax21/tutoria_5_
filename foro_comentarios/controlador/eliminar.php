<?php
require_once "../modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM comentarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../vistas/listado.php");
    } else {
        echo "Error: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>