<section>
<?php
    if($cart)
	{
        echo '<table>';
        echo '<tr><th></th><th>Item</th><th>Type</th><th>Unit Price</th><th>Quantity</th><th>Item Subtotal</th></tr>';
        $total = 0;
        $orders = array_keys($cart);
        foreach($orders as $order)
		{
            
            $tokens = explode(":", $order);

            $item = $tokens[0];
            $type = $tokens[1];
            $price = (float)$tokens[2];
            $quantity = (float)$cart["$order"];
            
            $subtotal = $price * $quantity;
            $total += $subtotal;
            
            $fprice = money_format('%.2n', $price);
            $fsubtotal = money_format('%.2n', $subtotal);
            $ftotal = money_format('%.2n', $total);
            
            echo "<tr><td><form action='$fullpath/delete' method='post'><input type='hidden' name='order' value='$order'><input name='action' type='submit' value='X'></form></td>";
            echo "<td>$item</td><td>$type</td><td>$fprice</td><td>$quantity</td><td>$fsubtotal</td></tr>";
        }
        echo "<tr><td colspan='6' id='total'>= $ftotal</td></tr>";
        echo '</table>';
        echo '<br/><button onclick="checkout()">Checkout</button>';
    }
    else
	{
        echo '<h3>Your cart is empty.</h3>';
    }    
?>
<script>
function checkout(){
    window.alert("Your order is sent! Thank you");
    window.location.href="<?php echo $fullpath ?>/checkout";
    }
</script>
</section>
