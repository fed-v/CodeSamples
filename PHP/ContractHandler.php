<?php header('Content-Type: text/plain; charset=ISO-8859-1');

/*
* CPMObjectEventHandler: ContractHandler
* Package: Contrato
* Objects: Contrato$Contrato
* Actions: Create, Update
* Version: 1.2
*/

use \RightNow\Connect\v1_2 as RNCPHP;
use \RightNow\CPM\v1 as RNCPM;

class ContractHandler implements RNCPM\ObjectEventHandler {

    public static function apply($runMode, $action, $contract, $cycle) {
	
		$contract = RNCPHP\Contratos\Contrato::fetch(1);
		
		if ($cycle != 0) return null;
		if ($contract == null) return null;
		
		$query = "SELECT Cliente FROM Contratos.Contrato WHERE ID=".$contract->ID.";";
		$result_set = RNCPHP\ROQL::query($query)->next();
		$result = $result_set->next();
		
		
		$contactID = intval($result["Cliente"]);	
		if($contactID!=0){
			$relatedContact = RNCPHP\Contact::fetch($contactID);
			$relatedContact->CustomFields->c->cliente = true;
			$relatedContact->save();
        }
		
		
		if($action == 1)
		{
			
			$queryNumContract = "SELECT Contrato FROM Contratos.Contrato WHERE ID=".$contract->ID.";";
			$resultNumContract_set = RNCPHP\ROQL::query($queryNumContract)->next();
			$resultNum = $resultNumContract_set->next();
						
			$shortContract = substr($resultNum['Contrato'], -4);
			
			$queryNovoTitular  = "SELECT novoTitular FROM Contratos.Contrato WHERE ID=".$contract->ID.";";
			$resultNovoTitular_set = RNCPHP\ROQL::query($queryNovoTitular)->next();
			$resultNovo = $resultNovoTitular_set->next();
			
			Print_r($resultNovo);
			
		}
		
		return true;
    }
}

class ContractHandler_TestHarness implements RNCPM\ObjectEventHandler_TestHarness {
	
	public static function setup() {
		
	}
	
	public static function fetchObject($action, $object_type) {
		
	}
	
	public static function validate($action, $contract) {
		
		return true;
	}
	
	public static function cleanup() {
		
	}
}

?>