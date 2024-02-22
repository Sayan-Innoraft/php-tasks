<?php
require 'Creds.php';
require 'requests.php';

$creds = new Creds();
$access_key = $creds->getApiKey();
function isEmailValid($email_address):bool
{
    global $access_key;
    $url = 'http://apilayer.net/api/check?access_key=' . "$access_key".'&email='.$email_address;
    $validation_result = json_decode(request($url),true);
    return $validation_result["format_valid"] && $validation_result["smtp_check"];
}
?>
