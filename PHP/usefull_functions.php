<?php

	function validate($user)
	{
	
		if(preg_match('/[\'|*|%|"|@|!|·|$|(|)|¡|=|<|>|?|¿]/', $user) == true){
		
			return false;
		
		}else{
			
			return true;
			
		}
		
	}
	
	
	
	function validateForm($user, $password, $passwordConfirm, $email)
	{
		
		$flag = false;	
		
		
		//VALIDATE USERNAME
		if (validate($user)==false || strlen($user) < 6 || strlen($user) > 12) 
		{		
				
			$_SESSION['usernameFlag'] = true;
			$flag = true;	
				
		}else{
		
			//IF  STRING IS SAFE, CONNECT TO DATABASE AND CHECK IF USER ALREADY EXISTS
			
			conectar();
		
			$result = mysql_query("SELECT count(id) as existe FROM user_account WHERE username = '".$user."'") or die("Could not execute query because ". mysql_error());
	
			$row = mysql_fetch_assoc($result);
			
			if($row['existe'] == 1){
				
				$_SESSION['usernameFlag'] = true;
				$flag = true;
			
			}
		
		}
		
		 
		 
		
		//VALIDATE  PASSWORD
		if(validate($password)==false || strlen($password) < 6 || strlen($password) > 12)
		{
	
			$_SESSION['passwordFlag'] = true;
			$flag = true;	
			
		}
		
		if(validate($passwordConfirm)==false || $passwordConfirm != $password)
		{
	
			$_SESSION['passwordFlag'] = true;
			$flag = true;	
			
		}
		
		
		
		
		//VALIDATE  EMAIL	
		if(preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email) == false){
		
			$_SESSION['emailFlag'] = true;
			$flag = true;	
		
		}else if(substr($email,(strlen($email) - 4),1) != ".")
		{		
			//no dot 4 positions before the end
			$_SESSION['emailFlag'] = true;
			$flag = true;	
		}
		

		
		
		
		//RETURN RESULT OF VALIDATION
		if($flag == true)
		{
		
			return true;
		
		}else{
		
		
			return false;
		
		}
		

		
	}
	
	
	
	
	//CONECT TO DATABASE
	function conectar()
	{

		//info needed to connect to database
		include ("connect.inc.php");
	
		//connection to the database
		$connect = mysql_connect($host, $user, $password, $database) or die ("Could not connect to database because: ". mysql_error());
	
		//select a database to work with
		$selected = mysql_select_db("db_member",$connect) or die("Could not select database because: ". mysql_error());

	}
	

?>