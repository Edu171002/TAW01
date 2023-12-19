<?php 
if(isset($_POST['submit'])){ 
 
 foreach($_POST['cantidad'] as $key => $val) { 
   if($val==0) { 
     unset($_SESSION['id_pedido'][$key]); 
   }else{ 
     $_SESSION['id_pedido'][$key]['cantidad']=$val; 
   } 
 } 
  
 }
 ?>
<h1>View cart</h1> 
<a href="index.php">Go back to products page</a> 
<form method="post" action="index.php"> 
     
	<table> 
	     
		<tr> 
		    <th>Name</th> 
		    <th>Quantity</th> 
		    <th>Price</th> 
		    <th>Items Price</th> 
		</tr> 
		 
		<?php 
		 
			$sql="SELECT * FROM products WHERE id_product IN ("; 
					 
					foreach($_SESSION['id_pedido'] as $id => $value) { 
						$sql.=$id.","; 
					} 
					 
					$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
					$query=mysql_query($sql); 
					$totalprice=0; 
					while($row=mysql_fetch_array($query)){ 
						$subtotal=$_SESSION['id_pedido'][$row['id_producto']]['cantidad']*$row['precio']; 
						$totalprice+=$subtotal; 
					?> 
						<tr> 
						    <td><?php echo $row['nombre'] ?></td> 
						    <td><input type="text" name="cantidad[<?php echo $row['id_producto'] ?>]" size="5" value="<?php echo $_SESSION['id_pedido'][$row['id_producto']]['cantidad'] ?>" /></td> 
						    <td><?php echo $row['precio'] ?>$</td> 
						    <td><?php echo $_SESSION['id_pedido'][$row['id_producto']]['cantidad']*$row['precio'] ?>$</td> 
						</tr> 
					<?php 
						 
					} 
		?> 
					<tr> 
					    <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
					</tr> 
		 
	</table> 
	<br /> 
	<button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>
