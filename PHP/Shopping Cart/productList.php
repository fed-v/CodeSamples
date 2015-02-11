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
				
		<div id="shoppingCart">
				
			<TABLE class="tabla" width="90%" BORDER=0 CELLSPACING=0 CELLPADDING=0>
				     
				<TR>
						
					<TD class="familiaTitulo" colspan="4" width="100%" align="center" ><img src="images/logo_proteifine.png" alt="PROTÉIFINE" title="PROTÉIFINE"/></TD>
					 
				</TR>
				  
				 <TR>
						
					<TD class="category" colspan="4" width="100%" bgcolor="#d9391f" align="center"><span class="titulos">VEGETABLE SOUPS AND CREAMS (5 sachets 25g)</span></TD>
					 
				</TR> 
					 
				<TR class="title">
					
					<TD>Products</TD>
					<TD>Ref.</TD>
				    <TD>Price</TD>
				    <TD>Select</TD>
				        
				</TR>
				

				<?php 
					
					/*SELECT PRODUCTS*/					
					$result = mysql_query("select * from productlist");		
					
					
					/*PRINT PRODUCTS ON A TABLE */		
					while($row = mysql_fetch_array($result)) 
					{ 
					  					   
						printf("<tr>
									<td align='left'><p class='Textos'>".$row['products']."</p></td>
									<td align='center'>".$row["reference"]."</td>
									<td align='center'>&pound;".$row["price"]."</td>
									<td align='center'><a href='cart.php?action=add&id=".$row['ID']."'>Add to cart</a></td>
								
							</tr>");
					 
					}
					
					mysql_free_result($result);
					
				?>
				
			</TABLE>
				
		</div>		
			
</body>
</html>