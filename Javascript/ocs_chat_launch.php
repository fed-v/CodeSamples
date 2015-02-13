<rn:meta title="#rn:msg:LIVE_CHAT_LBL#" template="standard.php" clickstream="chat_request"/>

<style type="text/css">
		
		html {background:none;}
		#rn_Header, #rn_Navigation {display:none;}	
		
</style>

<div id="rn_PageContent" class="rn_Live">
    <div class="rn_Padding" >
        <rn:condition chat_available="true">
        <div id="rn_ChatLaunchFormDiv" class="rn_ChatForm">
			</br>
            <span class="rn_ChatLaunchFormHeader">#rn:msg:CUSTOM_MSG_CHAT#</span>
			</br></br>
			<table id="rblTipoVisitante">
				<tr>
				<td>
						<p><strong>Tipo do documento</strong></p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" id="tipo1" name="doc" value="cpf" onclick="habilitacpf()" checked="checked"></input>
						<label for="tipo1">CPF</label>
					</td>
					<td>
						<input type="radio" id="tipo2" name="doc" value="cnpj" onclick="habilitacnpj()"></input>
						<label for="tipo2">Outros</label>
					</td>
				</tr>
			</table>
			<br/>
			
			<form id="rn_ChatLaunchForm" name="rn_ChatLaunchForm1" method="post" action="/app/chat/rn_chat_launch_bn_php">
			    <div id="rn_ErrorLocation"></div>
				<div id="div1"><rn:widget path="input/FormInput" label_input="Número do documento" name="Contact.CustomFields.c.cpf" initial_focus="true"/></div>
				<div id="div2"></div>
				<rn:widget path="input/FormInput" name="Contact.CustomFields.c.nomecompleto" required="true"/>
                <rn:widget path="input/FormInput" name="Contact.Emails.PRIMARY.Address" required="true" label_input="#rn:msg:EMAIL_ADDR_LBL#"/>
				<rn:widget path="input/FormInput" name="contacts.ph_office" label_input="#rn:msg:CUSTOM_MSG_TELEFONE#"/>
				<rn:widget path="input/FormInput" name="Contact.CustomFields.c.tipodoc" required="true" hide_on_load="true"/>
				<rn:widget path="input/ProductCategoryInput" data_type="Product" required_lvl=1/>
				<rn:widget path="input/CustomAllInput" table="Incident" chat_visible_only="true" always_show_mask="false" />
                </br>
				</br>
                <rn:condition config_check="MOD_VA_ENABLED == 0">
                    <rn:widget path="chat/ChatLaunchButton" label_button="Entrar" open_in_new_window='false'
                        error_location="rn_ErrorLocation" 
                        add_params_to_url="q_id,pac,request_source,p,c,survey_send_id,survey_send_delay,survey_comp_id,survey_term_id,chat_data,survey_term_auth,survey_comp_auth,survey_send_auth,i_id"/>
                <rn:condition_else/>
                    <rn:widget path="chat/ChatLaunchButton" label_button="Entrar" open_in_new_window='false'
                        launch_height="700"
                        error_location="rn_ErrorLocation" 
                        add_params_to_url="q_id,pac,request_source,p,c,survey_send_id,survey_send_delay,survey_comp_id,survey_term_id,chat_data,survey_term_auth,survey_comp_auth,survey_send_auth,i_id"/>
                </rn:condition></br></br>
				<input type='submit' id='btn-submit' style='position: absolute; margin-top: -60px;' value='Entrar' />
            </form>
       </div>
       <div id="rn_ChatRodape">
		</rn:condition>
		<rn:widget path="chat/ChatStatus"/>
		<rn:widget path="chat/ChatHours"/>
	   </div>
    </div>
</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		
		function habilitacpf()
		{
			$('select[name="Contact.CustomFields.c.tipodoc"]').empty().append('<option value="">--</option><option value="23" selected>CPF</option><option value="68">Outros</option>');
		}
		
		function habilitacnpj()
		{
			$('select[name="Contact.CustomFields.c.tipodoc"]').empty().append('<option value="">--</option><option value="23">CPF</option><option value="68" selected>Outros</option>');
		}
		
		habilitacpf();
		
		
		$(function(){
					
			$('#btn-submit').on('click',function(e){
				
				if ( $('#tipo1').prop('checked') )
				{
					
					if($('input[name="Contact.CustomFields.c.cpf"]').val() == '' )
					{
						
						alert('Preencha CPF');
						$('input[name="Contact.CustomFields.c.cpf"]').focus();
						
					}else{
					
						if(validarCPF($('input[name="Contact.CustomFields.c.cpf"]').val()) == true)
						{
							$('#rn_ChatLaunchButton_20_Button').click();
							
						}else{
						
							alert('CPF Inválido. Preencher novamente.');
							
						}
					
					}
					
				}else{
				
					$('#rn_ChatLaunchButton_20_Button').click();
				}
				
				e.preventDefault();
			})
			
		})
		
		
		 
		function validarCPF(cpf) 
		{	
			cpf = cpf.replace(/[^\d]+/g,'');
			if(cpf == '') return false;	
			// Elimina CPFs invalidos conhecidos	
			if (cpf.length != 11 || 		
			cpf == "00000000000" || 		
			cpf == "11111111111" || 		
			cpf == "22222222222" || 		
			cpf == "33333333333" || 		
			cpf == "44444444444" || 		
			cpf == "55555555555" || 		
			cpf == "66666666666" || 		
			cpf == "77777777777" || 		
			cpf == "88888888888" || 		
			cpf == "99999999999")		
			return false;		
			// Valida 1o digito	
			add = 0;	
			for (i=0; i < 9; i ++)		
			add += parseInt(cpf.charAt(i)) * (10 - i);	
			rev = 11 - (add % 11);	
			if (rev == 10 || rev == 11)		
			rev = 0;	
			if (rev != parseInt(cpf.charAt(9)))		
			return false;		
			// Valida 2o digito	
			add = 0;	
			for (i = 0; i < 10; i ++)		
			add += parseInt(cpf.charAt(i)) * (11 - i);	
			rev = 11 - (add % 11);	
			if (rev == 10 || rev == 11)		
			rev = 0;	
			if (rev != parseInt(cpf.charAt(10)))		
			return false;			
			return true;   
		}
		
	</script>
