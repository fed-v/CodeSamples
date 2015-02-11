<?php
	session_start();
	
	//CHECK TO SEE IF USER IS LOGGED IN
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}else{

		include ('includes/functions.php');
	
		conectar();
	
	}
	
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>	

	<head>
	   <title>Add product</title>
	   
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
	    <td width="20%" align="center"><span class="Titulos">Add Product</span></td>
		<td width="20%" align="center"><a href="orders.php"><span class="Titulos">Orders</span></a></td>
	    <td width="20%" align="center"><a href="includes/logout.php"><span class="Titulos">Logout</span></a></td>
	  </tr>
	</table>

	<H1>Add new product</H1>
	
	
	
	<!------------------------------------------>
	<!-- 	     PRODUCT FORM	  -->
	<!------------------------------------------>
	
	<div id="addProducts">
		
		<form ACTION="includes/addNewProduct.php" METHOD="POST">
		
			<TABLE>
			
				<TR>
					<TD class="Textos">Family:</TD>
					<TD class="Textos"><INPUT TYPE="text" NAME="family" SIZE="40" MAXLENGTH="60"></TD>
				</TR>
				<TR>
					<TD class="Textos">Category:</TD>
					<TD class="Textos"><INPUT TYPE="text" NAME="category" SIZE="40" MAXLENGTH="60"></TD>
				</TR>
				<TR>
					<TD class="Textos">Product:</TD>
					<TD class="Textos"><INPUT TYPE="text" NAME="product" SIZE="40" MAXLENGTH="120"></TD>
				</TR>
				<TR>
					<TD class="Textos">Reference:</TD>
					<TD class="Textos"><INPUT TYPE="text" NAME="reference" SIZE="40" MAXLENGTH="15"></TD>
				</TR>
				<TR>
					<TD class="Textos">Price:</TD>
					<TD class="Textos"><INPUT TYPE="text" NAME="price" SIZE="40" MAXLENGTH="4"></TD>
				</TR>
		
			</TABLE>
			
			<INPUT TYPE="submit" NAME="add" VALUE="Add">
		
		</form>
	
	</div>
	
</body>
</html>