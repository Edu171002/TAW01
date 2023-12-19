<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="keyword" name="nombre">
    <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" id="keyword" name="descripcion">
    <br>
    <label for="precioMin">Precio desde:</label>
    <input type="number" id="precioMin" name="precioMin" min="0">
    <label for="precioMax">hasta:</label>
    <input type="number" id="precioMax" name="precioMax" min="0">
    <br>
    <label for="pesoMin">Peso desde:</label>
    <input type="number" id="pesoMin" name="pesoMin" min="0">
    <label for="pesoMax">hasta:</label>
    <input type="number" id="pesoMax" name="pesoMax" min="0">
    <br>
    <label for="cafeina">Cafeina:</label>
    <select id="cafeina" name="cafeina">
      <option value="cafeinado">Cafeinado</option>
      <option value="descafeinado">Descafeinado</option>
    </select>
    <br>

    <button type="submit">Buscar</button>
  </form>

<?php
 

$db = mysqli_connect('localhost', 'root', 'mysql', 'cafe');
    


if (!isset($_POST['precioMin'])){$_POST['precioMin'] = '';}

if (!isset($_POST['precioMax'])){$_POST['precioMax'] = '';}

if (!isset($_POST['pesoMin'])){$_POST['pesoMin'] = '';}

if (!isset($_POST['pesoMax'])){$_POST['pesoMax'] = '';}




$keyword = $_POST['keyword'];

if ($_POST["nombre"] == '' AND $_POST['descripcion'] == '' AND $_POST['precioMin'] == '' AND $_POST['precioMax'] == '' AND $_POST['pesoMin'] == '' AND $_POST['pesoMax'] == '') {

$query ="SELECT * FROM productos where ";
$resultado = mysqli_query($db, $query);

echo' <div class="product-grid">';
$num=mysqli_num_rows($resultado);

if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {

    for($i=0;$i<$num;$i++){
        $row=mysqli_fetch_array($resultado);
        $array_imagen=explode('@',$row['imagen']);
        echo '<div class="product-square">';
            echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
            echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
            echo '<p class="product-description">'.$row['descripcion'].'</p>';        
        echo '</div>';
    }
}

}

if ($_POST["nombre"] != '' ){

        $query .= "SELECT id_producto, nombre, descripcion, precio, imagen FROM productos WHERE nombre LIKE ('%".$Keyword."%' ";
        $resultado = mysqli_query($db, $query);
       
        echo' <div class="product-grid">';
        
        $num=mysqli_num_rows($resultado);
    
        if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
    
            for($i=0;$i<$num;$i++){
                $row=mysqli_fetch_array($resultado);
                $array_imagen=explode('@',$row['imagen']);
                echo '<div class="product-square">';
                    echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                    echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                    echo '<p class="product-description">'.$row['descripcion'].'</p>';        
                echo '</div>';
            }
        }
    }

if ($_POST["precioMax"] != '' ){

        $query .= " SELECT id_producto, nombre, descripcion, precio, imagen 
                    FROM productos
                    WHERE descripcion LIKE ('%".$Keyword[0]."%') ";
        $resultado = mysqli_query($db, $query);
       
        echo' <div class="product-grid">';
        
        $num=mysqli_num_rows($resultado);
    
        if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
    
            for($i=0;$i<$num;$i++){
                $row=mysqli_fetch_array($resultado);
                $array_imagen=explode('@',$row['imagen']);
                echo '<div class="product-square">';
                    echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                    echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                    echo '<p class="product-description">'.$row['descripcion'].'</p>';        
                echo '</div>';
            }
        }
    }
if ( $_POST['descripcion'] != '' ){

    $query .= "SELECT id_producto, nombre, descripcion, precio, imagen 
                FROM productos 
                WHERE descripcion LIKE '%" . $keywords . "%''"<="' '".$_POST['descripcion']."' ";
    $resultado = mysqli_query($db, $query);
   
    echo' <div class="product-grid">';
       
    
    $num=mysqli_num_rows($resultado);
    
    if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
    
        for($i=0;$i<$num;$i++){
            $row=mysqli_fetch_array($resultado);
            $array_imagen=explode('@',$row['imagen']);
            echo '<div class="product-square">';
                echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                echo '<p class="product-description">'.$row['descripcion'].'</p>';        
            echo '</div>';
        }
    }
    
    }
    
    
    
    if ( $_POST['precioMin'] != '' ){
    
    $query .= " SELECT id_producto, nombre, descripcion, precio, imagen 
                FROM productos 
                WHERE descripcion LIKE '%" . $keywords . "%' '"<="'  '".$_POST['precioMin']."' ";
    $resultado = mysqli_query($db, $query);
    
    echo' <div class="product-grid">';
       
    
    
    $num=mysqli_num_rows($resultado);
    
    if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
    
        for($i=0;$i<$num;$i++){
            $row=mysqli_fetch_array($resultado);
            $array_imagen=explode('@',$row['imagen']);
            echo '<div class="product-square">';
                echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                echo '<p class="product-description">'.$row['descripcion'].'</p>';        
            echo '</div>';
        }
    }
}    






if ( $_POST['pesoMin'] != '' ){

$query .= " SELECT id_producto, nombre, descripcion, precio, imagen 
            FROM productos  
            WHERE precio >= '".$_POST['pesoMin']."' ";
$resultado = mysqli_query($db, $query);
$query ="SELECT * FROM productos ";
echo' <div class="product-grid">';
   


$num=mysqli_num_rows($resultado);

if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {

    for($i=0;$i<$num;$i++){
        $row=mysqli_fetch_array($resultado);
        $array_imagen=explode('@',$row['imagen']);
        echo '<div class="product-square">';
            echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
            echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
            echo '<p class="product-description">'.$row['descripcion'].'</p>';        
        echo '</div>';
    }
}

}



if ( $_POST['pesoMax'] != '' ){

$query .= " SELECT id_producto, nombre, descripcion, precio, imagen 
            FROM productos 
            WHERE precio <= '".$_POST['pesoMax']."' ";
$resultado = mysqli_query($db, $query);

echo' <div class="product-grid">';
   


$num=mysqli_num_rows($resultado);

if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {

    for($i=0;$i<$num;$i++){
        $row=mysqli_fetch_array($resultado);
        $array_imagen=explode('@',$row['imagen']);
        echo '<div class="product-square">';
            echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
            echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
            echo '<p class="product-description">'.$row['descripcion'].'</p>';        
        echo '</div>';
    }
}

}

?>




