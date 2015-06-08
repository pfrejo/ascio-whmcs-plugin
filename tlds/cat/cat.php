<?php

class cat extends Request {	
	public function registerDomain($params=false) {
		$params = $this->setParams($params);
		$ascioParams = $this->mapToOrder($params,"Register_Domain");
		
		/* Use Post-Validation System (See TLD kit) */
		$ascioParams["order"]["Domain"]["AuthInfo"] = "DEFERRED-VAL";
		$ascioParams["order"]["Domain"]["DomainPurpose"] = $params["additionalfields"]["Intended Use"];

		$result = $this->request("CreateOrder",$ascioParams);
		if (!$result) {
			$this->setWhmcsStatus($domainName,"Pending","Register_Domain");
		}
		return $result;
	}
}
?>
