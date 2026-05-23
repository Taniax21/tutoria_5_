<?php
require_once __DIR__ . '/../modelos/Producto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0.0;
    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

    $producto = new Producto();
    $producto->crear($nombre, $precio, $cantidad);

    header('Location: ../index.php');
    exit;
}
