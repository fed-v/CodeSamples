<?php
	session_start();
	
	//CHECK TO SEE IF USER IS LOGGED IN
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}

	include ('includes/functions.php');
	
	conectar();
	
	$result = mysql_query("select * from orderdetails");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>	

	<head>
	   <title>Orders</title>
	   
	   <style type="text/css" media="all">
			@import "css/styles.css";
		</style>
		
	</head>

	<body>



	<!------------------------------------------>
	<!-- 	NAVIGATION TABLE	  -->
	<!------------------------------------------>

	
	<table width="90%" border="1" cellpadding="1" cellspacing="1" bgcolor="#006699">
	  <tr>
	    <td width="20%" align="center" height="25"><a href="home.php"><span class="Titulos">Home</span></a></td>
	    <td width="20%" align="center"><a href="addProduct.php"><span class="Titulos">Add Product</span></a></td>
		<td width="20%" align="center"><span class="Titulos">Orders</span></td>
	    <td width="20%" align="center"><a href="includes/logout.php"><span class="Titulos">Logout</span></a></td>
	  </tr>
	</table>

	<H1>Orders List</H1>
	
	<div id="botonesDescarga">
		<a href="includes/downloadOrders.php"><input type="button" value="Download"/></a>
		<br/><br/>
	</div>

	
	<!------------------------------------------>
	<!-- 	ORDERS TABLE	  -->
	<!------------------------------------------>
	
	
    <TABLE width="90%" BORDER="1" CELLSPACING="1" CELLPADDING="1">
     
		<TR>
		
			<TD bgcolor="#006699" align="center" class="Titulos">Family</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">Category</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Products</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Referance</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Username</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">Price</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">Quantity</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">Order Number</TD>
	   		
		</TR>
		
		<?php
		
		   while($row = mysql_fetch_array($result)) 
		   {
		   
				printf("<tr>
				
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							<td class='Textos'>%s</td>
							
						</tr>", $row['family'], $row['category'], $row['products'], $row['reference'], $row['username'], $row['price'], $row['quantity'], $row['orderNbr']);  
		   }
		   
		   mysql_free_result($result);
		   
		?>
		
	</table>
	
</body>
</html>