<?php
	session_start();
	
	//LOGIN CONTROL
	
	/*
	//CHECK TO SEE IF USER IS LOGGED IN
	if(!isset($_SESSION['username']))
	{
		header("Location:index.php?flag=1");
	}
	*/
	
	// Include MySQL class
	require_once('includes/mysql.class.php');
		
	// Include database connection
	require_once('includes/global.inc.php');
					
	// Include functions
	require_once('includes/functions.inc.php');
	
	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

<head>
	
	<title>::SHOPPING CART::</title>
	
	<style type="text/css" media="all">
		@import "css/styles.css";	
	</style>

</head>

	<body>
	
		<?php
		
			// Process actions
			$cart = $_SESSION['cart'];
			$action = $_GET['action'];
			
			switch ($action) {
				
				case 'add':
					if ($cart) {
						$cart .= ','.$_GET['id'];
					} else {
						$cart = $_GET['id'];
					}
					break;
				
				case 'delete':
					if ($cart) {
						$items = explode(',',$cart);
						$newcart = '';
						foreach ($items as $item) {
							if ($_GET['id'] != $item) {
								if ($newcart != '') {
									$newcart .= ','.$item;
								} else {
									$newcart = $item;
								}
							}
						}
						$cart = $newcart;
					}
					break;
				
				case 'update':
				if ($cart) {
					$newcart = '';
					foreach ($_POST as $key=>$value) {
						if (stristr($key,'qty')) {
							$id = str_replace('qty','',$key);
							$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
							$newcart = '';
							foreach ($items as $item) {
								if ($id != $item) {
									if ($newcart != '') {
										$newcart .= ','.$item;
									} else {
										$newcart = $item;
									}
								}
							}
							for ($i=1;$i<=$value;$i++) {
								if ($newcart != '') {
									$newcart .= ','.$id;
								} else {
									$newcart = $id;
								}
							}
						}
					}
				}
				$cart = $newcart;
				break;
					
			}
			
			$_SESSION['cart'] = $cart;
			
		?>
						
						
		<div id="shoppingcart">

			<h1>Your Shopping Basket</h1>

			<?php
			
				echo writeShoppingCart();
			
			?>

		</div>

		<div id="contents">

			<h2>Please check quantities:</h2>

			<?php
			
				echo showCart();
			
			?>
			
		</div>
		

	</body>
	
</html>