<?php

	session_start();
	
	
		//check if submit button was pressed
		if(isset($_POST['btnproduct'])) 
		{
			$product_name = $_POST["product_name"];
			$product_code = $_POST["product_code"];
			$product_type = $_POST["product_type"];
			$product_description = $_POST["product_description"];
			
			//assign registration form data to  variables using  foreach loop
			foreach($_POST as $key => $value) 
			{
				$$key = $value;
				$_SESSION[$key] = $value;
			}
			
			//error counter
			$errcount = 0;

			// validate product name (Example: At least 7 characters)
			if (strlen($product_name) < 2) 
			{
				$_SESSION['errpname'] = "<p style = 'color:red;'>Product Name must be at least 2 characters.</p>";
				$errcount++;
			}
			else 
			{
				$_SESSION['errpname'] = "";
			}
			//pattern for product name
			if(!preg_match("/^[A-Z][A-Za-z']+$/", $product_name))
			{
				$_SESSION['errpname'] = "<p style ='color:red;'>Product Name must begin with a CAPITAL LETTER.</p>";
				$errcount++;
			}
			else
			{
				$_SESSION['errpname'] = "";
			}

			// validate product code (Example: Alphanumeric, 6 characters)
			if (!preg_match("/^[A-Za-z0-9]{6}$/", $product_code)) 
			{
				$_SESSION['errpcode'] = "<p style ='color:red;'>Invalid Product Code. It must be alphanumeric and 6 characters.</p>";
				$errcount++;
			}
			else 
			{
				$_SESSION['errpcode'] = "";
			}

			// validate product type
			if($product_type=="")
			{
				$_SESSION['errptype'] = "<p style ='color:red;'>Please select a product type.</p>";
				$errcount++;
			}
			else
			{
				$_SESSION['errptype'] = "";
			}
			
			//validate description
			if($product_description == null)
			{
				$product_description = "...";
			}
			
			if($errcount > 0)
			{
				$_SESSION['errflag'] = 1;
				header("Location: productInfo.php");
			}
			else
			{
				$_SESSION['validate_product'] = true;
				header("Location: costingInfo.php");
			}
			
		}	
?>
