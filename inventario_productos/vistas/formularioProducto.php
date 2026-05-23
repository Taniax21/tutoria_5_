<?php
// $producto puede estar definido si venimos de editarproducto.php
$isEdit = isset($producto) && !empty($producto);
$id = $isEdit ? $producto['id'] : '';
$nombre = $isEdit ? htmlspecialchars($producto['nombre']) : '';
$precio = $isEdit ? $producto['precio'] : '';
$cantidad = $isEdit ? $producto['cantidad'] : '';

$action = $isEdit ? '../controladores/actualizarproducto.php' : '../controladores/registrarproducto.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formulario Producto</title>
</head>
<body>
  <h2><?php echo $isEdit ? 'Editar producto' : 'Nuevo producto'; ?></h2>
  <form method="post" action="<?php echo $action; ?>">
    <?php if ($isEdit): ?>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    <?php endif; ?>

    <label>Nombre:<br>
      <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>
    </label>
    <br>
    <label>Precio:<br>
      <input type="number" step="0.01" name="precio" value="<?php echo $precio; ?>" required>
    </label>
    <br>
    <label>Cantidad:<br>
      <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" required>
    </label>
    <br><br>
    <button type="submit"><?php echo $isEdit ? 'Actualizar' : 'Registrar'; ?></button>
    <a href="../index.php">Volver</a>
  </form>
</body>
</html>
