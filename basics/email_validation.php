<?php
require 'Creds.php';
require 'requests.php';
/**
 * Creating object of Creds class to get the api key stored from the Creds class
 */

$creds = new Creds();
$access_key = $creds->getApiKey();
/**
 * Checks if the email is valid or not
 *
 * @param string $email_address
 *   stores email address
 * @return bool
 */
function isEmailValid(string $email_address):bool {
    global $access_key;
    $url = 'http://apilayer.net/api/check?access_key=' . $access_key . '&email=' . $email_address;
    /**
     * Calling request method to call the api  , get json file and parse it. Then parsing the json and storing values as associative array
     */
    $validation_result = json_decode(request($url),true);
    return $validation_result["format_valid"] && $validation_result["smtp_check"];
}
