window.onload = principal;
  
  function principal(){
	
	
	  
	  /********************************/
	 /***		VARIABLES		 ***/
	/******************************/
	
	var oSignIn = document.getElementById("signIn");
	var oLoginBox = document.getElementById("loginBox");
	var oResponseHead = document.getElementById("responseHead");
	var oResponseHead2 = document.getElementById("responseHead2");
	
	var oForgot = document.getElementById("forgot");
	var oUsername = document.getElementById("username");
	var flag = false;
	var oTxtUsernameEmpty = document.getElementById("txtUsernameEmpty");
	var oTxtLoginFailed = document.getElementById("txtLoginFailed");
	var oValidateImage = document.getElementById("validateImage");		
	
	var declararVariablesAdicionales = "ninguna";
	
	
	
	
	  /********************************/
	 /***		EVENTOS		 ***/
	/******************************/
	
	oSignIn.onclick = appear;
	oForgot.onclick = checkUser;
	oUsername.onblur = validateUser;
	
	
	  /**************************/
	 /***	     FUNCIONES	  ***/
	/**************************/
	
	function appear()
	{
	
		oLoginBox.style.visibility = "visible";
		oSignIn.style.visibility = "hidden";
	
	}
	
	
	function displayLoginBox()
	{
					
		oResponseHead2.style.display = "none"; 
		oLoginBox.style.display = "block"; 
				
	}
	
	
	function display(displayNone, displayBlock)
	{
					
		displayNone.style.display = "none"; 
		displayBlock.style.display = "block"; 
				
	}
	
	
	
	
	  /********************/
	 /***	     AJAX	  ***/
	/********************/
	
	
	
	function checkUser()
	{
		
		if (oUsername.value.length <= 0 || oValidateImage.firstChild.id == "notValidated" || oValidateImage.firstChild.id == "fail")
		{
			if (flag == false)
			{	
				
				display(oTxtLoginFailed, oTxtUsernameEmpty);
				flag=true;
				
			}
			
		}else{	
		
			display(oLoginBox, oResponseHead);
			showSecretQuestion();	//MANDO A TRAER LA PREGUNTA SECRETA POR AJAX	
		
		}
		
	}	
	

	
	function showSecretQuestion()
	{			
		
		xhr.pedir('includes/forgotPassword.php?username='+oUsername.value,'responseHead'); //ACA DECLARAS QUE QUERES TRAER Y DONDE LO QUERES PONER!
		declararVariablesAdicionales = "forgotPassword";
		
	}
	
	
	function validateUser()
	{
	
		xhr.pedir('includes/validateUsername.php?username='+oUsername.value,'validateImage'); 
		declararVariablesAdicionales = "validateUser";

	}
		
		
		
		
	
	var xhr = {
	//	 Metodo que configura y controla peticiones, recibe la url de la peticion y el elemento html que le va a insertar la respuesta
	pedir:function(url,donde)
	{
		// pido un XMLHttpRequest compatible
		var peticion = xhr.fabricar();
		// asigno la funcion handler, que controla la peticion
		peticion.onreadystatechange = control;
		// configuro el metodo, url y asincronismo
		peticion.open('POST',url,true);
		// envio la peticion
		peticion.send(null);
		
		// function handler
		function control()
		{	
				// checkeamos que el estado de la peticion sea el correcto y que el http este finalizado
			if ((peticion.readyState==4)&&(peticion.status==200))
			{
				// agrego la respuesta al elemento definido
				$(donde).innerHTML = peticion.responseText+'<br />'; //+= si queres agregar
				
				
				/*LAS VARIABLES Y FUNCIONES QUE NECESITAN LOS DISTINTOS ARCHIVOS QUE TRAIGO CON AJAX!, LOS DECLARO
				SEGUN EL ARCHIVO QUE MANDO A TRAER PARA EVITAR ERRORES!*/
				
				switch (declararVariablesAdicionales)
				{
			
					case "forgotPassword":
						
						var oSubmit = document.getElementById("submit");	//Viene con un boton, lo busco por id
						var oSecret_answer = document.getElementById("secret_answer");	//Viene con un input, lo busco por id
				
				
						function authorizeSecretQuestion()
						{
					
							display(oResponseHead, oResponseHead2);
								
							var userName = oUsername.value;
							var secretAnswer = oSecret_answer.value;
					
							//BUSCAR MANERA DE FUNCIONAR ESTO SIN CREAR TANTAS VARIABLES AL PEDO (secretAnswer Y userName!)			
							xhr.pedir('includes/authorizeSecretQuestion.php?secret_answer='+secretAnswer+'&username='+userName,'responseHead2'); //ACA DECLARAS QUE QUERES TRAER Y DONDE LO QUERES PONER!
							declararVariablesAdicionales = "authorizeSecretQuestion";
					
						}
				
						oSubmit.onclick = authorizeSecretQuestion;	//Cuando haces click en ese boton, llamo al XHR.pedir
						break;
					
					case "login":
						
						
						break;
					
					case "authorizeSecretQuestion":
					
						var oLoginAuthorized = document.getElementById("loginAuthorized");			
						oLoginAuthorized.onclick = displayLoginBox;  //SE SUPONE USAR LA FUNCION "DISPLAY"!
			
						break;
					
					case "validateUser":
						
						
						break;
				
				}//FIN  SWITCH
				
				
				
				
				
			}
		}

	},
	// array de versiones posibles
	versiones: ['MSXML2.XMLHttp.5.0','MSXML2.XMLHttp.4.0','MSXML2.XMLHttp.3.0','MSXML2.XMLHttp','Microsoft.XMLHttp'],
	
	fabricar: function() // fabrica de xhr
	{
		// Guardar el objeto Ajax
		var objeto=false;
		
		try // probamos que sea el estandar
		{
			objeto = new XMLHttpRequest();
		}
		catch (e) // si da error, probamos otras versiones
		{
			
			var largo=xhr.versiones.length;
			// recorremos la versiones
			for (i=0;i<largo;i++)
			{
				try // probamos cada version
				{
					objeto = new ActiveXObject( versiones[i] );
					
					// si no da error, lo devuelvo para evitar que siga buscando
					return objeto;
				}
				catch(e)
				{
					//throw("Che hay un error:"+e);
				}
			}
		}
		
		return objeto;
	}
}

	function $(id) { return document.getElementById(id); }
   

 }
