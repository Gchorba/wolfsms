<?php

include('twilio/Services/Twilio.php');
include 'wolfContact.php';

$AccountSid = "AC38dd440510099ffb7d9a783b1e2d5516";
$AuthToken = "bd710524b70d8c9b58a0c2a48e11b251";
$client = new Services_Twilio($AccountSid, $AuthToken);
$our_number = "+16788313254";

function success($r, $to){
    global $our_number, $client;
    $sms = $client->account->messages->sendMessage(
         $our_number, 
         $to,
         $r
    );
}

function failure($b, $to) {
    global $our_number, $client;
    $sms = $client->account->messages->sendMessage(
         $our_number, 
         $to,
         "Heh?"
    );
}

$body = $_REQUEST['Body'];
$from = $_REQUEST['From'];

$result = requestQuery($body);

if (strlen($result) > 0) {
	success($result, $from);
} else {
	failure($body, $from);
}

?>