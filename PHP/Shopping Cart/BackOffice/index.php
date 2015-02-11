<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>HOME</title>
	<style type="text/css" media="all">
		@import "css/styles.css";
	</style>
</head>

<body>
	
	<div id ="loginBox">
		<h1>LOGIN</h1>
		
			<?	
				
				if(isset($_GET['flag']))
				{
	
					echo "<h2 class='error'>Username/password incorrecto.</h2>";
		
				}	
			
			?>
		
		<form method="post" action="includes/login.php">
			
			<label>Username</label>
				<input type="text" name="username"></input><br/>
			
			<label>Password&nbsp;</label>
				<input type="password" name="password"></input><br/>
			
			<input type="submit" value="Login"></input>
		
		</form>
	</div>
	
   
</body>
</html>
