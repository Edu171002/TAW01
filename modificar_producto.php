<?php
include('conexBD.php');

// Obtener el email del usuario a modificar
$id_producto = $_GET['id_producto'];

$selectQuery = "SELECT nombre, descripcion, peso, precio, categoria FROM productos WHERE id_producto='$id_producto'";
$selectResult=mysqli_query($db, $selectQuery);

if ($selectResult) {
  $row = mysqli_fetch_array($selectResult);

  $nombre = $row['nombre'];
  $descripcion = $row['descripcion'];
  $peso = $row['peso'];
  $precio = $row['precio'];
  $categoria = $row['categoria'];
} else {
  echo "Error al recuperar los datos: " . mysqli_error($db);
}

?>
<form action="#" method="post">
          
          <div class="row">
            <div class="col-50">
              <p><a href="mostrar_productos_admin.php">Volver</a></p>
              <h3>Modificacion producto</h3>
              <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" id="fname" name="nombre" value="<?php echo $nombre; ?>" required>

              <label for="Descripcion"><i class="fa fa-user"></i>Descripcion</label>
              <input type="text" id="fname" name="descripcion" value="<?php echo $descripcion; ?>" required>

              <label for="Peso"><i class="fa fa-envelope"></i>Peso</label>
              <input type="text" id="Peso" name="peso" value="<?php echo $peso; ?>" required>

              <label for="precio"><i class="fa fa-envelope"></i>Precio</label>
              <input type="float" id="precio" name="precio" value="<?php echo $precio; ?>" required>

              <label for="categoria"><i class="fa fa-institution"></i>Cafeina</label>
              <input type="tinyint" id="categoria" name="categoria" value="<?php echo $categoria; ?>" required>
  
          <input type="submit" value="Aplicar" name="Aplicar" class="btn">
        </form><br>
      
<?php

@ $nombre = $_POST['nombre'];
@ $descripcion = $_POST['descripcion'];
@ $peso = $_POST['peso'];
@ $precio = $_POST['precio'];
@ $categoria = $_POST['categoria'];

$nombre=trim($nombre);
$descripcion=trim($descripcion);
$peso=trim($peso);
$categoria=trim($categoria);

if (isset($_POST['Aplicar'])) {
// Actualizar producto en la base de datos
$query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', peso='$peso', precio='$precio', categoria='$categoria' WHERE id_producto='$id_producto'";
$resultado = mysqli_query($db, $query);

  if ($resultado) {
    echo "<script>alert('Producto modificado con éxito');window.location.href='mostrar_productos_admin.php';</script>";
      
  } else {
      echo "<script>alert('ERROR DE SQL: ".mysqli_error($db)."');</script>";
  }
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
