	
	<!------------------------------------------------>
	<!-----			    HTML FORM			 --------->
	<!------------------------------------------------>

	<form action="includes/uploadImage.php" method="POST" enctype="multipart/form-data">
			
			
			<label for="image">Add Image:</label>
			<input type="file" name="image" id="image" ></input>
					
			<input type="submit" name="add" value="Add">
			
	</form>





<?php
	
	
	
	  /**********************************/
	 /*	  	DEFINE DIRECTORY	       */
	/**********************************/
	
	define('UPLOAD_DIR', 'C:\xampp\htdocs\upload_test\\');
	move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR.$_FILES['image']['name']);
	
	
	
	
	  /****************************************/
	 /*	  	SAVE URL TO DATABASE	       */
	/***************************************/
	
	$newTitulo = 'Image Title';
	$newDescription = 'Image Description';
	$URL = UPLOAD_DIR.$_FILES['image']['name'];
	
	$result = mysql_query("INSERT INTO table VALUES titulo='$newTitulo', description='$newDescription', URL='$URL'") or die (mysql_error());
	
	
?>