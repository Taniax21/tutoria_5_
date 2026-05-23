<?php
require_once __DIR__ . '/../modelos/Producto.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $productoModel = new Producto();
    $producto = $productoModel->obtener($id);
    // Mostrar el formulario con los datos cargados
    require_once __DIR__ . '/../vistas/formularioProducto.php';
    exit;
}

header('Location: ../index.php');
exit;
