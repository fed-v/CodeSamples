<?php

	//Funcion que valida los datos ingresados antes de mandar a base de datos! (password tiene "default" porque validar "forgotPassword" no le pasa ese argumento!) 
	function validate($user, $pass="default"){
	
		if(strlen($user) < 9 && strlen($pass) < 9){
		
			conectar();
		
		}else{
		
			header("Location:index.php?flag=1");
		
		}
		
	}
	
	//Funcion que conecta a base de datos!
	function conectar(){

		//info needed to connect to database
		include ("connect.inc.php");
	
		//connection to the database
		$connect = mysql_connect($host, $user, $password, $database) or die ("could not connect to database!");
	
		//select a database to work with
		$selected = mysql_select_db("db_member",$connect) or die("Could not select Database");

	}

?>