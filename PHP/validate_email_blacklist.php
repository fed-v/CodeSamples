<?php  
	
	//RIGHTNOW DATEBASE CONNECTION
	
	if (!defined('DOCROOT')) {
		$docroot = get_cfg_var('doc_root');
 		define('DOCROOT', $docroot);
	}

	require_once (DOCROOT . '/include/services/AgentAuthenticator.phph');

	$authUser = '***********';
	$authPass = '********';
	$account = AgentAuthenticator::authenticateCredentials($authUser, $authPass);

	use RightNow\Connect\v1_2 as RNCPHP;

	
	
	
	// VAR SENT BY URL TO USE IN DATABASE SELECTION
	
	$email = $_GET['email'];

	
	
	
	// ROQL DATABSE CONNECTION AND RESULTS
	
	$query = "SELECT count() FROM Clientes.Blacklist WHERE Clientes.Blacklist.Email='".$email."'";
	$result_set = RNCPHP\ROQL::query($query)->next();
	$result = $result_set->next();
	
	$emailExists = intval($result["count()"]);
	
	
	
	
	// PRINT RESULT TO SEND BACK 
	
	echo $emailExists;

?>