<?php
require_once "../modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $mensaje = $_POST["mensaje"];

    $sql = "INSERT INTO comentarios (usuario, mensaje) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $mensaje);

    if ($stmt->execute()) {
        header("Location: ../vistas/listado.php");
    } else {
        echo "Error: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>