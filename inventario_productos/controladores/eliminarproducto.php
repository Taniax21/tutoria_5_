<?php
require_once __DIR__ . '/../modelos/Producto.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $producto = new Producto();
    $producto->eliminar($id);
}

header('Location: ../index.php');
exit;
