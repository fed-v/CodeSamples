<?php

	#Name of the Database to export can be sent via GET variable called 'db'
	$dbToExport="formaciones";

	session_start();
		
	include ('includes/functions.php');
		
	conectar();
		
	mysql_select_db($dbToExport) or die("Couldn't connect to DB");

	#Get all tables in the database
	$mTblQuery="show tables";
	$mTblResult=mysql_query($mTblQuery);

	$dataStr="";
	#Loop through the table names
	while($tblRow=mysql_fetch_assoc($mTblResult))
	{
		
		#Store output of the table name
		$dataStr.="Table : \t".$tblRow["Tables_in_".$dbToExport]."\r\n";
		
		#Select all records from the table
		$mQuery="select * from `".$tblRow["Tables_in_".$dbToExport]."`";    
		$mResult=mysql_query($mQuery);
		
		#Get no of fields in the table
		$numFields=mysql_num_fields($mResult) or die(mysql_error());
		
		#Get all fields in the table
		$tblFields=array();
		for($i=0;$i<$numFields;$i++)
		{
			$tblFields[]=mysql_field_name($mResult,$i);
			
		}
		
		#Store output of fieldnames
		$dataStr.=implode("\t",$tblFields);
		$dataStr.="\r\n";
		
		#Store output of all the records
		while($row=mysql_fetch_assoc($mResult))
		{
			$rec=array();
			foreach($tblFields as $tblField){
				$recData=str_replace("\r\n"," ",$row[$tblField]);
				$recData=str_replace("\n"," ",$recData);
				$recData=str_replace("\t"," ",$recData);

				$rec[]=$recData;
			}
			$dataStr.=implode("\t",$rec);
			$dataStr.="\r\n";
		}
		
		$dataStr.="\r\n";
		$dataStr.="\r\n";
		
	}

	#Force the browser to download the file
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=export_$dbToExport.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo $dataStr;//Display Stored Output
?>