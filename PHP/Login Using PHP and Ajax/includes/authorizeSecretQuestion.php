<?php
	/*
	echo "Username: ".$_GET['username']."<br/>";
	echo "Secret Answer: ".$_REQUEST['secret_answer']."<br/>";
	*/
	
	session_start();
	
	include ('functions.php');
	
	//Le paso un solo argumento porque el usurio no va ingresar el password.
	validate($_GET['username']); //¿Vuelve a validar el username? LLAMA LA FUNCION "CONECTAR()"
	
	//SQL query: add "existe" to $row array if it can count (find) an id with same username and password
	//$result = mysql_query("SELECT count(id) as existe FROM user_account WHERE username = '".$_GET['username']."' AND secret_answer = '".$_POST['secret_answer']."'") or die("Could not execute query because ". mysql_error());	
	 $result = mysql_query('SELECT * FROM user_account WHERE username="'.$_GET['username'].'" AND secret_answer="'.$_GET['secret_answer'].'"');
	 $row = mysql_fetch_assoc($result);
	
	//If $row == 1, there is an id that has same username and password
	if ($row['username'] == $_GET['username'] && $row['secret_answer'] == $_GET['secret_answer'])
		{
			
			echo 'Username = '.$row['username'].'<br/>Password = '.$row['password'].'<br/><br/><div id="loginAuthorized" class="button">Login</div>';

			mysql_close();
	
			
		}else{
		
			echo '<p class="error"> Respuesta erronea </p>
			<br/><br/><a href="index.php" class="button">Retry</a>';
			
			
			//PARA EVITAR UN ERROR! (UNA SOLUCION DE MIERDA!)
			echo '<div id="loginAuthorized" style="display:none;">Login</div>';
		
		}
	
?>