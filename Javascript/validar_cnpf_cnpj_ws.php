<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Validação CPF</title>
		<meta charset="UTF-8">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<style type="text/css">
			* {
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<script type="text/javascript">
			 
			var STR_SITE = "odebrecht.custhelp.com"; // Nome do Site | ex: xpto.custhelp.com
			var STR_INTERFACE = "odebrecht"; // Nome da Interface | ex: xpto
			var STR_CPF = "c$cpf"; // Nome do campo | ex: c$cpf
			var STR_CNPJ = "c$cnpj"; // Nome do campo | ex: c$cpf
			var cpf_valido = 0;
			var ctypeid = window.external.Contact.CTypeId;
			var cid = window.external.Contact.Id;
			var email_blacklisted = 0;
						
						
			function ondataupdated(obj)
			{
				
				email_blacklisted = 0;
				var email = window.external.Contact.EmailAddr;
				
				if(email != "")
				{

					$.get("https://" + STR_SITE + "/cgi-bin/" + STR_INTERFACE + ".cfg/php/custom/validate_email_blacklist.php", { email: email })
					
					.done(function( data ) {
						
						if(data == 1){
							email_blacklisted = 1;
						}

					})
				
				}				
				
				c = window.external.Contact;
				
				if (ctypeid == 1){

					var cpf = c.GetCustomFieldByName(STR_CPF);

					$.get("https://" + STR_SITE + "/cgi-bin/" + STR_INTERFACE + ".cfg/php/custom/validar_cpf.php", { cpf: cpf, id: cid })
			     
					.done(function( data ) {
					
						if(data == 1){
								cpf_valido = 1;
							}else{
								if(data == 2){
								cpf_valido = 2;
								}else{
									cpf_valido = 0;
								}
							}

					})

				}else{

					var cnpj = c.GetCustomFieldByName(STR_CNPJ);
					
					$.get("https://" + STR_SITE + "/cgi-bin/" + STR_INTERFACE + ".cfg/php/custom/validar_cnpj.php", { cnpj: cnpj})
					 
					.done(function( data_cnpj ) {
					
						if(data_cnpj == 1){
								cnpj_valido = 1;
							}else{
								if(data_cnpj == 2){
								cnpj_valido = 2;
								}else{
									cnpj_valido = 0;
								}
							}

					})		
				}
			}
			
			
			function onbeforesave()
			{
				var cpf = c.GetCustomFieldByName(STR_CPF);
				
				if(email_blacklisted == 1)
				{
					window.external.beforesavecomplete(false, "E-mail inválido, digite novamente.");
				}
				
				if(ctypeid == 1 && cpf!=undefined)
				{		
			
						switch(cpf_valido) {
						
							case 1:
									
									window.external.beforesavecomplete(false, "CPF inválido, digite novamente");
									break;
							case 2:
												
									window.external.beforesavecomplete(false, "CPF cadastrado, digite novamente");
									break;				        
			
						}

				}else{
					
					if(cpf!=undefined){
						
						switch(cnpj_valido) {
						
							case 1:
									
									window.external.beforesavecomplete(false, "CNPJ inválido, digite novamente");
									break;
							case 2:
												
									window.external.beforesavecomplete(false, "CNPJ cadastrado, digite novamente");
									break;				        
						}
					
					}

				}
				
			}
			
		</script>
	</body>
</html>