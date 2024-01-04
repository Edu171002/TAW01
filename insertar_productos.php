<?php
session_start();
?>
<p><a href="admin_site.php">Volver</a></p>

<form action="insertar_productos.php" method="post">

    <div class="row">
        <div class="col-50">
            <h3>Insertar producto</h3>
            <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
            <input type="text" id="fname" name="nombre" placeholder="Nombre" maxlength="30" required>

            <label for="Descripcion"><i class="fa fa-user"></i>Descripcion</label>
            <input type="text" id="fname" name="descripcion" placeholder="Descripcion" required>


            <label for="Peso"><i class="fa fa-envelope"></i>Peso</label>
            <input type="text" id="Peso" name="peso" placeholder="500g" maxlength="5" required>

            <label for="precio"><i class="fa fa-envelope"></i>Precio</label>
            <input type="float" id="precio" name="precio" placeholder="50" required>

            <label for="categoria"><i class="fa fa-institution"></i>Cafeina</label>
            <input type="tinyint" id="categoria" name="categoria" placeholder="1 o 2" required>
  
        <input type="submit" value="Insertar" name="Insertar" class="btn">
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


// Insertar productos en la base de datos
if(isset($_POST['Insertar'])){
$query = "INSERT INTO productos(id_producto, nombre, descripcion, peso, precio, imagen, categoria) VALUES (NULL, '$nombre', '$descripcion', '$peso', '$precio', 'imagenes/placeholder.png', '$categoria')";
$resultado = mysqli_query($db, $query);


    if ($resultado) {
        echo "<script>alert('Producto añadido con éxito');window.location.href='admin_site.php';</script>";
        
    } else {
        echo "<script>alert('ERROR DE SQL: ".mysqli_error($db)."');</script>";
    }
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>