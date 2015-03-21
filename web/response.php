<?php

include('twilio/Services/Twilio.php');
include 'wolfContact.php';

$AccountSid = "XXXXXXXXXXXXXXXXXXXXXXX";
$AuthToken = "XXXXXXXXXXXXXXXXXXXXXXX";
$client = new Services_Twilio($AccountSid, $AuthToken);
$our_number = "XXX-XXX-XXXX";

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