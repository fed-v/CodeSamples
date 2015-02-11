<?php
 
	include ('functions.php');
	
	conectar();
	
	
	
	/***	FALTA VALIDAR	***/
	
	
    $Sql="INSERT INTO productlist (family, category, products, reference, price)  values ('".$_POST['family']."', '".$_POST['category']."', '".$_POST['product']."', '".$_POST['reference']."', '".$_POST['price']."')";      
   
    mysql_query($Sql); 
   
    header("Location: ../home.php");
   
?>