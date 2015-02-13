<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Validação Situation</title>
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
			var co = window.external.GetCustomObject('Contratos', 'Contrato');
									
			function onbeforesave(obj)
			{
				var unidade = co.GetCustomFieldByName("Unidade");
				var situacao = co.GetCustomFieldByName("Situacao");
				var permite = co.GetCustomFieldByName("permiteAltTitul");
			
				$.get("https://" + STR_SITE + "/cgi-bin/" + STR_INTERFACE + ".cfg/php/custom/test.php", { unidade: unidade, situacao: situacao })			     
				.done(function( data ) {
										
					if(data == 1){
							co.SetCustomFieldByName("permiteAltTitul", false);
					}else{
							co.SetCustomFieldByName("permiteAltTitul", true);
			        }	
						
				})
				
				co.SetCustomFieldByName("permiteAltTitul", false);
				
			}

		</script>
	</body>
</html>