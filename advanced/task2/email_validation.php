<?php

require 'creds.php';
require 'requests.php';

/**
 * Checks if the email is valid or not.
 *
 * @param string $email_address
 *   User's email address.
 *
 * @return bool
 *   Returns true if email address is valid else returns false.
 */
function is_email_valid(string $email_address): bool {
  global $api_key;
  $url = 'http://apilayer.net/api/check?access_key=' . $api_key . '&email=' .
    $email_address;

  // Calling request method to call the api, get json file and parse it.
  //Then parsing the json and storing values as associative array.
  $validation_result = json_decode(request($url), true);
  return $validation_result['format_valid'] && $validation_result['smtp_check'];
}
