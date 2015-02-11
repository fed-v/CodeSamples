<?php
	
	function conectar(){

		//info needed to connect to database
		include ("connect.inc.php");
	
		//connection to the database
		$connect = mysql_connect($host, $user, $password, $database) or die ("could not connect to database because ".mysql_error());
	
		//select a database to work with
		$selected = mysql_select_db($database, $connect) or die("Could not select Database because ".mysql_error());

	}

?>