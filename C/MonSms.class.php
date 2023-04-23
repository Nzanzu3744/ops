<?php
class sms{

public static function Monsms($numEn,$numRec,$Text){
	require_once 'vendor/autoload.php';
	$messagebird = new MessageBird\Client('TB8EFJK4Upq0PQkJ03tcw295p');
	$message = new MessageBird\Objects\Message;
	$message->originator =$numEn;
	$message->recipients = [$numRec];
	$message->body =$Text;
	$response = $messagebird->messages->create($message);
	// print_r(json_encode($response));
}
}