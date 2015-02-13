<!DOCTYPE html>
<html lang="#rn:language_code#">
<rn:meta title="#rn:msg:LIVE_CHAT_LBL#" clickstream="chat_request"/>
<head>
    <meta charset="utf-8"/>
    <title><rn:page_title/></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--[if lt IE 9]><script src="/euf/core/static/html5.js"></script><![endif]-->
    <rn:widget path="search/BrowserSearchPlugin" pages="home, answers/list, answers/detail" />
    <rn:theme path="/euf/assets/themes/rn_bn" css="site.css,
        {YUI}/widget-stack/assets/skins/sam/widget-stack.css,
        {YUI}/widget-modality/assets/skins/sam/widget-modality.css,
        {YUI}/overlay/assets/overlay-core.css,
        {YUI}/panel/assets/skins/sam/panel.css" />
    <rn:head_content/>
    <link rel="icon" href="/euf/assets/images/favicon.png" type="image/png"/>
    <rn:widget path="utils/ClickjackPrevention"/>
	
	<style>
		.rn_TextInput .rn_Text, .rn_TextInput .rn_Email, .rn_TextInput .rn_TextArea, .rn_TextInput .rn_Url{width:250px;}
		#cnpj_wrapper{display:none;}
	</style>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		
		function habilitacpf()
		{
			document.getElementById("cpf_wrapper").style.display="block";
            document.getElementById("cnpj_wrapper").style.display="none";	
	
			$('input[name="Contact.CustomFields.c.cnpj"]').val("");
		}
		
		function habilitacnpj()
		{
			document.getElementById("cpf_wrapper").style.display="none";
            document.getElementById("cnpj_wrapper").style.display="block";		

			$('input[name="Contact.CustomFields.c.cpf"]').val("");
		}
		
		$(function(){
		
			$('#rn_ChatLaunchButton_14_Button').hide();
			
			$('#btn-submit').on('click',function(e){
			
				if ( $('#radio_cpf').prop('checked') )
				{
					
					if( !$('input[name="Contact.CustomFields.c.cpf"]').val() == '' )
					{
						$('#rn_ChatLaunchButton_14_Button').click();
					}
					else
					{
						alert('Preencha CPF');
						$('#rn_TextInput_3_Contact.CustomFields.c.cpf').focus();
					}
				}
				else
				{
					
					if( !$('input[name="Contact.CustomFields.c.cnpj"]').val() == '' )
					{
						$('#rn_ChatLaunchButton_14_Button').click();
					}
					else
					{
						alert('Preencha CNPJ');
						$('#rn_TextInput_3_Contact.CustomFields.c.cnpj').focus();
					}
				}
				
				e.preventDefault();
			})
			
		})
		
	</script>
</head>

<body class="yui-skin-sam yui3-skin-sam">

<div id="rn_PageTitle" class="rn_LiveHelp">
    <img src="https://odebrecht.custhelp.com/euf/assets/themes/rn_bn/images/rn_barra_topo_bairronovo.jpg"></img>
</div>

<div id="rn_PageContent" class="rn_Live">
    <div class="rn_Padding" >
        <rn:condition chat_available="true">
        <div id="rn_ChatLaunchFormDiv" class="rn_ChatForm">
			</br>
            <span class="rn_ChatLaunchFormHeader">#rn:msg:CUSTOM_MSG_CHAT1#</span>
			<table id="rblTipoVisitante">
				<tr>
					<td>
						<input type="radio" id="radio_cpf" name="doc" value="cpf" onclick="habilitacpf()" checked="checked"></input>
						<label for="radio_cpf">CPF</label>
					</td>
					<td>
						<input type="radio" id="radio_cnpj" name="doc" value="cnpj" onclick="habilitacnpj()"></input>
						<label for="radio_cnpj">CNPJ</label>
					</td>
				</tr>
			</table>
			<form id="rn_ChatLaunchForm" name="rn_ChatLaunchForm1" method="post" action="http://odebrecht.custhelp.com/app/chat/rn_chat_launch_bn_php">
                <div id="rn_ErrorLocation"></div>
				<div id="cpf_wrapper"><rn:widget path="input/FormInput" name="contacts.c$cpf" initial_focus="true"/></div>
				<div id="cnpj_wrapper"><rn:widget path="input/FormInput" name="contacts.c$cnpj"/></div>
				<rn:widget path="input/FormInput" name="contacts.c$nome" required="true"/>
                <rn:widget path="input/FormInput" name="Contact.Emails.PRIMARY.Address" required="true" label_input="#rn:msg:EMAIL_ADDR_LBL#"/>
				<rn:widget path="input/FormInput" name="contacts.ph_office" label_input="#rn:msg:CUSTOM_MSG_TELEFONE#"/>
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
</body>
</html>

