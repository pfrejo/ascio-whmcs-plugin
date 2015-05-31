<?php

class eus extends Request {	
	public function registerDomain($params=false) {
		$params = $this->setParams($params);
		$ascioParams = $this->mapToOrder($params,"Register_Domain");
		
		$ascioParams["order"]["Options"] = $params["additionalfields"]["Intended Use"];

		$result = $this->request("CreateOrder",$ascioParams);
		if (!$result) {
			$this->setWhmcsStatus($domainName,"Pending","Register_Domain");
		}
		return $result;
	}
}
?>
