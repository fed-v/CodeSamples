<?php
	// Find our position in the file tree
	if (!defined('DOCROOT')) {
	$docroot = get_cfg_var('doc_root');
	define('DOCROOT', $docroot);
	}

	// Set up access control and authentication
	require_once (DOCROOT . '/include/services/AgentAuthenticator.phph');

	// Specify a versioned namespace for the Connect PHP API
	use RightNow\Connect\v1_2 as RNCPHP;

	$ID = $_GET['ID'];

	$roql_result_set = RNCPHP\ROQL::query( "SELECT Contact.CustomFields.c.tn_calle, Contact.CustomFields.c.tn_numero, Contact.CustomFields.c.tn_localidad, Contact.CustomFields.c.tn_provincia, Contact.CustomFields.c.tn_pais FROM Contact WHERE Contact.ID =".$ID."" );
	
	while($roql_result = $roql_result_set->next())
	{
		while ($row = $roql_result->next())
		{
			
			$calle=$row['tn_calle'];
  			$numero=$row['tn_numero'];
    		$localidad=$row['tn_localidad'];
    		$provincia=$row['tn_provincia'];
   			$pais=$row['tn_pais'];	
		}  
	}
	
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
	
		html, body, #map-canvas 
		{
			height: 100%;
			margin: 0px;
			padding: 0px;
		}
		
		#myLocation
		{
			padding: 20px;
			font-weight: bold;
			font-family: Arial;
		}
		
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>

		var map;
				
		function initialize() {
									
			var geocoder = new google.maps.Geocoder();	  
			var myAddress = "<?php echo $calle . " " . $numero . "+" . $localidad . "+" . $provincia . "+" . $pais; ?>";	
		  		  
			geocoder.geocode({"address": myAddress},
				function(results, status) {
					if (status == google.maps.GeocoderStatus.OK){
						document.getElementById("myLocation").innerHTML += results[0].formatted_address;
						var lat = results[0].geometry.location.lat();
						var lng = results[0].geometry.location.lng();
						
						
						map = new google.maps.Map(document.getElementById('map-canvas'), {zoom: 15, center: new google.maps.LatLng(lat, lng)});
						
						var marker = new google.maps.Marker({
							position: new google.maps.LatLng(lat, lng),
							map: map,
							title: results[0].formatted_address
						});
						
						marker.setMap(map);
						
					}else{
						document.getElementById("myLocation").innerHTML += "Unable to retrieve your address" + "<br />";
					}
					
				});			
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
	<div id="myLocation"></div>
    <div id="map-canvas"></div>
  </body>
</html>