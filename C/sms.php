<?php

define("BASEURL", "https://api.smsenvoi.com/API/v1.0/REST/");

define("MESSAGE_HIGH_QUALITY", "PRM");
define("MESSAGE_MEDIUM_QUALITY", "--");


/**
 * Authenticates the user given it's username and password.
 * Returns the pair user_key, Session_key
 */

function login($username, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASEURL .
                'login?username=' . $username .
                '&password=' . $password);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if ($info['http_code'] != 200) {
        return null;
    }

    return explode(";", $response);
}


/**
 * Sends an SMS message
 */

function sendSMS($auth, $sendSMS) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASEURL . 'sms');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'user_key: ' . $auth[0],
        'Session_key: ' . $auth[1]
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sendSMS));
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if ($info['http_code'] != 201) {
        return null;
    }

    return json_decode($response);
}
////////////////////////////////////////////////////////////////////////////////

$auth = login('MY_USERNAME', 'MY_PASSWORD');

$smsSent = sendSMS($auth, array(
    "message" => "Hello world!",
    "message_type" => MESSAGE_HIGH_QUALITY,
    "returnCredits" => false,
    "recipient" => array("+243828409897"),
    "sender" => null,     // Place here a custom sender if desired
    "scheduled_delivery_time" => date('YmdHi', strtotime("+0 minutes")), // postpone by 5 minutes
));

if ($smsSent->result == "OK") {
    echo 'SMS sent!';
}
?>