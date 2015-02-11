<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>	
	<title>BASIC LIQUID 3 COLUMN LAYOUT</title>
	<style type="text/css" media="all">
		@import "css/styles.css";	
	</style>
	
	<script type="text/javascript" src="javascript/script_login.js"></script>
</head>

	<body>
		
		<div id="head-wrapper">
			
			<div id="titleBox">
				<h1>myBLOG</h1>
			</div>
			
				
			<div id="loginBox">
					
				<div id="signIn"><p>Sign in</p></div>
				
				<form method="post" id="form" action="login.php">	
				
					<div id="usernameBox">
						
						<label for="username">Username:</label>
						<br/>
						<span id="validateImage"><img id="notValidated" src="#" title="" alt=""/></span>
						<input type="text" name="username" id="username" maxlength="8"/>
						
					</div>
				
					
					
					<div id="passwordBox">
					
						<label for="password">Password:</label><br/>
						<input type="password" name="password" id="password" maxlength="8"/>
					
					</div>
						
					<br/>
					<br/>
					<br/>
					
					<input type="submit" value="Login" id="login"/>	
			
				</form>	
					
				<div id="forgot" class="button">Forgot my password</div>
				<br/>
				<br/>
				
				
				<span id="txtLoginFailed" class="error">
					<?php
							
						if(isset($_GET['flag'])){
						
							echo 'Incorrect. Please try again!';                    
						
						}
					?>	
				</span>
				
				
				<span id="txtUsernameEmpty" class="error">Please provide a valid username.</span>
					
				</div>
				
				<div id="responseHead">&nbsp;</div>
				
				<div id="responseHead2">&nbsp;</div>
				
		</div>
			
		
		<div id="content-wrapper"> 
		
			<div id="login-main-wrapper">
				<h1>Welcome</h1>
				<br />
				<a href="registration.php">Create a new account</a>
				<br />
				<br />
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
				</p>
				<p>
					Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
				</p>
				<br />
			</div>

			
			<div id="login-right-column-wrapper">
				<h1>Side-bar content</h1>
				<p>Lorem ipsum dolor sit amet,
					consectetuer adipiscing elit.
					Phasellus varius eleifend.
				</p>
				<p>Donec euismod.
					Praesent mauris mi, adipiscing non,
					mollis eget, adipiscing ac, erat.
					Integer nonummy mauris sit.
				</p>

			</div>
			
			
			<div id="bottom-wrapper">
				
				<div id="bottom-content1">
					<img src="images/posts.png" title="" alt=""/>
					<br/>
					<p><strong>Your blog.</strong> Share your thoughts, photos, and more with your friends and the world.</p>
					<br/>
				</div>
				
				<div id="bottom-content2">
					<img src="images/pointer.png" title="" alt=""/>
					<br/>
					<p><strong>Easy to use.</strong> It’s easy to post text, photos, and videos from the web or your mobile phone.</p>
					<br/>
				</div>
				
				<div id="bottom-content3">
					<img src="images/crayons.png" title="" alt=""/>
					<br/>
					<p><strong>Flexible.</strong> Unlimited flexibility to personalize your blog with themes, gadgets, and more.</p>
					<br/>
				</div>

			</div>
			
		</div>
			
	
		<div id="footer-wrapper">
			<h4>Design: fED &copy; 2009 </h4>
			
			<ul>
				<li>About</li>
				<li>Terms of service</li>
				<li>Privacy</li>
				<li>Copyright</li>
				<li>Report Abuse</li>
				
			</ul>
			
		</div>
	
	</body>
</html>