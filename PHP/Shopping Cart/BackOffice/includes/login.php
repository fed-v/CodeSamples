<?php	
	
	session_start();
	
	include ('functions.php');
	
	conectar();
	
	
	$result = mysql_query("SELECT count(id) as existe FROM users WHERE user = '".$_POST['username']."' AND password = '".$_POST['password']."'") or die("Could not execute query because ". mysql_error());	
	
	$row = mysql_fetch_assoc($result);
	
	mysql_close();	
	
	
	//If $row == 1, there is an id that has same username and password
	if ($row['existe'] != 1)
	{
		session_destroy();
		header("Location:../index.php?flag=1");
		
	}else{
		
		$_SESSION['username'] = $_POST['username'];
		
		header("Location:../home.php");
	
	}
	
?>