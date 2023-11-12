<?php
	
	session_start();
	
		if(isset($_SESSION['errflag']) && $_SESSION['errflag'] == true) // IF TRUE, then page redirected after validation failed
		{
			unset($_SESSION['errflag']);
			
			foreach($_SESSION as $key => $value)
			{
					$$key = $value;
			}        
		}
		else
		{
			$product_name = $product_code = $product_type = $product_description = "";
			$errpname = $errpcode = $errptype =  "";
		}
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Product Information</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
		<body class = "bluebg">
			<h1>Product Information</h1>
			
			<form action="validate_product.php" method="POST" enctype = "multipart/form-data">
			
				<label for="product_name">Product Name:</label>
				<input type="text" id="product_name" placeholder = "[Product Name]" title = "Enter product name (e.g. Samsung)" value = "<?php echo $product_name; ?>" name="product_name" required><?php echo $errpname; ?><br>

				<label for="product_code">Product Code:</label>
				<input type="text" id="product_code" placeholder = "[Product Code]" title = "Enter product code(e.g. ST1033)" value = "<?php echo $product_code; ?>" name="product_code" required><?php echo $errpcode; ?><br>

				<label for="product_type">Product Type:</label>
				
				<select id="product_type" name="product_type">
					<option value = "" <?php if($product_type == ""){echo "selected";} ?>  >-- Please select a product type --</option>
					<option value="USB Drive" <?php if($product_type == "USB Drive"){echo "selected";} ?>>USB Drive</option>
					<option value="Hard Drive" <?php if($product_type == "Hard Drive"){echo "selected";} ?>>Hard Drive</option>
					<option value="SSD" <?php if($product_type == "SSD"){echo "selected";} ?>>SSD</option>
				</select><?php echo $errptype;?><br>
				<br>

				<label for="product_description">Product Description:</label>
				<textarea id="product_description" name="product_description" rows="4" cols="50"></textarea><br>

				<input type="submit" name="btnproduct" value="Store">
			</form>
		</body>
</html>
