<?php
			
	include ('functions.php');
			
	//Le paso un solo argumento porque el usurio no va ingresar el password.
	validate($_GET['username']);
	
	//execute the SQL query and return records
	$result = mysql_query("SELECT count(id) as existe FROM user_account WHERE username = '".$_GET['username']."'");

	$row = mysql_fetch_assoc($result);
			
		
	if ($row['existe'] == 1)
	{	
		
		$result2 = mysql_query("SELECT password, secret_question, secret_answer FROM user_account WHERE username = '".$_GET['username']."'") or die("Could not execute query because ". mysql_error());
		$row2 = mysql_fetch_assoc($result2);
			
		echo '<h2 class="error">Please answer secret question:</h2>
		<br/>
		<form method="post" action="authorizeSecretQuestion.php?username='.$_GET['username'].'">'
		
		.$row2['secret_question'].
		'<br/>
		<br/>
		<label for="secret_answer">Answer:</label>
		<input type="text" name="secret_answer" id="secret_answer" maxlength="100" style="background-color:#fff;"/>
		<br/>
		<br/>
		<div id="submit" class="button">submit</div>
		<br/>
		<br/>
		</form>
		</div>';		
		
/*		
		}else{
		
			//header("Location:index.php?flag=1");
			echo '<h2 class="error">Username does not exist in this server!</h2>
			<br/><br/><a href="index.php" class="button">Retry</a>';
	*/	
		}
			
?>