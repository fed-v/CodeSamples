<?php
	session_start();
	
	include ('includes/functions.php');
	
	validate($_POST['username'], $_POST['password']);
	///inicio de funcion
	
	//SQL query: add "existe" to $row array if it can count (find) an id with same username and password
	$result = mysql_query("SELECT count(id) as existe FROM user_account WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'") or die("Could not execute query because ". mysql_error());	
	
	$row = mysql_fetch_assoc($result);
	mysql_close();
	//fin de funcion 
	
	//If $row == 1, there is an id that has same username and password
	if ($row['existe'] == 1)
		{
			//If I find the right combo, store the username and continue
			$_SESSION['username'] = $_POST['username'];
			header("Location:home.php");		
			
		}else{
	
			header("Location:index.php?flag=1");
		
		}
?>