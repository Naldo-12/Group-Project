<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles2.css">
	</head>
	<body>
		<div class="container">

		<?php

			session_start();

			if ($_SESSION['validate_costing']) 
			{
				foreach ($_SESSION as $key => $value) 
				{
					$$key = $value;
				}

				echo "<h2>Product Information</h2>";
				echo "<div class='product-info-box'><p><strong>Product Name:</strong> $product_name</p></div>";
				echo "<div class='product-info-box'><p><strong>Product Code:</strong> $product_code</p></div>";
				echo "<div class='product-info-box'><p><strong>Product Type:</strong> $product_type</p></div>";
				echo "<div class='product-info-box'><p><strong>Product Description:</strong> $product_description</p></div>";

				echo "<h2>Cost Information</h2>";
				echo "<div class='cost-info-box'><p><strong>Cost Price:</strong> $cost_price</p></div>";
				echo "<div class='cost-info-box'><p><strong>Sales Price:</strong> $sales_price</p></div>";
				echo "<div class='cost-info-box'><p><strong>Quantity in Stock:</strong> $quantity_in_stock</p></div>";

				// Creating product and cost files
				$file1 = fopen('product.txt', 'a+');
				$file2 = fopen('cost.txt', 'a+');

				$record1 = " | Product Name: $product_name | Product Code: $product_code | Product Type: $product_type | Product Description: $product_description | ";
				$record2 = " | Cost Price: $cost_price | Sales Price: $sales_price | Quantity in stock: $quantity_in_stock";

				session_destroy();

				// Write to product.txt
				fwrite($file1, $record1);
				fclose($file1);

				// Write to cost.txt
				fwrite($file2, $record2);
				fclose($file2);

				echo "<div class='success-message'><p>Product information has been saved. <a href='productInfo.php'>Enter another product</a></p></div>";
			}
		?>
		</div>
	</body>
</html>
