<?php
	session_start();

	//KICK THE USER OUT OF HIS COOKIE IS SET
	if (!isset($_GET['hash']) || $_GET['hash']!=$_SESSION['hash']) {

	
		header('Location: ../download.php');	
		
	} 

	include ('functions.php');
	
	conectar();

	
	// COUNT TOTAL DOWNLOADS AND UPDATE DATABASE 
	$resultSelect = mysql_query('SELECT * FROM downloads WHERE id="1"') or die (mysql_error());
	$rowSelect = mysql_fetch_assoc($resultSelect);
	
	$visitsUpdated = $rowSelect['total_visits'] +1;
	$resultUpdate = mysql_query("UPDATE downloads SET total_visits='.$visitsUpdated.' WHERE id='1'") or die (mysql_error());

	mysql_close();


	// DOWNLOAD FILE
	$file = $_POST['file'];
	

	// CHECK THAT FILE EXISTS AND IS READABLE
	if(file_exists($file) && is_readable($file)){

		// GET THE FILE'S SIZE AND SEND THE APPROPIATE HEADERS
		$size = filesize($file);
		header("Content-Length:".$size);
		header("Pragma: public"); 
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Content-Type: application/force-download"); 
		header("Content-Disposition: attachment; filename=".$file);
		header("Content-Description: File Transfer"); 
		header("Content-Transfer-Encoding: Binary"); 

		// OPEN THE FILE IN BINARY READ-ONLY MODE
		$file = @ fopen($file, 'rb');

		if($file){

			// STREAM THE FILE AND EXIT THE SCRIPT WHEN COMPLETE
			fpassthru($file );	
			exit;

		} else{

			// SEND ERROR MESSAGE!
		}

	}
	
	