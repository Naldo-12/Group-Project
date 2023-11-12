<?php
	
	session_start();
	
		//check if submit button was pressed
		if(isset($_POST['btncost'])) 
		{
			$cost_price = $_POST["cost_price"];
			$sales_price = $_POST["sales_price"];
			$quantity_in_stock = $_POST["quantity_in_stock"];
			
			//assign registration form data to  variables using  foreach loop
			foreach($_POST as $key => $value) 
			{
				$$key = $value;
				$_SESSION[$key] = $value;
			}
			
			//error counter
			$errcount = 0;

			// validate cost price (Example: Must be a positive number)
			if ($cost_price <= 50) 
			{
				$_SESSION['errcprice'] = "<p style = 'color:red'>Cost Price must be greater than 50.</p>";
				$errcount++;
			}
			else 
			{
				$_SESSION['errcprice'] = "";
			}

			// validate sales price (Example: Must be greater than cost price)
			if ($sales_price <= $cost_price) 
			{
				$_SESSION['errsprice'] = "<p style = 'color:red'>Sales Price must be greater than Cost Price.</p>";
				$errcount++;
			}
			else 
			{
				$_SESSION['errsprice'] = "";
			}
			
			// validate quality stock (Example: Must be a positive integer)
			if ($quantity_in_stock < 0) 
			{
				$_SESSION['errQIS'] = "<p style = 'color:red'>Quantity in Stock must be a positive integer.</p>";
				$errcount++;
			}
			else 
			{
				$_SESSION['errQIS'] = "";
			}
			
			if($errcount > 0)
			{
				$_SESSION['errflag2'] = 1;
				header("Location: costingInfo.php");
			}
			else
			{
				$_SESSION['validate_costing'] = true;
				header("Location: registerProduct.php");
			}
		}
?>
