<?php



	  /*****************************/
	 /***	    VALIDATE		***/
	/*****************************/

	function validate($string)
	{
	
		if(preg_match('/[\?|\%|\"|\'|.|,|*|@|"|!|·|$|(|)|¡|=|<|>|?|¿]/', $string) == true){
		
			return false;
		
		}else{
			
			return true;
			
		}
		
	}



	  /*********************************/
	 /***	   SHOPPING CART		***/
	/*********************************/


	function writeShoppingCart() {
		$cart = $_SESSION['cart'];
		if (!$cart) {
			return '<p>You have no items in your shopping basket.</p>';
		} else {
			// Parse the cart session variable
			$items = explode(',',$cart);
			$s = (count($items) > 1) ? 's':'';
			return '<p>You have <b>'.count($items).' item'.$s.'</b> in your shopping basket.</p>';
		}
	}

	function showCart() {
		global $db;
		$cart = $_SESSION['cart'];
		if ($cart) {
			$items = explode(',',$cart);
			$contents = array();
			foreach ($items as $item) {
				$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			}
			$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
			$output[] = '<table class="cart" BORDER=0 CELLSPACING=0 CELLPADDING=0>';
			$output[] = '<tr bgcolor="#cccccc">
								 <TD align="center">Remove</TD>
								 <TD align="center">Description</TD>
								 <TD align="center">Referance</TD>
								 <TD align="center">Price</TD>
								 <TD align="center">Qty</TD>
								 <TD align="center">Total</TD>
						</tr>';
						
			foreach ($contents as $id=>$qty) {
				$sql = 'SELECT * FROM productlist WHERE id = '.$id;
				$result = $db->query($sql);
				$row = $result->fetch();
				extract($row);
				$output[] = '<tr>';
				$output[] = '<td align="center"><a href="cart.php?action=delete&id='.$id.'"><img src="images/button_remove.png" border="0" height="18" width="18" alt="Remove" title="Remove"/></a></td>';
				$output[] = '<td>'.$products.'</td>';
				$output[] = '<td>'.$reference.'</td>';
				$output[] = '<td>&pound;'.$price.'</td>';
				$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="2" maxlength="3" /></td>';
				$output[] = '<td>&pound;'.($price * $qty).'</td>';
				$total += $price * $qty;
				$output[] = '</tr>';
			}
			$output[] = '<tr><td id="highlight" height="30" colspan="6" align="right"><p><strong>Grand total: &pound;'.$total.'</strong></p></td></tr>';
			$output[] = '</table><br/><br/>';
			$output[] = '<div v-align="bottom"><input type="image" name="submit" src="images/button_update.png" width="95" height="34">&nbsp;&nbsp;&nbsp;<a href="productList.php"><img src="images/button_add.png" height="34" width="95" border="0"/></a>&nbsp;&nbsp;&nbsp;<a href="checkout.php?action=confirm"><img src="images/button_confirm.png" border="0" height="34" width="95"/></a></div>';	
			$output[] = '</form>';
		} else {
			$output[] = '<p>Your shopping basket is empty.</p>';
			$output[] = '<a href="productList.php"><img src="images/button_add.png" alt="Add more items" title="Add more items" height="34" width="95" border="0"/></a>';
		}
		return join('',$output);
	}

?>
