<?php

include 'wa_wrapper/WolframAlphaEngine.php';

$appID = '8AUKRK-KQLHKJXRXY';

$engine = new WolframAlphaEngine($appID);

function requestQuery($q){
    global $engine;
	
	$resp = $engine->getResults($q);
	$pod = $resp->getPods();	
	$pod = $pod[1];
	
	if (is_null($pod)) {
		return "";
	}
	
	$plaintext = "";
	
	foreach($pod->getSubpods() as $subpod) {
	  if($subpod->plaintext){
	    $plaintext = $subpod->plaintext;
	    break;
	  }
	}
	
	return $plaintext;
}
	
?>