<?php
	
	session_start();
	
		if(isset($_SESSION['errflag2'])) 
		{
			unset($_SESSION['errflag2']);
			
			foreach($_SESSION as $key => $value)
			{
					$$key = $value;
			}        
		}
		else
		{
			$cost_price = $sales_price = $quantity_in_stock =  "";
			$errcprice = $errsprice = $errQIS = "";
		}
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Costing Information</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body class = "bluebg">
		<h1>Costing Information</h1>
		
		<form action="validate_costing.php" method="POST" enctype = "multipart/form-data">
		
			<label for="cost_price">Cost Price:</label>
			<input type="number" id="cost_price" placeholder = "[Cost Price]" title = "Enter the price" value = "<?php echo $cost_price; ?>" name="cost_price" required><?php echo $errcprice; ?><br>

			<label for="sales_price">Sales Price:</label>
			<input type="number" id="sales_price" placeholder = "[Sales Price]" title = "Enter the sales price" value = "<?php echo $sales_price; ?>" name="sales_price" required><?php echo $errsprice; ?><br>

			<label for="quantity_in_stock">Quantity in Stock:</label>
			<input type="number" id="quantity_in_stock" value = "<?php echo $quantity_in_stock; ?>" name="quantity_in_stock" required><?php echo $errQIS; ?><br>

			<input type="submit" name="btncost" value="Submit">
		</form>
	</body>
</html>
