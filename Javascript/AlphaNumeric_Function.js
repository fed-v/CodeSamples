window.onload = principal;
  
  function principal(){
	
	
	//CHECK FOR ALPHANUMERIC CHARACTERS	
	function alphanumeric(alphane)
	{
			
		var numaric = alphane;
				
			for(var j=0; j<numaric.length; j++)
			{
				
				var alphaa = numaric.charAt(j);
				var hh = alphaa.charCodeAt(0);
				if((hh > 47 && hh<58) || (hh > 64 && hh<91) || (hh > 96 && hh<123))
				{
					
					 
				}else{
			             
					alert("Please provide only alpha numeric characters!");
					flag = true;
				}
					  
			}
					
	}

			
	alphanumeric(document.registrationForm.username.value);
	
}