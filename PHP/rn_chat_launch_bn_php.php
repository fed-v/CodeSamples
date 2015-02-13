<html>
	<head>
		<meta charset="utf-8"/>
		<title>#rn:msg:LIVE_ASSISTANCE_LBL#</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<link rel="icon" href="/euf/assets/images/favicon.png" type="image/png"/>
	<style>
		#myForm{visibility:hidden;}
	</style>
	</head>
<body>
	<form id="myForm" name="frm" method="post" action="/app/chat/ocs_chat_landing" target="_self">
		
		<?php
		
		if (!defined('DOCROOT')) {
			$docroot = get_cfg_var('doc_root');
			define('DOCROOT', $docroot);
		}

		require_once (DOCROOT . '/include/ConnectPHP/Connect_init.phph');

		$user = 'chat';
		$password = 'Helpdesk123';
		initConnectAPI($user, $password);

		function main() {
			
			$nome = $_POST["Contact_CustomFields_c_nomecompleto"];
			$email = $_POST["Contact_Emails_PRIMARY_Address"];
			$phone = $_POST["Contact_Phones_OFFICE_Number"];
			$product = $_POST["Incident_Product"];
			$tipodoc = $_POST["Contact_CustomFields_c_tipodoc"];
			
			$cpf =  $_POST["Contact_CustomFields_c_cpf"];
			$cpf = ereg_replace('[^0-9]', '', $cpf);
			$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
			
			process($nome, $email, $phone, $product, $cpf, $tipodoc);
		}

		function process($nome, $email, $phone, $product, $cpf, $tipodoc) {

			if (!empty($email)) {
				$query_contact = "SELECT Contact.CustomFields.c.nomecompleto, Contact.Emails.Address, Contact.CustomFields.c.cpf, Contact.Phones.Number, Contact.CustomFields.c.tipodoc FROM  Contact WHERE Contact.Emails.AddressType = 'Primary' AND Contact.Emails.Address = '".$email."'";
			}
			
			$result_set_contact = RightNow\Connect\v1_2\ROQL::query($query_contact)->next();				
			$result_contact = $result_set_contact->next();
			
			if ($result_contact === null) {
				create_contact($nome, $email, $phone, $product, $cpf, $tipodoc);
				//echo "nuevo";
				
			} else {
				if (!empty($result_contact["nomecompleto"])) 
				$_POST["Contact_CustomFields_c_nomecompleto"] = $result_contact["nomecompleto"];
				$_POST["Contact_Emails_PRIMARY_Address"] = $result_contact["Address"];
				$_POST["Contact_CustomFields_c_cpf"] = $result_contact["cpf"];
				$_POST["Contact_CustomFields_c_tipodoc"] = $result_contact["tipodoc"];
				$_POST["Contact_Phones_OFFICE_Number"] = $result_contact["Number"];
				
			}
		}

		function create_contact($nome, $email, $phone, $product, $cpf, $tipodoc) {

			try {
				
				$contact = new RightNow\Connect\v1_2\Contact();
				complete_contact($contact, $nome, $email, $phone, $tipodoc);
				$contact->Name =new RightNow\Connect\v1_2\PersonName();
				$contact->Name->First =	$nome;
				
				if(!empty($cpf)) {
					$contact->CustomFields->c->cpf = $cpf;
					$contact->CustomFields->c->tipodoc = new RightNow\Connect\v1_2\NamedIDLabel();
					$contact->CustomFields->c->tipodoc->ID = $tipodoc;
				} 
				
				AbuseDetection::check();
				$contact->save();
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		function complete_contact(&$contact, $nome, $email, $phone, $tipodoc) {
			
			if (!empty($nome)) {
				$contact->CustomFields->c->nomecompleto = $nome;
			}
			
			if (!empty($email)) {
				$contact->Emails = new RightNow\Connect\v1_2\EmailArray();
				$contact->Emails[0] = new RightNow\Connect\v1_2\Email();
				$contact->Emails[0]->AddressType = new RightNow\Connect\v1_2\NamedIDOptList();
				$contact->Emails[0]->AddressType->ID = 0;
				$contact->Emails[0]->Address = $email;
			}
			
			if (!empty($phone)) {
				$contact->Phones = new RightNow\Connect\v1_2\PhoneArray();
				$contact->Phones[0] = new RightNow\Connect\v1_2\Phone();
				$contact->Phones[0]->PhoneType = new RightNow\Connect\v1_2\NamedIDOptList();
				$contact->Phones[0]->PhoneType->ID = 0;
				$contact->Phones[0]->Number = $phone;
			}
		}

		main();
		
		?>
           
        <input type="text" type="hidden" value="<?php echo $_POST['Contact_CustomFields_c_nomecompleto'] ?>" name="Contact.CustomFields.c.nomecompleto" maxlength="80" />
		
		<input type="text" type="hidden" value="<?php echo $_POST['Contact_CustomFields_c_cpf'] ?>" name="Contact.CustomFields.c.cpf" maxlength="14" />
		
		<input type="email" type="hidden" value="<?php echo $_POST['Contact_Emails_PRIMARY_Address'] ?>" name="Contact.Emails.PRIMARY.Address" maxlength="80" />

		<input type="text" type="hidden" value="<?php echo $_POST['Contact_Phones_OFFICE_Number'] ?>" name="Contact.Phones.OFFICE.Number" maxlength='40' />
		
		<input type="text" type="hidden" value="<?php echo $_POST['Contact_CustomFields_c_tipodoc'] ?>" name="Contact.CustomFields.c.tipodoc" />
		
		<input type="text" type="hidden" value="<?php echo $_POST['Incident_Product'] ?>" name="Incident.Product" maxlength='10' />
		
	</form>	
    
	<script language="JavaScript">
		document.frm.submit();
	</script>
</body>
</html>
