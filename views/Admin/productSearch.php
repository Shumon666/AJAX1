<?php
		require '../../controllers/productController.php';

		$key=$_GET["key"];
	
		$products = searchProduct($key);
?>

<table>
	<?php
	
			foreach($products as $product)
                            {
                                echo "<tr>";
                                echo "<td>".$product["p_id"]."</td>";
                                echo "<td>".$product["name"]."</td>";
                                echo "<td>".$product["quantity"]."</td>";
                                echo "<td>".$product["price"]."</td>";
                                echo "<td>".$product["remarks"]."</td>";
                                echo "<td>".$product["v_id"]."</td>";
                                
                                echo "</tr>";
                            }
		
	?>
</table>