<?php
include 'La-carta.php';
$pedido = new pedido;
include 'header.php';

?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
        function updateCartItem(obj, id) {
            $.get("cartAction.php", {
                action: "updateCartItem",
                id: id,
                qty: obj.value
            }, function(data) {
                if (data == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>

<div class="panel-body">


<h1>Carrito de compras</h1>
<table class="table">
	<thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Sub total</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($cart->total_items() > 0) {
			//get cart items from session
			$cartItems = $cart->contents();
			foreach ($cartItems as $item) {
		?>
				<tr>
					<td><?php echo $item["name"]; ?></td>
					<td><?php echo '$' . $item["price"] . ' COP'; ?></td>
					<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
					<td><?php echo '$' . $item["subtotal"] . ' COP'; ?></td>
					<td>
						<a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
			<?php }
		} else { ?>
			<tr>
				<td colspan="5">
					<p>No has solicitado ningún producto.....</p>
				</td>
			<?php } ?>
			</tbody>