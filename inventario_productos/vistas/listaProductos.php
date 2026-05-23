<?php
require_once __DIR__ . '/../modelos/Producto.php';

$productoModel = new Producto();
$productos = $productoModel->listar();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de Productos</title>
</head>
<body>
  <h1>Inventario de Productos</h1>
  <p><a href="vistas/formularioProducto.php">Nuevo producto</a></p>
  <table border="1" cellpadding="6" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($productos as $p): ?>
        <tr>
          <td><?php echo $p['id']; ?></td>
          <td><?php echo htmlspecialchars($p['nombre']); ?></td>
          <td><?php echo $p['precio']; ?></td>
          <td><?php echo $p['cantidad']; ?></td>
          <td>
            <a href="controladores/editarproducto.php?id=<?php echo $p['id']; ?>">Editar</a>
            |
            <a href="controladores/eliminarproducto.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Eliminar este producto?');">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
