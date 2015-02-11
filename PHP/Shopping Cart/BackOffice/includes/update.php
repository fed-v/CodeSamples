<?php
	session_start();		

	if(!isset($_SESSION['username']))
	{
		header("Location: ../login.php");
	}else{
	
		include ('functions.php');
	
		conectar();
	
	}
	
	
	$newFamily = $_POST['family'];
	$newCategory = $_POST['category'];
	$newProduct = $_POST['product'];
	$newReference = $_POST['reference'];
	$newPrice = $_POST['price'];
	$id = $_GET['id'];
	
	/*
	
	CHECK VALUES:
	
	echo "Family: ".$newFamily."<br/>"; 
	echo "Category: ".$newCategory."<br/>"; 
	echo "Product: ".$newProduct."<br/>"; 
	echo "Reference: ".$newReference."<br/>"; 
	echo "Price: ".$newPrice."<br/>";  
	echo "ID: ".$id."<br/>"; 
	*/
	
	
	$result = mysql_query("UPDATE productlist SET family='$newFamily', category='$newCategory', products='$newProduct', reference='$newReference', price='$newPrice' WHERE id='$id'") or die (mysql_error());
		
	header("Location: ../home.php?result=update");
	
   
?>