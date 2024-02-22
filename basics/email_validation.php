<?php
require 'Creds.php';
$creds = new Creds();
$access_key = $creds->getApiKey();
function validOrNot($email_address):bool
{
    global $access_key;
    $ch = curl_init('http://apilayer.net/api/check?access_key=' . "{$access_key}".'&email='.$email_address);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($ch);
    curl_close($ch);
    $validationResult = json_decode($json,true);
    return $validationResult["format_valid"] && $validationResult["smtp_check"];
}
?>
