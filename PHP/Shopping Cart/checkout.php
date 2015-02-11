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
				
				$cartFinal = $_SESSION['cart'];
				$action = $_GET['action'];
				
				switch ($action) {
								
					case 'confirm':
						
					if ($cartFinal) 
					{
						
						$items = explode(',',$cartFinal);
						$contents = array();
						foreach ($items as $item) {
							$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
						}
						
						echo "<div class='cartContent'><h1>Shopping basket confirmation</h1>";
						
						echo '<table class="cart" BORDER=0 CELLSPACING=0 CELLPADDING=0>';
						
						echo '<TR>
						  				
					        <TD bgcolor="#cccccc" align="center" class="text">Products</TD>
					        <TD bgcolor="#cccccc" align="center" class="text">Reference</TD>
							<TD bgcolor="#cccccc" align="center" class="text">Price</TD>
							<TD bgcolor="#cccccc" align="center" class="text">Quantity</TD>
					        <TD bgcolor="#cccccc" align="center" class="text">Total</TD>
					        
					       </TR>';
						
						foreach ($contents as $id=>$qty) {
							$sql = 'SELECT * FROM productlist WHERE id = '.$id;
							$result = $db->query($sql);
							$row = $result->fetch();
							extract($row);
							echo '<tr>';
							echo '<td>'.$products.'</td>';
							echo '<td>'.$reference.'</td>';
							echo '<td>&pound;'.$price.'</td>';
							echo '<td>'.$qty.'</td>';					
							echo '<td>&pound;'.($price * $qty).'</td>';
							$total += $price * $qty;
							
							$_SESSION['total'] = $total;
							
							echo '</tr>';
						}
						
						echo '<tr><td id="highlight" height="30" colspan="6" align="right"><p><strong>Grand total: &pound;'.$total.'</strong></p></td></tr>';
						echo '</table><br/><br/>';						
						
						echo '<a href="cart.php"><img src="images/button_back.png" border="0" height="34" width="95"/></a>&nbsp;&nbsp;
						<a href="checkout.php?action=checkout"><img src="images/button_checkout.png" border="0" height="34" width="95"/></a>';
												
						echo '</div>';
						
						} else {
						
							echo '<p>Your shopping basket is empty.</p>';
						
					}
					
					break;
						
					case 'checkout':
									
					  /********************************/
					 /*	   UPDATE ORDER NUMBER	  */
					/*******************************/
					
					
					$sql2 = 'SELECT * FROM orders ORDER BY id DESC LIMIT 1';
					$result2 = $db->query($sql2);
					$row2= $result2->fetch();
					extract($row2);	
					
					$newOrderNbr = ($row2['orderNbr'] + 1);
					$newDate = date('y-m-d'); 					
					
					$sql4 = "INSERT INTO orders (orderNbr, username, total, date) VALUES ('".$newOrderNbr."', '".$_SESSION['username']."', '".$_SESSION['total']."', '".$newDate."')";
					$result4 = $db->query($sql4);
					
					
					
					
					
					  /**************************/
					 /*	SAVE TO DATABASE	*/
					/*************************/
					
					//Explode content of shopping cart and strore them in an array.
					
					$items = explode(',',$cartFinal);
					$contents = array();
					
					foreach ($items as $item)
					{
						$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
					}
					
					
					
					// For each item of that array, select the info from the database using its ID and insert that info into a the "orders" table.
					
					foreach ($contents as $id=>$qty) 
					{
										
						$sql = 'SELECT * FROM productlist WHERE id = '.$id;
						$result = $db->query($sql);
						$row = $result->fetch();
						extract($row);
					
						$sql3 = "INSERT INTO orderdetails (username, products, reference, family, category, price, quantity, orderNbr) VALUES ('".$_SESSION['username']."', '".$products."', '".$reference."', '".$family."', '".$category."', '".$price."', '".$qty."', '".$newOrderNbr."')";	
						$result3 = mysql_query($sql3);	
						
					}
					
					
					
					
					  /*************************/
					 /*	        SEND MAIL	         */
					/*************************/
					
					$nombre = $_SESSION['username']; 
				    
					
				    $MBody = "<p>".$nombre." has made the following purchase:</p>".chr(13)."\n";				   
				    
					
					$items = explode(',',$cartFinal);
					$contents = array();
					
					foreach ($items as $item) 
					{
					
						$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
					
					}
					
					$MBody = $MBody."<table border='1'>";
						
					$MBody = $MBody.'<TR>
						  				
					<TD bgcolor="#eeeeee" align="center" class="text">Products</TD>
					<TD bgcolor="#eeeeee" align="center" class="text">Reference</TD>
					<TD bgcolor="#eeeeee" align="center" class="text">Price</TD>
					<TD bgcolor="#eeeeee" align="center" class="text">Quantity</TD>
					<TD bgcolor="#eeeeee" align="center" class="text">Total</TD>
					        
					</TR>';
						
					foreach ($contents as $id=>$qty) {
						$sql = 'SELECT * FROM productlist WHERE id = '.$id;
						$result = $db->query($sql);
						$row = $result->fetch();
						extract($row);
						$MBody = $MBody.'<tr>';
						$MBody = $MBody.'<td>'.$products.'</td>';
						$MBody = $MBody.'<td>'.$reference.'</td>';
						$MBody = $MBody.'<td>&pound;'.$price.'</td>';
						$MBody = $MBody.'<td>'.$qty.'</td>';					
						$MBody = $MBody.'<td>&pound;'.($price * $qty).'</td>';
						$MBody = $MBody.'</tr>';
					}
					
					$MBody = $MBody.'</table>';
						
					//$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
					//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
					//$headers .= "CC: chris@css-tricks.com\r\n";
						
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						
						
					$sendto = "fed_v@hotmail.com";   
					
					$subject = "Purchase";   
				   
					mail($sendto, $subject, $MBody, $headers);
					
					//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 	    
					echo "<div class='cartContent'><h1>Your order has been placed.</h1><br/><p>You will be contacted through e-mail. You can use your order number: <b>".$newOrderNbr."</b> to track your order.</p><a href='includes/logout.php'>Logout</a></div>"; 							
				   	   
					break;
					
				}	
				
		?>
						
	</body>
	
</html>