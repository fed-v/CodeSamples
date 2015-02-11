window.onload = principal;
  
	function principal()
	{
	
		//VALIDATE EMAIL
		if (document.registrationForm.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
		{
					
			document.registrationForm.email.style.border = "1px solid #ccc";
			return true
					
				
		}else{
					
					
			document.registrationForm.email.style.border = "1px solid red";
			alert("Invalid email!");
			return false
				
	}
	
}