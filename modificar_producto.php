<?php


// Obtener el email del usuario a modificar
$id_producto = $_GET['id_producto'];


?>
<form action="#" method="post">
          
          <div class="row">
            <div class="col-50">
              <h3>Modificacion producto</h3>
              <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" id="fname" name="nombre" placeholder="Nombre">

              <label for="Descripcion"><i class="fa fa-user"></i>Descripcion</label>
              <input type="text" id="fname" name="Descripcion" placeholder="Descripcion">


              <label for="Peso"><i class="fa fa-envelope"></i>Peso</label>
              <input type="text" id="Peso" name="Preso" placeholder="500g">

              <label for="precio"><i class="fa fa-envelope"></i>Precio</label>
              <input type="float" id="precio" name="precio" placeholder="50">


              <label for="categoria"><i class="fa fa-institution"></i>Cafeina</label>
              <input type="tinyint" id="categoria" name="categoria" placeholder="1 o 2">
  
          <input type="submit" value="Enviar" class="btn">
        </form>
      
<?php
include('conexBD.php');

@ $nombre = $_POST['nombre'];
@ $descripcion = $_POST['descripcion'];
@ $peso = $_POST['peso'];
@ $precio = $_POST['precio'];
@ $categoria = $_POST['categoria'];

$nombre=trim($nombre);
$descripcion=trim($descripcion);
$peso=trim($peso);
$categoria=trim($categoria);


// Actualizar usuario en la base de datos
$query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', peso='$peso', precio='$precio', categoria='$categoria' WHERE id_producto='$id_producto'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "Procuto actualizado correctamente.";
} else {
    echo "Error al actualizar producto: " . mysqli_error($db);
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
