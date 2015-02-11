<?php
			
	include ('functions.php');
			
	//Le paso un solo argumento porque el usurio no va ingresar el password.
	validate($_GET['username']);
	
	//execute the SQL query and return records
	$result = mysql_query("SELECT count(id) as existe FROM user_account WHERE username = '".$_GET['username']."'");

	$row = mysql_fetch_assoc($result);
			
		
	if ($row['existe'] == 1)
	{	
		
		//USO UN "ID" COMO FLAG. DESPUES CON JAVASCRIPT ME FIJO CON EL ID SI VALIDO O NO!	
		echo '<img src="images/pass.png" id="pass" title="" alt=""/>';
		
		
		}else{
		
			
			echo '<img src="images/fail.png" id="fail" title="" alt=""/>';
		
		}
			
?>