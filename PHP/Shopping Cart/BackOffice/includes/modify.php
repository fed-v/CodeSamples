<?php
	session_start();		

	if(!isset($_SESSION['username']))
	{
		header("Location: ../login.php");
	}
	
	include ('functions.php');
	
	conectar();
	
	if ($_GET['action'] == 'delete')
	{
	
		$result = mysql_query("DELETE FROM productlist WHERE id={$_GET['id']}");
		
		mysql_close();
		
		header("Location: ../home.php?result=delete");
	
	}else{
	
		$result = mysql_query("SELECT * FROM productlist WHERE id={$_GET['id']}");
		
		$row = mysql_fetch_assoc($result);
		
		mysql_close();
	
	}
 
   
?>
<html>

	<head>
	   <title>Home</title>
	   
	   <style type="text/css" media="all">
			@import "../css/styles.css";
		</style>
		
	</head>

	<body>



	<!------------------------------------------>
	<!-- 	NAVIGATION TABLE	  -->
	<!------------------------------------------>

	
	<table width="90%" border="1" cellpadding="1" cellspacing="1" bgcolor="#006699">
	  <tr>
	    <td width="20%" align="center" height="25"><a href="consulta.php"><span class="Titulos">HOME</span></a></td>
	    <td width="20%" align="center"><a href="insertareg.php"><span class="Titulos">Add Product</span></a></td>
		<td width="20%" align="center"><a href="verUsuario.php"><span class="Titulos">Registrados en formaci&oacute;n</span></a></td>
		<td width="20%" align="center"><a href="verInteresados.php"><span class="Titulos">Interesados en formaci&oacute;n</span></a></td>
	  <td width="20%" align="center"><a href="eliminareg.php"><span class="Titulos">Bajas</span></a></td>
	    <td width="20%" align="center"><a href="salir.php"><span class="Titulos">Logout</span></a></td>
	  </tr>
	</table>

	<H1>Product List</H1>
	
	
	
	<!------------------------------------------>
	<!-- 	PRODUCTS TABLE	  -->
	<!------------------------------------------>
	
	
    <TABLE width="90%" BORDER=1 CELLSPACING=1 CELLPADDING=1>
     
		<TR>
		
			<TD bgcolor="#006699" align="center" class="Titulos">Family</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">Category</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Products</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Referance</TD>
	        <TD bgcolor="#006699" align="center" class="Titulos">Price</TD>
			<TD bgcolor="#006699" align="center" class="Titulos">&nbsp;</TD>
		</TR>
		
		
		
		
		<?php
	
			printf("<tr>
							
						<form name='form' method='post' action='update.php?id=".$row['ID']."'>
							
							<td><INPUT TYPE='text' NAME='family' SIZE='20' MAXLENGTH='30' value='%s'></INPUT></td>
							<td><INPUT TYPE='text' NAME='category' SIZE='20' MAXLENGTH='30' value='%s'></INPUT></td>
							<td><INPUT TYPE='text' NAME='product' SIZE='20' MAXLENGTH='30' value='%s'></INPUT></td>
							<td><INPUT TYPE='text' NAME='reference' SIZE='20' MAXLENGTH='30' value='%s'></INPUT></td>
							<td><INPUT TYPE='text' NAME='price' SIZE='20' MAXLENGTH='30' value='%s'></INPUT></td>
							<td><INPUT TYPE='submit' value='Save'></INPUT></td>
							
						</form>
							
					</tr>", $row['family'], $row['category'], $row['products'], $row['reference'], $row['price'], $row['ID']); //ID in caps because it is calling mySQL!
		   
		?>
		
	</table>
	
</body>
</html>